<?php

namespace Src\Model\SQL;

class ProdutoSQL{

    public static function INSERT_PRODUTO_SQL()
    {
        $sql = 'INSERT INTO tb_produto (ProdDescricao, ProdDtCriacao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoqueMin, ProdEstoque, ProdImagem, ProdImagemPath, ProdEmpID, ProdUserID, ProdStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function UPDATE_PRODUTO_SQL()
    {
        $sql = 'UPDATE tb_produto SET ProdDescricao = ?, ProdDtCriacao = ?, ProdCodBarra = ?, ProdValorCompra = ?, ProdValorVenda = ?, ProdEstoqueMin = ?, ProdEstoque = ?, ProdImagem = ?, ProdImagemPath = ? WHERE ProdID = ? AND ProdEmpID = ?';
        return $sql;
    }

    public static function UPDATE_STATUS_PRODUTO_SQL()
    {
        $sql = 'UPDATE tb_produto SET ProdStatus = ? WHERE ProdID = ? AND ProdEmpID = ?';
        return $sql;
    }

    public static function SELECT_PRODUTO_SQL()
    {
        $sql = 'SELECT * FROM tb_produto WHERE ProdEmpID = ?';
        return $sql;
    }

    public static function DETAIL_PRODUTO_SQL()
    {
        $sql = 'SELECT * FROM tb_produto WHERE ProdID = ? AND ProdEmpID = ?';
        return $sql;
    }
}