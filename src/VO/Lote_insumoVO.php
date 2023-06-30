<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LoteVO;

class Lote_insumoVO extends LoteVO
{

    private $insumo_id;
    private $valor;
    private $quantidade;

  

    /**
     * Get the value of insumo_id
     */ 
    public function getInsumo_id()
    {
        return $this->insumo_id;
    }

    /**
     * Set the value of insumo_id
     *
     * @return  self
     */ 
    public function setInsumo_id($insumo_id)
    {
        $this->insumo_id = $insumo_id;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
}
