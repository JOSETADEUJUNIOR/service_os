<?php
namespace Src\Model\SQL;

class EnderecoSQL
{

    public static function ALTERAR_ENDERECO()
    {
       $sql = 'UPDATE tb_endereco set rua = ?, bairro = ?, cep = ?, cidade_id = ? WHERE id = ?';
       
       return $sql;
    }

    public static function INSERIR_ENDERECO()
    {
       $sql = 'INSERT INTO tb_endereco (rua, bairro, cep, cidade_id, usuario_id) VALUES (?,?,?,?,?)';
       
       return $sql;
    }


    public static function SELECIONAR_ESTADO(){
        $sql = 'SELECT id FROM tb_estado WHERE sigla_estado LIKE ?';
        return $sql;  
  }

  public static function SELECIONAR_CIDADE(){
      $sql = 'SELECT id FROM tb_cidade WHERE nome_cidade LIKE ?';
      return $sql;  
}

public static function INSERIR_CIDADE(){

    $sql = 'INSERT INTO tb_cidade (nome_cidade, estado_id) VALUES (?,?)';

    return $sql;
}
public static function INSERIR_ESTADO(){

    $sql = 'INSERT INTO tb_estado (sigla_estado) VALUES (?)';

    return $sql;
}

}
