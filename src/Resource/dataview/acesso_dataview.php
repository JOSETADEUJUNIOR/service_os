<?php
include_once '_include_autoload.php';

use Src\_public\Util;

use Src\Controller\UsuarioController;

if (isset($_GET['close']) && is_numeric($_GET['close'])) {
    if ($_GET['close']=='1') {
        Util::Deslogar();
    }
}

if (isset($_POST['btn_acessar'])) {
    $ret = (new UsuarioController)->ValidarLoginController($_POST['login'], $_POST['senha']);
}


?>