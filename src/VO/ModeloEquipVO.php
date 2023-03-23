<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class ModeloEquipVO extends LogErro{

private $id;
private $nome;

public function setID($id){

    $this->id = $id;
}

public function getID(){
    return $this->id;
}

public function setNome($nome){

    $this->nome = Util::remove_especial_char($nome);
}

public function getNome(){
    return $this->nome;
}


}