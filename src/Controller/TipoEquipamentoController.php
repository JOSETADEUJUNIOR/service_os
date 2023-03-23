<?php

namespace Src\Controller;

use Src\Model\TipoEquipamentoDAO;
use Src\VO\TipoEquipamentoVO;
use Src\_public\Util;


class TipoEquipamentoController{

    private $dao;

    public function __construct()
    {
        $this->dao = new TipoEquipamentoDAO;

    }

    public function CadastrarTipoEquipamento(TipoEquipamentoVO $vo): int
    {
        if(empty($vo->getNome()))
        return 0;

        $vo->setfuncao(CADASTRO_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());
        
        return $this->dao->CadastrarTipo($vo);
    }

    public function RetornarTiposEquipamentosController(){
 
        return $this->dao->RetornarTipoEquipamentoDAO();
    }
    
    public function FiltrarTiposEquipamentosController($nome_filtro){
 
        return $this->dao->FiltrarTipoEquipamentoDAO($nome_filtro);
    }
    
    public function AlterarTipoEquipamentoController(TipoEquipamentoVO $vo): int
    {
        if (empty($vo->getNome()))
        return 0;

        $vo->setfuncao(ALTERAR_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarTipoEquipamentoDAO($vo);
    }

    public function ExcluirTipoEquipamentoController(TipoEquipamentoVO $vo): int
    {
        if (empty($vo->getID()))
        return 0;

        $vo->setfuncao(EXCLUIR_TIPO_EQUIPAMENTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirTipoEquipamentoDAO($vo);
    }

}