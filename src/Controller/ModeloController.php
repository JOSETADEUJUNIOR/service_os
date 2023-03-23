<?php

namespace Src\Controller;

use Src\Model\ModeloDAO;
use Src\VO\ModeloEquipVO;
use Src\_public\Util;

class ModeloController {

    private $dao;

    public function __construct()
    {
        $this->dao = new ModeloDAO;
        
    }

    public function CadastrarModelo(ModeloEquipVO $vo) : int
    {
        if (empty($vo->getNome()))
            return 0;
        $vo->setfuncao(CADASTRO_MODELO);
        $vo->setIdLogado(Util::CodigoLogado());

       
        return $this->dao->CadastrarModelo($vo);

    }

    public function RetornaModeloController(): array
    {
        return $this->dao->RetornaModeloDAO();

    }
    public function FiltrarModeloController($nome_filtro){
 
        return $this->dao->FiltrarModeloDAO($nome_filtro);
    }

    public function AlterarModeloController(ModeloEquipVO $vo): int
    {
        if (empty($vo->getNome())) 
        return 0;
            
            $vo->setfuncao(ALTERAR_MODELO);
            $vo->setIdLogado(Util::CodigoLogado());

            return $this->dao->AlterarModeloDAO($vo);
        
    }

    public function ExcluirModeloController(ModeloEquipVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(EXCLUIR_MODELO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirModeloDAO($vo);
    }

    
}