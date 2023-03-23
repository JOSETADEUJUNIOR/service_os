<?php

namespace Src\Controller;

use Src\Model\ChamadoDAO;
use Src\VO\ChamadoVO;
use Src\_public\Util;

class ChamadoController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ChamadoDAO;
    }

    public function AbrirChamadoController(ChamadoVO $vo)
    {
        if (empty($vo->getDescrciaoProblema()) || empty($vo->getAlocar())) {
            return 0;
        }

        $vo->setDataAbertura(Util::DataAtualBd());
        $vo->setSituacao(SITUACAO_MANUTENCAO);
        $vo->setfuncao(ABRIR_CHAMADO);
        $vo->setIdLogado($vo->getId());

        return $this->dao->AbrirChamado($vo);
    }
    public function FiltrarChamadoAbertoController(){
        return $this->dao->FiltrarChamadoAbertoDAO();
    }
    public function FiltrarChamadoController($tipo, $setor)
    {
        if ($tipo == '') {
            return 0;
        }

        return $this->dao->FiltrarChamado($tipo, $setor);
    }

    public function FiltrarChamadoGeralController($tipo, $setorID)
    {
        if ($tipo == '') {
            return 0;
        }

        return $this->dao->FiltrarChamadoGeralDAO($tipo, $setorID);
    }

    public function AtenderChamadoController(ChamadoVO $vo): int
    {
        if (empty($vo->getId()) || empty($vo->getTecnico_atendimento())) {
            return 0;
        }
        $vo->setfuncao(ATENDER_CHAMADO);
        $vo->setDataAtendimento(Util::DataAtualBd());

        return $this->dao->AtenderChamadoDAO($vo);
    }
    public function FinalizarChamadoController(ChamadoVO $vo): int
    {
        if (empty($vo->getId()) || empty($vo->getTecnicoEncerramento())) {
            return 0;
        }
        $vo->getLaudoTecnico();
        $vo->setfuncao(FINALIZAR_CHAMADO);
        $vo->setDataEnceramento(Util::DataAtualBd());
        $vo->setSituacao(SITUACAO_ALOCADO);

        return $this->dao->FinalizarChamadoDAO($vo);
    }

    public function CarregarDadosChamadoController(){
        return $this->dao->CarregarDadosChamadoDAO();
    }

    public function ChamadosPorFuncionarioController(){
        return $this->dao->ChamadosPorFuncionarioDAO();
    }
    public function ChamadosPorPeriodoController(){
        return $this->dao->ChamadosPorPeriodoDAO();
    }

    public function ChamadosPorSetorController(){
        return $this->dao->ChamadosPorSetorDAO();
    }

}




