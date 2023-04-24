<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class ProdutoOSVO extends OsVO
{

    private $ProdOSID;
    private $ProdOsQtd;
    private $ProdOs_osID;
    private $ProdOsProdID;
    private $ProdOsSubTotal;
   
    public function setProdOsID($id)
    {

        $this->ProdOSID = $id;
    }

    public function getProdOsID()
    {
        return $this->ProdOSID;
    }

    public function setProdQtd($p)
    {

        $this->ProdOsQtd = $p;
    }

    public function getProdQtd()
    {
        return $this->ProdOsQtd;
    }
    public function setOsID($p)
    {

        $this->ProdOs_osID = $p;
    }

    public function getOsID()
    {
        return $this->ProdOs_osID;
    }
    public function setOsProdID($p)
    {

        $this->ProdOsProdID = $p;
    }

    public function getOsProdID()
    {
        return $this->ProdOsProdID;
    }
    public function setOsSubTotal($p)
    {

        $this->ProdOsSubTotal = $p;
    }

    public function getOsSubTotal()
    {
        return $this->ProdOsSubTotal;
    }

    
}
