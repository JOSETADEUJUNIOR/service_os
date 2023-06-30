<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LoteVO;

class Lote_servicoVO extends LoteVO
{

    private $servico_id;
    private $valor;
    private $quantidade;

    /**
     * Get the value of servico_id
     */ 
    public function getServico_id()
    {
        return $this->servico_id;
    }

    /**
     * Set the value of servico_id
     *
     * @return  self
     */ 
    public function setServico_id($servico_id)
    {
        $this->servico_id = $servico_id;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getServicoValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setServicoValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of quantidade
     */ 
    public function getServicoQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */ 
    public function setServicoQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
}
