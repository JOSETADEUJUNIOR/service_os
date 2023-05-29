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
        $sql = 'UPDATE tb_produto SET ProdDescricao = ?, ProdCodBarra = ?, ProdValorCompra = ?, ProdValorVenda = ?, ProdEstoqueMin = ?, ProdEstoque = ?, ProdImagem = ?, ProdImagemPath = ? WHERE ProdID = ? AND ProdEmpID = ?';
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
    public static function SELECT_SERVICO_SQL()
    {
        $sql = 'SELECT * FROM tb_servico WHERE ServEmpID = ?';
        return $sql;
    }

    public static function FILTER_PRODUTO_SQL($nome_filtro)
    {
        $sql = 'SELECT ProdID, ProdDescricao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoqueMin, ProdEstoque, ProdStatus, ProdImagem, ProdImagemPath FROM tb_produto WHERE ProdEmpID = ?';

        if (!empty($nome_filtro))
            $sql = $sql . ' AND ProdDescricao LIKE ?';

        return $sql;
    }

    public static function DADOS_EMPRESA_SQL()
    {
        $sql = 'SELECT EmpNome, EmpCNPJ, EmpLogoPath, EmpEnd, EmpCidade, EmpNumero  FROM tb_empresa WHERE EmpID = ?';
        return $sql;
    }
}