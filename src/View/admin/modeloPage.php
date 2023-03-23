<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>

<body class="skin-1">
    <?php include_once PATH_URL . '/Template/_includes/_topo.php' ?>
    <!-- topo-->


    <!--inicio do conteudo principal-->
    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <?php include_once PATH_URL . '/Template/_includes/_menu.php' ?>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <a href="#">Forms</a>
                        </li>
                        <li class="active">Form Elements</li>
                    </ul><!-- /.breadcrumb -->


                </div>
                <!-- conteudo da pagina -->
                <div class="page-content">


                    <div class="page-header">
                        <h1>
                            Titulo da pagina
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Aqui são exibidos os dados da pagina
                            </small>
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->


                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.final do conteudo da pagina -->
            </div>
        </div><!-- /.main-content -->

        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>


    </div><!-- /.final do conteudo Princial -->







    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
</body>


</html>