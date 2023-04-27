<?php

namespace Src\Controller;

use Src\Model\ProdutoDAO;
use Src\VO\ProdutoVO;
use Src\_public\Util;


class ProdutoController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ProdutoDAO;
    }

    public function CadastrarProdutoCTRL(ProdutoVO $vo): int
    {
        if (empty($vo->getProdDescricao()) || empty($vo->getProdCodBarra()) || empty($vo->getProdValorCompra()) || empty($vo->getProdValorVenda()) || empty($vo->getProdEstoqueMin()) || empty($vo->getProdEstoque()))
            return 0;
        
        $vo->setProdDtCriacao(date('Y-m-d'));
        $vo->setProdStatus(STATUS_ATIVO);
        $vo->setfuncao(CADASTRO_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarProdutoDAO($vo);
    }

    public function AlterarProdutoCTRL(ProdutoVO $vo): int
    {
        if (empty($vo->getProdDescricao()) || empty($vo->getProdCodBarra()) || empty($vo->getProdValorCompra()) || empty($vo->getProdValorVenda()) || empty($vo->getProdEstoqueMin()) || empty($vo->getProdEstoque()))
            return 0;

        $vo->setfuncao(ALTERA_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarProdutoDAO($vo);
    }

    public function AlterarStatusProdutoCTRL(ProdutoVO $vo): int
    {
        if ($vo->getProdStatus() == "")
            return 0;

        $vo->setfuncao(STATUS_PRODUTO);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarStatusProdutoDAO($vo);
    }

    public function SelecioneProdutoCTRL(): array
    {
        $dados = $this->dao->SelecionarProdutoDAO();
        for($i = 0; $i < count($dados); $i++){
            $dados[$i]['ProdStatus'] = $dados[$i]['ProdStatus'] == STATUS_ATIVO ? 'Ativo' : 'Inativo';
        }
        return $dados;
    }

    public function FiltrarProdutoCTRL($nome_filtro)
    {
        $dados = $this->dao->FiltrarProdutoDAO($nome_filtro);
        for($i = 0; $i < count($dados); $i++){
            $dados[$i]['ProdStatus'] = $dados[$i]['ProdStatus'] == STATUS_ATIVO ? 'Ativo' : 'Inativo';
        }
        return $dados;
    }
}
