<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <style>
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 10px;
        }

        .card-header {
            background-color: #f7f7f7;
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .chart-container {
            max-width: 100%;
            height: auto;
        }

        .card-primary {
            background-color: #6495ED;
            color: #fff;
        }

        .card-primary .card-header {
            background-color: #6495ED;
            color: #fff;
        }

        .card-primary .card-body {
            background-color: white;
            color: #000;
        }

        .card-primary .card-footer {
            background-color: #6495ED;
            color: #fff;
        }
    </style>


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
                            Dashboard das Ordens de Serviços
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Aqui são exibidos os dados e estatísticas das ordens de serviços.
                            </small>
                        </h1>
                    </div><!-- /.page-header -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <span class="btn btn-app btn-sm btn-danger no-hover">
                                <!-- conteúdo da primeira div -->
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="total_chamados" name="total_chamados" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> O.S em atraso </span>

                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <span class="btn btn-app btn-sm btn-yellow no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="aguardando" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> O.S na fila </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-4">
                            <span class="btn btn-app btn-sm btn-info no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="em_atendimento" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> O.S em andamento </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <span class="btn btn-app btn-sm btn-success no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="concluidos" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> O.S concluídas </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <span class="btn btn-app btn-sm btn-secondary no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="concluidos" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Total de O.S </span>
                            </span>
                        </div>
                    </div>

                    <div class="space-12"></div>
                    <div class="space-20"></div>
                    <!-- <div class="row">
                    <div class="col-4">
                        <div class="chart-container">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Meu gráfico de pizza</h5>
                                </div>
                                <div class="card-body">
                                    <canvas style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 709px;" width="709" height="250" id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="chart-container">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Meu gráfico de pizza</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="chart-container">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Meu gráfico de pizza</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Estatística das Ordens de Serviços
                                    </h5>


                                </div>

                                <div class="widget-body" style="margin-bottom: 20px;">
                                    <div class="widget-main">
                                        <script src="https://code.highcharts.com/highcharts.js"></script>
                                        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
                                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                                        <figure class="highcharts-figure">
                                            <div id="container"></div>
                                            <p class="highcharts-description">
                                                A variation of a 3D pie chart with an inner radius added.
                                                These charts are often referred to as donut charts.
                                            </p>
                                        </figure>
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid12">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-ticket fa-2x blue"></i>
                                                    &nbsp; Quantidade total de chamados:
                                                </span>
                                                <h4 id="qtd_chamado_por_responsável" class="bigger pull-right"></h4>
                                            </div>

                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>

                        <!-- <div class="col-sm-6 col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Estatística dos chamados
                                    </h5>


                                </div>

                                <div class="widget-body" style="margin-bottom: 20px;">
                                    <div class="widget-main">
                                        <canvas id="chamado_por_periodo" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid12">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-envelope-square fa-2x blue"></i>
                                                    &nbsp; Quantidade total de chamados:
                                                </span>
                                                <h4 id="qtd_chamado_por_periodo" class="bigger pull-right">1,255</h4>
                                            </div>

                                            <div class="grid3">
                                            <span class="grey">
                                                <i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
                                                &nbsp; tweets
                                            </span>
                                            <h4 class="bigger pull-right">941</h4>
                                        </div>

                                        <div class="grid3">
                                            <span class="grey">
                                                <i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
                                                &nbsp; pins
                                            </span>
                                            <h4 class="bigger pull-right">1,050</h4>
                                        </div>
                                        </div>
                                    </div> /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
 

                    </div>
                    <div class="row">

                        <!-- <div class="col-sm-6">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Chamados por Status
                                    </h4>

                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="display: block;">
                                    <canvas id="chart_chamados_status" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
                                    <div class="widget-main padding-4">

                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div> -->
                        <!-- <div class="col-sm-6">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-flat">
                                    <h4 class="widget-title lighter">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Chamados por Setor
                                    </h4>

                                    <div class="widget-toolbar">
                                        <a href="#" data-action="collapse">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="display: block;">
                                    <canvas id="chamado_por_setor" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
                                    <div class="widget-main padding-4">

                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
 -->
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
        BuscarChamadosTotais();
        BuscarChamadosPorPeriodo();
    </script>
    <script>
        // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
        Highcharts.chart('container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Beijing 2022 gold medals by country',
                align: 'left'
            },
            subtitle: {
                text: '3D donut in Highcharts',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Medals',
                data: [
                    ['O.S em atraso', 16],
                    ['O.S na fila', 12],
                    ['O.S em andamento', 8],
                    ['O.S concluído', 8],
                    
                ]
            }]
        });
    </script>
</body>

</html>