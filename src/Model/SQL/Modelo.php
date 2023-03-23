<?php

namespace Src\Model\SQL;



class Modelo{

    public static function InserirModelo()
    {
        $sql = 'INSERT into tb_modeloequip (nome) VALUES (?)';
        return $sql;
    }

    public static function RetornaModelo(){
        $sql = 'SELECT id, nome
                    from tb_modeloequip';

        return $sql;
    }

    public static function FiltrarModeloSQL($nome_filtro){

        $sql = 'SELECT id, nome FROM tb_modeloequip';

        if (!empty($nome_filtro))
            $sql = $sql . ' WHERE nome LIKE ?';
    
        return $sql;
    
    }

    public static function AlterarModeloSQL()
    {
        $sql = 'UPDATE tb_modeloequip 
                    set nome = ? WHERE id = ?';
        return $sql;
    }

    public static function ExcluirModeloSQL()
    {
        $sql = 'DELETE FROM tb_modeloequip
                        WHERE id = ?';

        return $sql;
    }
}