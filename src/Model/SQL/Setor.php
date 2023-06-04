<?php

namespace Src\Model\SQL;


class Setor
{

    public static function InserirSetor()
    {
        $sql = 'INSERT into tb_setor (nome_setor, SetorEmpID) VALUES (?,?)';
        return $sql;
    }

    public static function RetornarSetor()
    {
        $sql = 'SELECT id, nome_setor
                    FROM tb_setor WHERE SetorEmpID = ?';
        return $sql;
    }

    public static function AlterarSetor()
    {
        $sql = 'UPDATE tb_setor set nome_setor = ? where id = ? and SetorEmpID = ?';
        return $sql;
    }

    public static function ExcluirSetor()
    {
        $sql = 'DELETE FROM tb_setor WHERE id = ? and SetorEmpID = ?';
        return $sql;
    }
    public static function FiltrarSetorSQL($nome_filtro)
    {
        $sql = 'SELECT id, nome_setor FROM tb_setor Where SetorEmpID = ?';

        if (!empty($nome_filtro))
            $sql = $sql . ' AND nome_setor LIKE ?';

        return $sql;
    }
}
