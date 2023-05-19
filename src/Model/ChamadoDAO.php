<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\ChamadoVO;
use Src\Model\SQL\ChamadoSQL;
use Src\VO\ReferenciaOS;
use Src\_public\Util;

class ChamadoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }


    public function AbrirChamado(ChamadoVO $vo): int
    {
        $sql = $this->conexao->prepare(ChamadoSQL::AbrirChamadoSQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataAbertura());
        $sql->bindValue($i++, $vo->getDescrciaoProblema());
        $sql->bindValue($i++, $vo->getId());
        $sql->bindValue($i++, $vo->getNumero_nf());
        $sql->bindValue($i++, $vo->getDefeito());
        $sql->bindValue($i++, $vo->getObservacao());
        $sql->bindValue($i++, $vo->getCliente_id());
        $sql->bindValue($i++, $vo->getEmpresa_id());



        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    /*  public function GravarDadosOsDAO(ReferenciaOS $vo)
    {

        if ($vo->getServico_ServID() != "") {
            $sql = $this->conexao->prepare(ChamadoSQL::GravarDadosServOsSQL());
            $i = 1;
            $sql->bindValue($i++, $vo->getChamado_id());
            $sql->bindValue($i++, $vo->getServico_ServID());
            $sql->bindValue($i++, $vo->getEmpresa_EmpID());
            $sql->bindValue($i++, $vo->getQuantidade());
            $sql->bindValue($i++, $vo->getValor());
        }
        if ($vo->getProduto_ProdID() != "") {
            $sql = $this->conexao->prepare(ChamadoSQL::GravarDadosProdOsSQL());
            $i = 1;
            $sql->bindValue($i++, $vo->getChamado_id());
            $sql->bindValue($i++, $vo->getProduto_ProdID());
            $sql->bindValue($i++, $vo->getEmpresa_EmpID());
            $sql->bindValue($i++, $vo->getQuantidade());
            $sql->bindValue($i++, $vo->getValor());
        }
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    } */


    public function GravarDadosOsGeralDAO($produtos, $chamado_id, $empresa_id)
    {
        foreach ($produtos as $p) {
            $sqlSaldo = $this->conexao->prepare(ChamadoSQL::ConsultarSaldoProdutoSQL());
            $sqlSaldo->bindValue(1, $p['produto_id']);
            $sqlSaldo->execute();
            $saldo = $sqlSaldo->fetch(\PDO::FETCH_ASSOC);
            if ($saldo['ProdEstoque'] >= $p['qtd']) {
                // Saldo é suficiente, então você pode prosseguir com a gravação e atualização do saldo
                $sql = $this->conexao->prepare(ChamadoSQL::GravarDadosProdOsSQL());

                $i = 1;
                $sql->bindValue($i++, $chamado_id);
                $sql->bindValue($i++, $p['produto_id']);
                $sql->bindValue($i++, $empresa_id);
                $sql->bindValue($i++, $p['qtd']);
                $sql->bindValue($i++, $p['valor']);
                $sql->execute();

                $atualizacaoSaldo = $this->conexao->prepare(ChamadoSQL::AtualizarSaldoProdutoSQL());
                $atualizacaoSaldo->bindValue(1, $p['qtd']);
                $atualizacaoSaldo->bindValue(2, $p['produto_id']);
                $atualizacaoSaldo->execute();
            } else {
                // Saldo insuficiente, você pode retornar algum código de erro ou mensagem informando isso
                return -2; // Por exemplo
            }
        }

        try {
            return 1;
        } catch (\Exception $ex) {
            return -1;
        }
    }

    public function GravarDadosServOsGeralDAO($servico, $chamado_id, $empresa_id)
    {
        foreach ($servico as $p) {

            $sql = $this->conexao->prepare(ChamadoSQL::GravarDadosServOsSQL());

            $i = 1;
            $sql->bindValue($i++, $chamado_id);
            $sql->bindValue($i++, $p['servico_id']);
            $sql->bindValue($i++, $empresa_id);
            $sql->bindValue($i++, $p['valor']);
            $sql->execute();

        }
            try {
                return 1;
            } catch (\Exception $ex) {
                return -1;
            }
    }

    public function CarregarProdutosOSDAO($chamado_id)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::CarregarProdutoOSSQL());
        $sql->bindValue(1, $chamado_id);
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function CarregarProdServOSDAO($chamado_id)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::CarregarProdServOSSQL());
        $sql->bindValue(1, $chamado_id);
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    
    public function CarregarServicosOSDAO($chamado_id)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::CarregarServicosOSSQL());
        $sql->bindValue(1, $chamado_id);
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RemoveProdOsDAO(ReferenciaOS $vo): int
    {
        $sql = $this->conexao->prepare(ChamadoSQL::RemoveProdOsSQL());
        $sql->bindValue(1, $vo->getReferencia_id());
        $sql->bindValue(2, $vo->getEmpresa_EmpID());
        $sql->execute();

        $atualizacaoSaldo = $this->conexao->prepare(ChamadoSQL::AtualizarSaldoProdutoExcluirSQL());
        $atualizacaoSaldo->bindValue(1, $vo->getQuantidade());
        $atualizacaoSaldo->bindValue(2, $vo->getProduto_ProdID());
        $atualizacaoSaldo->execute();

        try {
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function RemoveServOsDAO(ReferenciaOS $vo): int
    {
        $sql = $this->conexao->prepare(ChamadoSQL::RemoveProdOsSQL());
        $sql->bindValue(1, $vo->getReferencia_id());
        $sql->bindValue(2, $vo->getEmpresa_EmpID());
        
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function FiltrarChamadoAbertoDAO()
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO_ABERTO());
        $sql->execute();

        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
    public function FiltrarChamado($tipo, $setor)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO($tipo, $setor));
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarChamadoGeralDAO($empresa_id, $tipo, $setorID)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO_GERAL($tipo, $setorID));
        
        $sql->bindValue(1, $empresa_id);
        if (!empty($setorID)) {

            $sql->bindValue(2, $setorID);
        }
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AtenderChamadoDAO(ChamadoVO $vo)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::ATENDER_CHAMADO());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataAtendimento());
        $sql->bindValue($i++, $vo->getTecnico_atendimento());
        $sql->bindValue($i++, $vo->getId());
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function FinalizarChamadoDAO(ChamadoVO $vo)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FINALIZAR_CHAMADO());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataEncerramento());
        $sql->bindValue($i++, $vo->getTecnicoEncerramento());
        $sql->bindValue($i++, $vo->getLaudoTecnico());
        $sql->bindValue($i++, $vo->getId());
        $sql->execute();
        $sql = $this->conexao->prepare(ChamadoSQL::ATUALIZAR_ALOCAMENTO());
        $i = 1;
        $sql->bindValue($i++, $vo->getSituacao());
        $sql->bindValue($i++, $vo->getAlocar());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function CarregarDadosChamadoDAO()
    {

        $sql = $this->conexao->prepare(ChamadoSQL::CarregarDadosChamadoSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }

    public function ChamadosPorFuncionarioDAO()
    {

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorFuncionarioSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ChamadosPorPeriodoDAO()
    {

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorPeriodoSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function ChamadosPorSetorDAO()
    {

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorSetorSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
