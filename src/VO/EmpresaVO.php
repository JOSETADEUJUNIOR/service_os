<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErro;

class EmpresaVO extends UsuarioVO{

private $EmpID;
private $EmpNome;
private $EmpCNPJ;
private $EmpEnd;
private $EmpCep;
private $EmpNumero;
private $EmpCidade;
private $EmpDtCadastro;
private $EmpLogo;
private $EmpLogoPath;


public function setID($id){

    $this->EmpID = $id;
}

public function getID(){
    return $this->EmpID;
}

public function setNomeEmpresa($EmpNome){

    $this->EmpNome = Util::TratarDados($EmpNome);
}

public function getNomeEmpresa(){
    return $this->EmpNome;
}
public function setCNPJ($empCNPJ){
    $this->EmpCNPJ = $empCNPJ;
}

public function getCNPJ(){
    return $this->EmpCNPJ;
}
public function setEndereco($EmpEnd){
    $this->EmpEnd = Util::TratarDados($EmpEnd);
}
public function getEndereco(){
    return $this->EmpEnd;
}
public function setCep($EmpCep){
    $this->EmpCep = $EmpCep;
}
public function getCep(){
    return $this->EmpCep;
}
public function setNumero($EmpNumero){
    $this->EmpNumero = $EmpNumero;
}
public function getNumero(){
    return $this->EmpNumero;
}
public function setCidade($EmpCidade){
    $this->EmpCidade = $EmpCidade;
}
public function getCidade(){
    return $this->EmpCidade;
}
public function setDtCadastro($EmpDtCadastro){
    $this->EmpDtCadastro = $EmpDtCadastro;
}
public function getDtCadastro(){
    return $this->EmpDtCadastro;
}
public function setEmpLogo($EmpLogo){
    $this->EmpLogo = $EmpLogo;
}
public function getEmpLogo(){
    return $this->EmpLogo;
}
public function setLogoPath($EmpLogoPath){
    $this->EmpLogoPath = $EmpLogoPath;
}
public function getLogoPath(){
    return $this->EmpLogoPath;
}


}