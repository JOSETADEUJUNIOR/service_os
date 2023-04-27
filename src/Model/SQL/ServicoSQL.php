<?php

namespace Src\Model\SQL;


class ServicoSQL{

    public static function InserirServicoSQL()
    {
        $sql = 'INSERT into tb_servico (ServNome, ServValor, ServDescricao, ServEmpID, ServUserID) VALUES (?,?,?,?,?)';
        return $sql;
    }

    public static function DetalharServicoSQL()
    {
        $sql = 'SELECT ServID, ServNome, ServValor, ServDescricao, ServEmpID, ServUserID
                    FROM tb_servico WHERE ServEmpID = ?' ;
        return $sql;
    }

    public static function RetornarServicoSQL()
    {
        $sql = 'SELECT ServID, ServNome, ServValor, ServDescricao, ServEmpID, ServUserID
                    FROM tb_servico';
        return $sql;
    }

    public static function AlterarServicoSQL()
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
















