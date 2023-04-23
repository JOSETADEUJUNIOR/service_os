<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ProdutoVO;
use Src\Model\SQL\ProdutoSQL;

class ProdutoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarProdutoDAO(ProdutoVO $vo): int
    {
        $sql = $this->conexao->prepare(ProdutoSQL::INSERT_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getProdDescricao());
        $sql->bindValue($i++, $vo->getProdDtCriacao());
        $sql->bindValue($i++, $vo->getProdCodBarra());
        $sql->bindValue($i++, $vo->getProdValorCompra());
        $sql->bindValue($i++, $vo->getProdValorVenda());
        $sql->bindValue($i++, $vo->getProdEstoqueMin());
        $sql->bindValue($i++, $vo->getProdEstoque());
        $sql->bindValue($i++, $vo->getProdImagem());
        $sql->bindValue($i++, $vo->getProdImagemPath());
        $sql->bindValue($i++, $vo->getProdEmpID());
        $sql->bindValue($i++, $vo->getProdUserID());
        $sql->bindValue($i++, $vo->getProdStatus());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarProdutoDAO(ProdutoVO $vo): int
    {
        $sql = $this->conexao->prepare(ProdutoSQL::UPDATE_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getProdDescricao());
        $sql->bindValue($i++, $vo->getProdCodBarra());
        $sql->bindValue($i++, $vo->getProdValorCompra());
        $sql->bindValue($i++, $vo->getProdValorVenda());
        $sql->bindValue($i++, $vo->getProdEstoqueMin());
        $sql->bindValue($i++, $vo->getProdEstoque());
        $sql->bindValue($i++, $vo->getProdImagem());
        $sql->bindValue($i++, $vo->getProdImagemPath());
        $sql->bindValue($i++, $vo->getProdID());
        $sql->bindValue($i++, $vo->getProdEmpID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarStatusProdutoDAO(ProdutoVO $vo): int
    {
        $sql = $this->conexao->prepare(ProdutoSQL::UPDATE_STATUS_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getProdStatus());
        $sql->bindValue($i++, $vo->getProdID());
        $sql->bindValue($i++, $vo->getProdEmpID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function SelecionarProdutoDAO($ProdEmpID)
    {
        $sql = $this->conexao->prepare(ProdutoSQL::SELECT_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $ProdEmpID);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DetalharProdutoDAO($ProdID, $ProdEmpID)
    {
        $sql = $this->conexao->prepare(ProdutoSQL::DETAIL_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $ProdID);
        $sql->bindValue($i++, $ProdEmpID);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
