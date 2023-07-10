<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\EquipamentoVO;
use Src\Model\SQL\EquipamentoSQL;
use Src\VO\AlocarVO;
use Src\_public\Util;
use Src\VO\LogErro;



class EquipamentoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }
    public function CadastrarEquipamentoDAO(EquipamentoVO $vo)
    {
        try {
            $this->conexao->beginTransaction();
            if (!empty($vo->getId())) {
                $sql = $this->conexao->prepare(EquipamentoSQL::AlterarEquipamentoSQL());
                $sql->bindValue(1, $vo->getIdentificacao());
                $sql->bindValue(2, $vo->getDescricao());
                $sql->bindValue(3, $vo->getTipoEquipID());
                $sql->bindValue(4, $vo->getModeloEquipID());
                $sql->bindValue(5, $vo->getId());
                $sql->execute();
                $id_servico_equipamento = $vo->getIdServicoEquipamento();
                if ($id_servico_equipamento != "") {
                    foreach ($id_servico_equipamento as $servico) {
                        $sql = $this->conexao->prepare(EquipamentoSQL::INSERT_SERVICO_PARA_EQUIPAMENTO_SQL());
                        $sql->bindValue(1, $vo->getId());
                        $sql->bindValue(2, $servico);
                        $sql->execute();
                    }
                }
                $id_produto_equipamento = $vo->getIdProdutoEquipamento();
                if ($id_produto_equipamento != "") {
                    foreach ($id_produto_equipamento as $produto) {
                        $sql = $this->conexao->prepare(EquipamentoSQL::INSERT_PRODUTO_PARA_EQUIPAMENTO_SQL());
                        $sql->bindValue(1, $produto);
                        $sql->bindValue(2, $vo->getId());
                        $sql->execute();
                    }
                }
            } else {
                $sql = $this->conexao->prepare(EquipamentoSQL::InserirEquipamentoSQL());
                $sql->bindValue(1, $vo->getIdentificacao());
                $sql->bindValue(2, $vo->getDescricao());
                $sql->bindValue(3, $vo->getTipoEquipID());
                $sql->bindValue(4, $vo->getModeloEquipID());
                $sql->execute();
                $id_equipamento = $this->conexao->lastInsertId();
                $id_servico_equipamento = $vo->getIdServicoEquipamento();
                if ($id_servico_equipamento != "") {
                    foreach ($id_servico_equipamento as $servico) {
                        $sql = $this->conexao->prepare(EquipamentoSQL::INSERT_SERVICO_PARA_EQUIPAMENTO_SQL());
                        $sql->bindValue(1, $id_equipamento);
                        $sql->bindValue(2, $servico);
                        $sql->execute();
                    }
                }
                $id_produto_equipamento = $vo->getIdProdutoEquipamento();
                if ($id_produto_equipamento != "") {
                    foreach ($id_produto_equipamento as $produto) {
                        $sql = $this->conexao->prepare(EquipamentoSQL::INSERT_PRODUTO_PARA_EQUIPAMENTO_SQL());
                        $sql->bindValue(1, $produto);
                        $sql->bindValue(2, $id_equipamento);
                        $sql->execute();
                    }
                }
            }
            $this->conexao->commit();
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function ConsultarEquipamentoDAO($BuscarTipo, $filtro_palavra): array
    {

        $sql = $this->conexao->prepare(EquipamentoSQL::ConsultarEquipamentoBuscaSQL($BuscarTipo, $filtro_palavra));
        $sql->bindValue(1, "%" . $filtro_palavra . "%");
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function ConsultarEquipamentoAllDAO(): array
    {

        $sql = $this->conexao->prepare(EquipamentoSQL::ConsultarEquipamento());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function SelecionarEquipamentosNaoAlocadosDAO($situacao): array
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SelecionarEquipamentoNaoAlocado());
        $sql->bindValue(1, $situacao);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AlocarEquipamentoDAO(AlocarVO $vo): int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::AlocarEquipamento());
        $i = 1;
        $sql->bindValue($i++, $vo->getSituacao());
        $sql->bindValue($i++, $vo->getDataAlocacao());
        $sql->bindValue($i++, $vo->getEquipamentoID());
        $sql->bindValue($i++, $vo->getSetorID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function DetalharEquipamentoDAO($id)
    {

        $sql = $this->conexao->prepare(EquipamentoSQL::DetalharEquipamentoSQL());
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarEquipamentoDAO()
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::RetornarEquipamentoSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function FiltrarEquipamentoDAO($nome_filtro)
    {

        $sql = $this->conexao->prepare(EquipamentoSQL::FiltrarEquipamentoSQL($nome_filtro));
        if (!empty($nome_filtro)) {

            $sql->bindValue(1, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function ExcluirEquipamentoDAO(EquipamentoVO $vo): int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::ExcluirEquipamentoSQL());
        $sql->bindValue(1, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }
    public function SelecionarEquipamentosAlocadosSetorDAO($situacao, $idSetor)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::EQUIPAMENTOS_SETOR_LOGADO_API());
        $sql->bindValue(1, $idSetor);
        $sql->bindValue(2, $situacao);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function SelecionarEquipamentosAlocadosDAO($situacao)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SelecionarEquipamentoAlocado($situacao));
        if (!empty($situacao)) {

            $sql->bindValue(1, "%" . $situacao . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RemoverAlocamentoDAO(AlocarVO $vo): int
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::RemoverAlocamentoSQL());
        $sql->bindValue(1, $vo->getSituacao());
        $sql->bindValue(2, $vo->getDataRemocao());
        $sql->bindValue(3, $vo->getIdAlocar());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function SelecionarServicoEquipamentoDAO()
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SELECT_SERVICO_PARA_EQUIPAMENTO_SQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function SelecionarProdutoEquipamentoDAO()
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::SELECT_PRODUTO_PARA_EQUIPAMENTO_SQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RemoverProdutoEquipamentoDAO($id_produto_equipamento)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::DELETE_PRODUTO_PARA_EQUIPAMENTO_SQL());
        $sql->bindValue(1, $id_produto_equipamento);

        $vo = new LogErro();

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function RemoverServicoEquipamentoDAO($id_servico_equipamento)
    {
        $sql = $this->conexao->prepare(EquipamentoSQL::DELETE_SERVICO_PARA_EQUIPAMENTO_SQL());
        $sql->bindValue(1, $id_servico_equipamento);

        $vo = new LogErro();

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }
}
