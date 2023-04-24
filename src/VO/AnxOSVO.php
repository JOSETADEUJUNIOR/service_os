<?php

namespace Src\VO;

class AnxOSVO extends OsVO
{

    private $AnxID;
    private $AnxNome;
    private $AnxUrl;
    private $AnxPath;
    private $AnxOsID;

    public function setAnxID($id)
    {

        $this->AnxID = $id;
    }

    public function getAnxID()
    {
        return $this->AnxID;
    }

    public function setAnxNome($p)
    {

        $this->AnxNome = $p;
    }

    public function getAnxNome()
    {
        return $this->AnxNome;
    }
    public function setAnxUrl($p)
    {

        $this->AnxUrl = $p;
    }

    public function getAnxUrl()
    {
        return $this->AnxUrl;
    }
    public function setAnxPath($p)
    {

        $this->AnxPath = $p;
    }

    public function getAnxPath()
    {
        return $this->AnxPath;
    }
    public function setAnxOsID($p)
    {

        $this->AnxOsID = $p;
    }

    public function getAnxOsID()
    {
        return $this->AnxOsID;
    }
}
