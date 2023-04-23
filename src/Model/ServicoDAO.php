<?php

namespace Src\Model;

use Src\_public\Util;
use Src\Model\Conexao;
use Src\VO\ServicoVO;
use Src\Model\SQL\ServicoSQL;


class ServicoDAO extends Conexao{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        
    }

    public function CadastrarServico(ServicoVO $vo): int
    {

        if (!empty($vo->getId())) {
            $sql = $this->conexao->prepare(ServicoSQL::AlterarServicoSQL());
            $sql->bindValue(1, $vo->getServNome());
            $sql->bindValue(2, $vo->getServValor());
            $sql->bindValue(3, $vo->getServDescricao());
            $sql->bindValue(4, $vo->getServEmpID());
            $sql->bindValue(5, $vo->getServUserID());
            $sql->bindValue(6, $vo->getId());
        } else {
            $sql = $this->conexao->prepare(ServicoSQL::InserirServicoSQL());
            $sql->bindValue(1, $vo->getServNome());
            $sql->bindValue(2, $vo->getServValor());
            $sql->bindValue(3, $vo->getServDescricao());
            $sql->bindValue(4, $vo->getServEmpID());
            $sql->bindValue(5, $vo->getServUserID());
        }

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function ConsultarServicoDAO($ServNome, $filtro_palavra): array
    {

        $sql = $this->conexao->prepare(ServicoSQL::ConsultarServicoBuscaSQL($ServNome, $filtro_palavra));
        $sql->bindValue(1, "%" . $filtro_palavra . "%");
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ConsultarServicoAllDAO(): array
    {

        $sql = $this->conexao->prepare(ServicoSQL::ConsultarServico());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DetalharServicoDAO($id)
    {

        $sql = $this->conexao->prepare(ServicoSQL::DetalharServicoSQL());
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RetornarServicoDAO()
    {
        $sql = $this->conexao->prepare(ServicoSQL::RetornarServicoSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function AlterarServicoDAO(ServicoVO $vo): int
    {
        $sql = $this->conexao->prepare(Servico::AlterarServicoDAO());
        $sql->bindValue(1, $vo->getNomeServico());
        $sql->bindValue(2, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirServicoDAO(ServicoVO $vo): int
    {
        $sql = $this->conexao->prepare(Servico::ExcluirServico());
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
}
