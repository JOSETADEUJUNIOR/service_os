<?php

namespace Src\Model\SQL;


class ServicoSQL{

public static function RetornarServicoSQL()
{
    $sql = 'SELECT ServID, ServNome, ServValor, ServDescricao
                FROM tb_servico
                    WHERE ServEmpID = ?';
    return $sql;
} 


}
















