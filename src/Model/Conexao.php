<?php

namespace Src\Model;

// Configurações do Site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', NULL); //senha
define('DB', 'db_os'); //banco

/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao
{

    /** @var PDO */
    private static $Connect;

    private static function Conectar()
    {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null) :

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;
                self::$Connect = new \PDO($dsn, USER, PASS, null);
            endif;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


        return  self::$Connect;
    }

    public static function retornaConexao()
    {
        return  self::Conectar();
    }

    public static function GravarLogErro($vo)
    {

        $arquivo = PATH_URL . 'Model/logs/log_erro.txt';

        if (!file_exists($arquivo)) :

            $arquivo = fopen($arquivo, 'w');

        else :
            $arquivo = fopen($arquivo, 'a+');

        endif;


        $texto_msg = '--------------------------------------------------' . PHP_EOL;
        $texto_msg .= 'Data:' . $vo->getDataErro() . PHP_EOL;
        $texto_msg .= 'Hora:' . $vo->getHoraErro() . PHP_EOL;
        $texto_msg .= 'Função:' . $vo->getfuncao() . PHP_EOL;
        $texto_msg .= 'cod Logado:' . $vo->getIdLogado() . PHP_EOL;
        $texto_msg .= 'Erro:' . $vo->getmsg_erro() . PHP_EOL;

        fwrite($arquivo, $texto_msg);
        fclose($arquivo);
    }
}
