<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <link rel="stylesheet" href="../../Template/assets/css/estilo.css">


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
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="active">gráficos</li>
                    </ul><!-- /.breadcrumb -->


                </div>
                <!-- conteudo da pagina -->
                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Dashboard das ordens de serviços
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Aqui são exibidos os dados e estatísticas dos chamados
                            </small>
                        </h1>
                    </div><!-- /.page-header -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <span class="btn btn-app btn-sm btn-purple no-hover">
                                <!-- conteúdo da primeira div -->
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="total_chamados" name="total_chamados" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Total O.S </span>

                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <span class="btn btn-app btn-sm btn-yellow no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="aguardando" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Aguardando </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <span class="btn btn-app btn-sm btn-blue no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="em_atendimento" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Na Produção </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <span class="btn btn-app btn-sm btn-success no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="concluidos" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Finalizados </span>
                            </span>
                        </div>
                    </div>

                    <!-- Gráfico de Barras -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="widget-box custom-card">
                                <div class="widget-header widget-header-flat" style="border-bottom: 2px solid #2C6AA0; background-color: #2C6AA0;">
                                    <h4 class="widget-title lighter text-white">
                                        <i class="ace-icon fa fa-signal color: #FFF"></i>
                                        Chamados por Status
                                    </h4>
                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="display: block; border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fefefe;">
                                    <canvas id="chart_chamados_status" class="chart-canvas"></canvas>
                                    <div class="widget-main padding-4">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gráfico de Rosca -->
                        <div class="col-sm-6">
                            <div class="widget-box custom-card">
                                <div class="widget-header widget-header-flat" style="border-bottom: 2px solid #2C6AA0; background-color: #2C6AA0;">
                                    <h4 class="widget-title lighter text-white">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Chamados em atraso
                                    </h4>
                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="display: block; border: 1px solid #e8e8e8; border-radius: 4px; background-color: #fefefe;">
                                    <canvas id="chamado_por_setor" class="chart-canvas"></canvas>
                                    <div class="widget-main padding-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .chart-canvas {
                            height: 150px;
                            max-height: 250px;
                        }
                    </style>


                    <div class="col-sm-12">
                        <div class="widget-box transparent">
                            <!-- ... existing code ... -->

                            <div class="widget-body" style="display: block;">
                                <div class="widget-main no-padding">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>N° Nota Fiscal
                                                </th>

                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Data de Lançamento
                                                </th>

                                                <th class="hidden-480">
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Status
                                                </th>

                                                <th class="hidden-480">
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Valor Total
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            if (isset($chamadosSQL) && !empty($chamadosSQL)) : ?>
                                                <?php foreach ($chamadosSQL as $chamado) : ?>
                                                    <tr>
                                                        <td><?= $chamado['numero_nf'] ?></td>
                                                        <td><b class="green"><?= $chamado['data_atendimento'] ?></b></td>
                                                        <td class="hidden-480">
                                                            <span class="label label-info arrowed-right arrowed-in"><?= $chamado['status'] ?></span>
                                                        </td>
                                                        <td class="hidden-480"><b class=""><?= $chamado['valor_total'] ?></b></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4">Os dados de chamados não foram recebidos.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>


                                    </table>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div>
                </div>


            </div><!-- /.final do conteudo da pagina -->
        </div>
    </div><!-- /.main-content -->

    <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>


    </div><!-- /.final do conteudo Princial -->







    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <script src="../../Resource/ajax/index-ajx.js"></script>
    <script>
        BuscarChamadosPorColaborador();
        BuscarChamadosPorStatus();
        BuscarChamadosPorSetor();
        /* BuscarChamadosTotais(); */
        /* BuscarChamadosPorPeriodo(); */
    </script>

</body>

</html>