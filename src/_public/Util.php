<?php

namespace Src\_public;

class Util
{

    public static function IniciarSessao()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($id, $nome)
    {
        self::IniciarSessao();
        $_SESSION['id']   = $id;
        $_SESSION['nome'] = $nome;
    }

    public static function CodigoLogado()
    {

        self::IniciarSessao();
        return isset($_SESSION['id']) ? $_SESSION['id'] : 0;
    }
    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    public static function Deslogar($pag)
    {
        self::IniciarSessao();
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        self::chamarPagina($pag);
    }

    public static function IrParaLogin()
    {
        #para acesso local
       /*  header('location: http://localhost/service_os/src/View/admin/login.php');
         */
        #para acesso em produção
        header('location: https://siteparaseunegocio.com/service_os/src/View/admin/login.php');
        exit;

    }


    public static function LogHoraUsuario(){
        // Obtém o horário atual e o endereço IP do usuário
        $hora = date('H:i:s');
        return $hora;
    }
    public static function LogIPUsuario(){
        // Obtém o horário atual e o endereço IP do usuário
        $ip = $_SERVER['REMOTE_ADDR'];
        return $ip;
    }
    
    public static function VerificarLogado()
    {
        self::IniciarSessao();
        if (!isset($_SESSION['id'])) {
            self::IrParaLogin();
        }
    }

    public static function TratarDados($palavra)
    {

        return strip_tags(trim($palavra));
    }


    private static function SetarFusoHorario()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function HoraAtual()
    {
        self::SetarFusoHorario();
        return date('H:i:s');
    }

    public static function debug($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function chamarPagina($pag)
    {

        header("location: $pag");
        exit;
    }
    public static function DataAtual()
    {
        self::SetarFusoHorario();
        return date('d/m/Y');
    }
    public static function DataAtualBd()
    {
        self::SetarFusoHorario();
        return date('Y-m-d H:i:s');
    }

    //Remove pontuação
    public static function remove_especial_char($string)
    {
        $especiais = array(".", ",", ";", "!", "@", "#", "%", "¨", "*", "(", ")", "+", "-", "=", "§", "$", "|", "\\", ":", "/", "<", ">", "?", "{", "}", "[", "]", "&", "'", '"', "´", "`", "?", '“', '”', '$', "'", "'");
        $string = str_replace($especiais, "", strip_tags(trim($string)));
        return $string;
    }
    public static function RetornarSenhaCriptografada($palavra)
    {
        return password_hash($palavra, PASSWORD_DEFAULT);
    }

    public static function ExibirDataBr($data)
    {

        if ($data == "") {
            return "";
        } else {
            $data_array = explode('-', $data);
            $data_br = $data_array[2] . '/' . $data_array[1] . '/' . $data_array[0];

            return $data_br;
        }
    }

    public static function FormatarValor($number)
    {
        return  number_format($number, 2, ',', '.');
    }

    public static function CriarSenha($palavra)
    {

        $senha_array = explode('@', $palavra);

        return password_hash($senha_array[0], PASSWORD_DEFAULT);
    }

    public static function ValidarSenhaBanco($senha, $senha_hash)
    {
        return password_verify($senha, $senha_hash);
    }

    public static function DescricaoTipo($tipo): string
    {
        $nome = '';
        switch ($tipo) {
            case PERFIL_ADM:
                $nome = "ADMINISTRADOR";
                break;
            case PERFIL_TECNICO:
                $nome = "TÉCNICO";
                break;
            case PERFIL_FUNCIONARIO:
                $nome = "FUNCIONÁRIO";
                break;
        }
        return $nome;
    }

    public static function DescricaoStatus($status): string
    {
        $nome = '';
        switch ($status) {
            case STATUS_ATIVO:
                $nome = "ATIVO";
                break;
            case STATUS_INATIVO:
                $nome = "INATIVO";
                break;
        }
        return $nome;
    }

    public static function CreateTokenAuthentication(array $dados_user)
    {
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        $payload = $dados_user;
        $header = json_encode($header);
        $payload = json_encode($payload);
        $header = base64_encode($header);
        $payload = base64_encode($payload);
        $sign = hash_hmac(
            "sha256",
            $header . '.' . $payload,
            SECRET_JWT,
            true
        );
        $sign = base64_encode($sign);
        $token = $header . '.' . $payload . '.' . $sign;
        return $token;
    }



    public static function AuthenticationTokenAccess()
    {
        
        //Recupera todo o cabeçalho da requisição
        $http_header = apache_request_headers();
        //Se n for nulo
        if (
            $http_header['Authorization'] != null && str_contains($http_header['Authorization'], '.')
            ) :
            //quebra o bearer(autenticação de token)
            $bearer = explode(' ', $http_header['Authorization']);
            $token = explode('.', $bearer[1]);
            //quebrando os valores e jogango em seus significados
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];
            //Faz a criptografia novamente para ver se bate com a chave
            $valid = hash_hmac(
                'sha256',
                $header . '.' . $payload,
                SECRET_JWT,
                true
            );
            $valid = base64_encode($valid);
            
            if ($valid === $sign)
                return true;
            else
                return false;
        endif;
        return false;
    }
}
