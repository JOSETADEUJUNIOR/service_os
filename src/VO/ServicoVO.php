<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class ServicoVO extends LogErro{

private $ServID;
private $ServNome;
private $ServValor;
private $ServDescricao;
private $ServEmpID;
private $ServUserID;

/**
 * Get the value of ServID
 */ 
public function getServID()
{
return $this->ServID;
}

/**
 * Set the value of ServID
 *
 * @return  self
 */ 
public function setServID($ServID)
{
$this->ServID = $ServID;

return $this;
}

/**
 * Get the value of ServNome
 */ 
public function getServNome()
{
return $this->ServNome;
}

/**
 * Set the value of ServNome
 *
 * @return  self
 */ 
public function setServNome($ServNome)
{
$this->ServNome = Util::TratarDados($ServNome);

return $this;
}

/**
 * Get the value of ServValor
 */ 
public function getServValor()
{
return $this->ServValor;
}

/**
 * Set the value of ServValor
 *
 * @return  self
 */ 
public function setServValor($ServValor)
{
$this->ServValor = $ServValor;

return $this;
}

/**
 * Get the value of ServDescricao
 */ 
public function getServDescricao()
{
return $this->ServDescricao;
}

/**
 * Set the value of ServDescricao
 *
 * @return  self
 */ 
public function setServDescricao($ServDescricao)
{
$this->ServDescricao = $ServDescricao;

return $this;
}

/**
 * Get the value of ServEmpID
 */ 
public function getServEmpID()
{
return $this->ServEmpID;
}

/**
 * Set the value of ServEmpID
 *
 * @return  self
 */ 
public function setServEmpID($ServEmpID)
{
$this->ServEmpID = $ServEmpID;

return $this;
}

/**
 * Get the value of ServUserID
 */ 
public function getServUserID()
{
return $this->ServUserID;
}

/**
 * Set the value of ServUserID
 *
 * @return  self
 */ 
public function setServUserID($ServUserID)
{
$this->ServUserID = $ServUserID;

return $this;
}
}