<?php
namespace Src\VO;

use Src\_public\Util;

class ReferenciaOS extends ChamadoVO{
    private $referencia_id;
    private $chamado_id;
    private $produto_ProdID;
    private $servico_ServID;
    private $empresa_EmpID;
    private $quantidade;
    private $valor;

   

    /**
     * Get the value of referencia_id
     */ 
    public function getReferencia_id()
    {
        return $this->referencia_id;
    }

    /**
     * Set the value of referencia_id
     *
     * @return  self
     */ 
    public function setReferencia_id($referencia_id)
    {
        $this->referencia_id = $referencia_id;

        return $this;
    }

    /**
     * Get the value of chamado_id
     */ 
    public function getChamado_id()
    {
        return $this->chamado_id;
    }

    /**
     * Set the value of chamado_id
     *
     * @return  self
     */ 
    public function setChamado_id($chamado_id)
    {
        $this->chamado_id = $chamado_id;

        return $this;
    }

    /**
     * Get the value of produto_ProdID
     */ 
    public function getProduto_ProdID()
    {
        return $this->produto_ProdID;
    }

    /**
     * Set the value of produto_ProdID
     *
     * @return  self
     */ 
    public function setProduto_ProdID($produto_ProdID)
    {
        $this->produto_ProdID = $produto_ProdID;

        return $this;
    }

    /**
     * Get the value of servico_ServID
     */ 
    public function getServico_ServID()
    {
        return $this->servico_ServID;
    }

    /**
     * Set the value of servico_ServID
     *
     * @return  self
     */ 
    public function setServico_ServID($servico_ServID)
    {
        $this->servico_ServID = $servico_ServID;

        return $this;
    }

    /**
     * Get the value of empresa_EmpID
     */ 
    public function getEmpresa_EmpID()
    {
        return $this->empresa_EmpID;
    }

    /**
     * Set the value of empresa_EmpID
     *
     * @return  self
     */ 
    public function setEmpresa_EmpID($empresa_EmpID)
    {
        $this->empresa_EmpID = $empresa_EmpID;

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
}
?>