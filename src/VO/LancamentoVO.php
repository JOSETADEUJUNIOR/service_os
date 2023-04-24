<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErro;

class LancamentoVO extends LogErro{

private $LancID;
private $LancDescricao;
private $LancValor;
private $LancDesconto;
private $LancDtVencimento;
private $LancDtPagamento;
private $LancBaixado;
private $LancFormPgto;
private $Tipo;
private $LancClienteID;

public function setID($p){

    $this->LancID = $p;
}

public function getID(){
    return $this->LancID;
}

public function setDescricao($p){

    $this->LancDescricao = Util::TratarDados($p);
}

public function getDescricao(){
    return $this->LancDescricao;
}

public function setValor($p){

    $this->LancValor = Util::TratarDados($p);
}

public function getValor(){
    return $this->LancValor;
}

public function setDesconto($p){

    $this->LancDesconto = Util::TratarDados($p);
}

public function getDesconto(){
    return $this->LancDesconto;
}

public function setDtVencimento($p){

    $this->LancDtVencimento = Util::TratarDados($p);
}

public function getDtVencimento(){
    return $this->LancDtVencimento;
}

public function setDtPagamento($p){

    $this->LancDtPagamento = Util::TratarDados($p);
}

public function getDtPagamento(){
    return $this->LancDtPagamento;
}

public function setBaixado($p){

    $this->LancBaixado = Util::TratarDados($p);
}

public function getBaixado(){
    return $this->LancBaixado;
}

public function setFormPgto($p){

    $this->LancFormPgto = Util::TratarDados($p);
}

public function getFormPgto(){
    return $this->LancFormPgto;
}

public function setTipo($p){

    $this->Tipo = Util::TratarDados($p);
}

public function getTipo(){
    return $this->Tipo;
}

public function setClienteID($p){

    $this->LancClienteID = Util::TratarDados($p);
}

public function getClienteID(){
    return $this->LancClienteID;
}


}