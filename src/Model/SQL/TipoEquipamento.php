<?php

namespace Src\Model\SQL;


class TipoEquipamento{

    public static function InserirTipo(){
        $sql = 'INSERT into tb_tipoequip (nome) VALUES (?)';
        return $sql;
    }

    public static function RetornarTiposEquipamentos(){
        $sql = 'SELECT id,nome
                    FROM tb_tipoequip';
        return $sql;
    }

    public static function FiltrarTipoEquipamentoSQL($nome_filtro){

        $sql = 'SELECT id, nome FROM tb_tipoequip';

        if (!empty($nome_filtro))
            $sql = $sql . ' WHERE nome LIKE ?';
    
        return $sql;
    
    }


    public static function AlterarTipoEquipamentoSQL()
    {
        $sql = 'UPDATE tb_tipoequip set nome = ?
                            WHERE id = ?';
                             return $sql;
    }

    public static function ExcluirTipoEquipamentoSQL()
    {
        $sql = 'DELETE FROM tb_tipoequip WHERE id = ?';
        return $sql;
    }




}