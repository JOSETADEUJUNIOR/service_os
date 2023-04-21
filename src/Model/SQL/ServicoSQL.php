<?php

namespace Src\Model\SQL;


class ServicoSQL{

    public static function InserirServico()
    {
        $sql = 'INSERT into tb_servico (ServNome, ServValor, ServDescricao, ServEmpID, ServUserID) VALUES (?,?,?,?,?)';
        return $sql;
    }

    public static function RetornarServico()
    {
        $sql = 'SELECT ServID, ServNome, ServValor, ServDescricao, ServEmpID, ServUserID
                    FROM tb_servico WHERE ServEmpID = ?' ;
        return $sql;
    }

    public static function AlterarServico()
    {
        $sql = 'UPDATE tb_servico set ServNome = ?, ServValor = ?, ServDescricao = ?, ServEmpID = ?, ServUserID = ? where ServID = ?';
        return $sql;
    }
    public static function FiltrarServicoSQL($nome_filtro)
    {
        $sql = 'SELECT ServID, ServNome, ServValor, ServDescricao
                     FROM tb_servico WHERE ServEmpID = ?';
        if (!empty($nome_filtro)) {
            $sql = $sql . ' And ServNome LIKE ? OR ServValor LIKE ? OR ServDescricao LIKE ?';
        }
        return $sql;
    }

    public static function ExcluirServico()
    {
        $sql = 'DELETE FROM tb_servico where Servid = ?';
        return $sql;
    }

}
















