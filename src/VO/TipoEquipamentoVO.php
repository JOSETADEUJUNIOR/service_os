<?php

namespace Src\VO;

Use Src\_public\Util;
use Src\VO\LogErro;

class TipoEquipamentoVO extends LogErro
{

private $id;
private $nome;

public function setID($id){

    $this->id = $id;
}

public function getID(){
    return $this->id;
}

public function setNome($nome){

    $this->nome = Util::TratarDados($nome);
}

public function getNome(){
    return $this->nome;
}


}