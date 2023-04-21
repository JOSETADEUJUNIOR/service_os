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

    public function setProdID($ProdID)
    {
        $this->ProdID = Util::TratarDados($ProdID);
    }

    public function getProdID()
    {
        return $this->ProdID;
    }
    
    public function setProdDescricao($ProdDescricao)
    {
        $this->ProdDescricao = Util::TratarDados($ProdDescricao);
    }

    public function getProdDescricao()
    {
        return $this->ProdDescricao;
    } 

    public function setProdDtCriacao($ProdDtCriacao)
    {
        $this->ProdDtCriacao = Util::TratarDados($ProdDtCriacao);
    }

    public function getProdDtCriacao()
    {
        return $this->ProdDtCriacao;
    } 

    public function setProdCodBarra($ProdCodBarra)
    {
        $this->ProdCodBarra = Util::TratarDados($ProdCodBarra);
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
        $this->ProdEstoqueMin = Util::TratarDados($ProdEstoqueMin);
    }

    public function getProdEstoqueMin()
    {
        return $this->ProdEstoqueMin;
    } 

    public function setProdEstoque($ProdEstoque)
    {
        $this->ProdEstoque = Util::TratarDados($ProdEstoque);
    }

    public function getProdEstoque()
    {
        return $this->ProdEstoque;
    } 

    public function setProdImagem($ProdImagem)
    {
        $this->ProdImagem = Util::TratarDados($ProdImagem);
    }

    public function getProdImagem()
    {
        return $this->ProdImagem;
    }
    
    public function setProdImagemPath($ProdImagemPath)
    {
        $this->ProdImagemPath = Util::TratarDados($ProdImagemPath);
    }

    public function getProdImagemPath()
    {
        return $this->ProdImagemPath;
    }

    public function setProdEmpID($ProdEmpID)
    {
        $this->ProdEmpID = Util::TratarDados($ProdEmpID);
    }

    public function getProdEmpID()
    {
        return $this->ProdEmpID;
    }

    public function setProdUserID($ProdUserID)
    {
        $this->ProdUserID = Util::TratarDados($ProdUserID);
    }

    public function getProdUserID()
    {
        return $this->ProdUserID;
    }
}
?>