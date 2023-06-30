<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\LogErro;

class LoteVO extends LogErro
{

    private $id;
    private $numero_lote;
    private $valor_total;
    private $equipamento_id;
    private $versao;
    private $numero_serie;
    private $empresa_id;
    private $qtdEquip;
    private $status;

    private $insumo_id;
    private $valor_insumo;
    private $quantidade_insumo;
    
    private $servico_id;
    private $valor_servico;
    private $quantidade_servico;


   

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of numero_lote
     */ 
    public function getNumero_lote()
    {
        return $this->numero_lote;
    }

    /**
     * Set the value of numero_lote
     *
     * @return  self
     */ 
    public function setNumero_lote($numero_lote)
    {
        $this->numero_lote = $numero_lote;

        return $this;
    }

    /**
     * Get the value of valor_total
     */ 
    public function getValor_total()
    {
        return $this->valor_total;
    }

    /**
     * Set the value of valor_total
     *
     * @return  self
     */ 
    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    /**
     * Get the value of equipamento_id
     */ 
    public function getEquipamento_id()
    {
        return $this->equipamento_id;
    }

    /**
     * Set the value of equipamento_id
     *
     * @return  self
     */ 
    public function setEquipamento_id($equipamento_id)
    {
        $this->equipamento_id = $equipamento_id;

        return $this;
    }

    /**
     * Get the value of versao
     */ 
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * Set the value of versao
     *
     * @return  self
     */ 
    public function setVersao($versao)
    {
        $this->versao = $versao;

        return $this;
    }

    /**
     * Get the value of numero_serie
     */ 
    public function getNumero_serie()
    {
        return $this->numero_serie;
    }

    /**
     * Set the value of numero_serie
     *
     * @return  self
     */ 
    public function setNumero_serie($numero_serie)
    {
        $this->numero_serie = $numero_serie;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of empresa_id
     */ 
    public function getEmpresa_id()
    {
        return $this->empresa_id;
    }

    /**
     * Set the value of empresa_id
     *
     * @return  self
     */ 
    public function setEmpresa_id($empresa_id)
    {
        $this->empresa_id = $empresa_id;

        return $this;
    }

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
     * Get the value of valor_insumo
     */ 
    public function getValor_insumo()
    {
        return $this->valor_insumo;
    }

    /**
     * Set the value of valor_insumo
     *
     * @return  self
     */ 
    public function setValor_insumo($valor_insumo)
    {
        $this->valor_insumo = $valor_insumo;

        return $this;
    }

    /**
     * Get the value of quantidade_insumo
     */ 
    public function getQuantidade_insumo()
    {
        return $this->quantidade_insumo;
    }

    /**
     * Set the value of quantidade_insumo
     *
     * @return  self
     */ 
    public function setQuantidade_insumo($quantidade_insumo)
    {
        $this->quantidade_insumo = $quantidade_insumo;

        return $this;
    }

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
     * Get the value of valor_servico
     */ 
    public function getValor_servico()
    {
        return $this->valor_servico;
    }

    /**
     * Set the value of valor_servico
     *
     * @return  self
     */ 
    public function setValor_servico($valor_servico)
    {
        $this->valor_servico = $valor_servico;

        return $this;
    }

    /**
     * Get the value of quantidade_servico
     */ 
    public function getQuantidade_servico()
    {
        return $this->quantidade_servico;
    }

    /**
     * Set the value of quantidade_servico
     *
     * @return  self
     */ 
    public function setQuantidade_servico($quantidade_servico)
    {
        $this->quantidade_servico = $quantidade_servico;

        return $this;
    }

    /**
     * Get the value of qtdEquip
     */ 
    public function getQtdEquip()
    {
        return $this->qtdEquip;
    }

    /**
     * Set the value of qtdEquip
     *
     * @return  self
     */ 
    public function setQtdEquip($qtdEquip)
    {
        $this->qtdEquip = $qtdEquip;

        return $this;
    }
}
