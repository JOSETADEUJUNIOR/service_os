<?php

namespace Src\Model;

use Exception;
use Src\Model\Conexao;
use Src\VO\ChamadoVO;
use Src\Model\SQL\ChamadoSQL;

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
        $sql->bindValue($i++, $vo->getAlocar());

        $this->conexao->beginTransaction();
        try {
            $sql->execute();

            $sql = $this->conexao->prepare(ChamadoSQL::ATUALIZAR_ALOCAMENTO());
            $i = 1;
            $sql->bindValue($i++, $vo->getSituacao());
            $sql->bindValue($i++, $vo->getAlocar());
            $sql->execute();

            $this->conexao->commit();
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function FiltrarChamadoAbertoDAO(){
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

    public function FiltrarChamadoGeralDAO($tipo, $setorID)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO_GERAL($tipo, $setorID));
        if (!empty($setorID)) {

            $sql->bindValue(1, $setorID);
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

    public function CarregarDadosChamadoDAO(){

        $sql = $this->conexao->prepare(ChamadoSQL::CarregarDadosChamadoSQL());
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }

    public function ChamadosPorFuncionarioDAO(){

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorFuncionarioSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ChamadosPorPeriodoDAO(){

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorPeriodoSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function ChamadosPorSetorDAO(){

        $sql = $this->conexao->prepare(ChamadoSQL::ChamadosPorSetorSQL());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

}










