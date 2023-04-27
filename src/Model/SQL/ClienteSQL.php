<?php

namespace Src\Model\SQL;

class ClienteSQL{

    public static function INSERT_CLIENTE_SQL()
    {
        $sql = 'INSERT INTO tb_cliente (CliNome, CliDtNasc, CliTelefone, CliEmail, CliCep, CliEndereco, CliNumero, CliBairro, CliCidade, CliEstado, CliDescricao, CliEmpID, CliStatus, CliUserID, CliCpfCnpj, CliTipo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        return $sql;
    }

    public static function UPDATE_CLIENTE_SQL()
    {
        $sql = 'UPDATE tb_cliente SET CliNome = ?, CliDtNasc = ?, CliTelefone = ?, CliEmail = ?, CliCep = ?, CliEndereco = ?, CliNumero = ?, CliBairro = ?, CliCidade = ?, CliEstado = ?, CliDescricao = ?, CliCpfCnpj = ?, CliTipo = ? WHERE CliID = ? AND CliEmpID = ?';
        return $sql;
    }

    public static function UPDATE_STATUS_CLIENTE_SQL()
    {
        $sql = 'UPDATE tb_cliente SET CliStatus = ? WHERE CliID = ? AND CliEmpID = ?';
        return $sql;
    }

    public static function SELECT_CLIENTE_SQL()
    {
        $sql = 'SELECT * FROM tb_cliente WHERE CliEmpID = ?';
        return $sql;
    }

    public static function FILTER_CLIENTE_SQL($nome_filtro)
    {
        $sql = 'SELECT * FROM tb_cliente WHERE CliEmpID = ?';

        if (!empty($nome_filtro))
            $sql = $sql . ' AND CliNome LIKE ?';

        return $sql;
    }
}