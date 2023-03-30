<?php


require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;

if (isset($_GET['close']) && $_GET['close'] == '1') {
    echo '
            <script>
                MensagemSucesso();
            </script>';
    Util::Deslogar("login.php");
}

?>
<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <a href="index.php" class="btn btn-success">
                <i class="ace-icon fa fa-home"></i>
            </a>

            <a class="btn btn-info">
                <i class="ace-icon fa fa-user"></i>
            </a>

            <a class="btn btn-warning">
                <i class="ace-icon fa fa-envelope"></i>
            </a>

            <a href="../../Template/_includes/_menu.php?close=1" class="btn btn-danger">
                <i class="ace-icon fa fa-power-off bigger-110"></i>
            </a>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="">
            <a href="index.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="configuracao.php">
                <i class="menu-icon fa fa-cogs"></i>
                <span class="menu-text"> Configurações </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Cadastros </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover">
                    <a href="usuario.php?pagina=1">
                        <i class="menu-icon fa fa-users"></i>
                        Usuários
                    </a>

                    <b class="arrow"></b>
                </li>
               <!--  <li class="hover">
                <a href="permissao_usuario.php">
                    <i class="menu-icon fa fa-user"></i>
                    Permissões
                </a> -->

                <b class="arrow"></b>
        </li>

        <li class="hover">
            <a href="equipamento.php">
                <i class="menu-icon fa fa-laptop"></i>
                Equipamento
            </a>

            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="tipoequipamento.php">
                <i class="menu-icon fa fa-desktop"></i>
                Tipo Equipamento
            </a>

            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="setor.php">
                <i class="menu-icon fa fa-users"></i>
                Setor
            </a>

            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="modelo.php">
                <i class="menu-icon fa fa-list"></i>
                Modelo
            </a>

            <b class="arrow"></b>
        </li>

    </ul>
    </li>

    <li class="">
        <a href="alocar_equipamento.php">
            <i class="menu-icon fa fa-exchange"></i>
            <span class="menu-text"> Alocar Equipamento </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li class="">
        <a href="<?= SITE_FUNC ?>" target="_blank">
            <i class="menu-icon fa fa-globe"></i>
            <span class="menu-text"> Acesso funcionário </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li class="">
        <a href="<?= SITE_TEC ?>" target="_blank">
            <i class="menu-icon fa fa-globe"></i>
            <span class="menu-text"> Acesso tecnico </span>
        </a>

        <b class="arrow"></b>
    </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>