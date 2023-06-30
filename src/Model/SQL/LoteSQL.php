<?php

namespace Src\Model\SQL;


class LoteSQL
{

    public static function InserirLote()
    {
        $sql = 'INSERT into tb_lote (numero_lote, empresa_EmpID) VALUES (?,?)';
        return $sql;
    }

    public static function InserirLoteServico()
    {
        $sql = 'INSERT into tb_lote_servico (lote_id, servico_id, valor, quantidade) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function InserirLoteInsumo()
    {
        $sql = 'INSERT into tb_lote_insumo (lote_id, insumo_id, valor, quantidade) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function InativarLote()
    {
        $sql = 'UPDATE tb_lote set status = ? WHERE id = ? and empresa_EmpID = ?';
        return $sql;
    }

    public static function InserirLoteEquip()
    {
        $sql = 'INSERT into tb_lote_equip (id_lote, equipamento_id) VALUES (?,?)';
        return $sql;
    }

    public static function FiltrarLoteSQL()
    {
        $sql = 'Select id, numero_lote, valor_total, status
                    From tb_lote
                        Inner Join tb_lote_equip on
                            id = id_lote
                                Where empresa_EmpID = ?
                                    Group by id ';
        return $sql;
    }
   
}
