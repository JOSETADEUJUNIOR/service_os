<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class SetorVO extends LogErro
{

    private $id;
    private $nome_setor;

    public function setID($id)
    {

        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setNomeSetor($nome_setor)
    {

        $this->nome_setor = Util::TratarDados($nome_setor);
    }

    public function getNomeSetor()
    {
        return $this->nome_setor;
    }
}
