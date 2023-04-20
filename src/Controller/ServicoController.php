<?php

namespace Src\Controller;

use Src\Model\ServicoDAO;
use Src\VO\ServicoVO;
use Src\_public\Util;

class ServicoController {

    private $dao;

    public function __construct()
    {
        $this->dao = new ServicoDAO;
        
    }

   

    public function RetornarServicoController(): array
    {
        return $this->dao->RetornarServicoDAO();

    }
    

    
}