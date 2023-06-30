<?php

namespace Src\Controller;

use Src\Model\LoteDAO;
use Src\VO\LoteVO;
use Src\_public\Util;


class LoteController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new LoteDAO;
    }

    public function InserirLoteController($vo)
    {
      /*   $vo->setfuncao(CADASTRAR_LOTE);
        $vo->setIdLogado($vo->getId());
 */
        return $this->dao->CadastrarLoteDAO($vo);
    }

    public function FiltrarLoteController($empresa): array
    {
        return $this->dao->FiltrarLoteDAO($empresa);

    }

    

}




