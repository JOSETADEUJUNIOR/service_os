<?php

namespace Src\Model;

use Src\_public\Util;
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
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->bindValue($i++, Util::CodigoLogado());
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
        $sql->bindValue($i++, Util::EmpresaLogado());

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
        $sql->bindValue($i++, Util::EmpresaLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function SelecionarProdutoDAO()
    {
        $sql = $this->conexao->prepare(ProdutoSQL::SELECT_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function SelecionarProdutoAPIDAO($empresa_id)
    {
        $sql = $this->conexao->prepare(ProdutoSQL::SELECT_PRODUTO_SQL());
        $i = 1;
        $sql->bindValue($i++, $empresa_id);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function SelecionarServicoAPIDAO($empresa_id)
    {
        $sql = $this->conexao->prepare(ProdutoSQL::SELECT_SERVICO_SQL());
        $i = 1;
        $sql->bindValue($i++, $empresa_id);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarProdutoDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(ProdutoSQL::FILTER_PRODUTO_SQL($nome_filtro));
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        if (!empty($nome_filtro)) {
            $sql->bindValue($i++, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DadosEmpresaDAO()
    {
        $sql = $this->conexao->prepare(ProdutoSQL::DADOS_EMPRESA_SQL());
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
}
