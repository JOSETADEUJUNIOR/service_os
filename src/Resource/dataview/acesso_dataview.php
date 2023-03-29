<?php
include_once '_include_autoload.php';

use Src\_public\Util;

use Src\Controller\UsuarioController;

if (isset($_POST['btn_acessar'])) {
    $ret = (new UsuarioController)->ValidarLoginController($_POST['login'], $_POST['senha']);
}


?>