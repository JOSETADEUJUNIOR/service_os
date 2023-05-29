<?php

namespace Src\Controller;

use Src\Model\ChamadoDAO;
use Src\VO\ChamadoVO;
use Src\_public\Util;
use Src\VO\ReferenciaOS;

class ChamadoController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ChamadoDAO;
    }

    public function AbrirChamadoController(ChamadoVO $vo)
    {
        if (empty($vo->getDescrciaoProblema()) || empty($vo->getNumero_nf()) || empty($vo->getCliente_id()) || empty($vo->getDefeito()) || empty($vo->getObservacao())) {
            return 0;
        }

        $vo->setDataAbertura(Util::DataAtualBd());
        $vo->setSituacao(SITUACAO_MANUTENCAO);
        $vo->setfuncao(ABRIR_CHAMADO);
        $vo->setIdLogado($vo->getId());

        return $this->dao->AbrirChamado($vo);
    }

/*     public function GravarDadosOsController(ReferenciaOS $vo)
    {
        
        return $this->dao->GravarDadosOsDAO($vo);
    } */

    public function RemoveProdOsController(ReferenciaOS $vo):int
    {
        if (empty($vo->getReferencia_id()) || empty($vo->getEmpresa_EmpID())) {
            return 0;
        }
        return $this->dao->RemoveProdOsDAO($vo);
    }

    public function RemoveServOsController(ReferenciaOS $vo):int
    {
        if (empty($vo->getReferencia_id()) || empty($vo->getEmpresa_EmpID())) {
            return 0;
        }
        return $this->dao->RemoveServOsDAO($vo);
    }

    public function GravarDadosOsGeralController(array $produtos, $chamado_id, $empresa_id)
    {
        return $this->dao->GravarDadosOsGeralDAO($produtos, $chamado_id, $empresa_id);
    }

    public function GravarDadosServOsGeralController(array $servicos, $chamado_id, $empresa_id)
    {
        return $this->dao->GravarDadosServOsGeralDAO($servicos, $chamado_id, $empresa_id);
    }

    public function CarregarProdutosOSController($chamado_id)
    {
        
        return $this->dao->CarregarProdutosOSDAO($chamado_id);
    }

    public function CarregarProdServOSController($chamado_id)
    {
        
        return $this->dao->CarregarProdServOSDAO($chamado_id);
    }


    
    public function CarregarServicosOSController($chamado_id)
    {
        
        return $this->dao->CarregarServicosOSDAO($chamado_id);
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

    public function FiltrarChamadoGeralController($empresa_id, $tipo, $setorID)
    {
        if ($tipo == '') {
            return 0;
        }
        
        return $this->dao->FiltrarChamadoGeralDAO($empresa_id, $tipo, $setorID);
    }

    public function FiltrarNFController($empresa_id, $valordigitado)
    {
       
        return $this->dao->FiltrarNFDAO($empresa_id, $valordigitado);
    }
    
    public function DetalharEmpresaController($empresa_id)
    {
       
        return $this->dao->DetalharEmpresaDAO($empresa_id);
    }

    public function DetalharDadosOsController($empresa_id, $os_id)
    {
       
        return $this->dao->DetalharDadosOsDAO($empresa_id, $os_id);
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




