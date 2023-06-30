<?php
namespace Src\VO;

use Src\_public\Util;

class ProdutoVO extends LogErro{
    private $ProdID;
    private $ProdDescricao;
    private $ProdDtCriacao;
    private $ProdCodBarra;
    private $ProdValorCompra;
    private $ProdValorVenda;
    private $ProdEstoqueMin;
    private $ProdEstoque;
    private $ProdImagem;
    private $ProdImagemPath;
    private $ProdEmpID;
    private $ProdUserID;
    private $ProdStatus;

    public function setProdID($ProdID)
    {
        $this->ProdID = Util::remove_especial_char($ProdID);
    }

    public function getProdID()
    {
        return $this->ProdID;
    }
    
    public function setProdDescricao($ProdDescricao)
    {
        $this->ProdDescricao = Util::remove_especial_char($ProdDescricao);
    }

    public function getProdDescricao()
    {
        return $this->ProdDescricao;
    } 

    public function setProdDtCriacao($ProdDtCriacao)
    {
        $this->ProdDtCriacao = Util::remove_especial_char($ProdDtCriacao);
    }

    public function getProdDtCriacao()
    {
        return $this->ProdDtCriacao;
    } 

    public function setProdCodBarra($ProdCodBarra)
    {
        $this->ProdCodBarra = Util::remove_especial_char($ProdCodBarra);
    }

    public function getProdCodBarra()
    {
        return $this->ProdCodBarra;
    } 

    public function setProdValorCompra($ProdValorCompra)
    {
        $this->ProdValorCompra = Util::TratarDados($ProdValorCompra);
    }

    public function getProdValorCompra()
    {
        return $this->ProdValorCompra;
    } 

    public function setProdValorVenda($ProdValorVenda)
    {
        $this->ProdValorVenda = Util::TratarDados($ProdValorVenda);
    }

    public function getProdValorVenda()
    {
        return $this->ProdValorVenda;
    }
    
    public function setProdEstoqueMin($ProdEstoqueMin)
    {
        $this->ProdEstoqueMin = Util::remove_especial_char($ProdEstoqueMin);
    }

    public function getProdEstoqueMin()
    {
        return $this->ProdEstoqueMin;
    } 

    public function setProdEstoque($ProdEstoque)
    {
        $this->ProdEstoque = Util::remove_especial_char($ProdEstoque);
    }

    public function getProdEstoque()
    {
        return $this->ProdEstoque;
    } 

    public function setProdImagem($ProdImagem)
    {
        $this->ProdImagem = $ProdImagem;
    }

    public function getProdImagem()
    {
        return $this->ProdImagem;
    }
    
    public function setProdImagemPath($ProdImagemPath)
    {
        $this->ProdImagemPath = $ProdImagemPath;
    }

    public function getProdImagemPath()
    {
        return $this->ProdImagemPath;
    }

    public function setProdEmpID($ProdEmpID)
    {
        $this->ProdEmpID = Util::remove_especial_char($ProdEmpID);
    }

    public function getProdEmpID()
    {
        return $this->ProdEmpID;
    }

    public function setProdUserID($ProdUserID)
    {
        $this->ProdUserID = Util::remove_especial_char($ProdUserID);
    }

    public function getProdUserID()
    {
        return $this->ProdUserID;
    }

    public function getProdStatus()
    {
        return $this->ProdStatus;
    }

    public function setProdStatus($ProdStatus)
    {
        $this->ProdStatus = Util::remove_especial_char($ProdStatus);
    }
}
?>