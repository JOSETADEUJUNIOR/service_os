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

        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #sliders td input[type="range"] {
            display: inline;
        }

        #sliders td {
            padding-right: 1em;
            white-space: nowrap;
        }


        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
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
                    <div class="row">

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
                                                <div id="barras"></div>
                                                <!--  <p class="highcharts-description">
                                                    A variation of a 3D pie chart with an inner radius added.
                                                    These charts are often referred to as donut charts.
                                                </p> -->
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




                        </div>



                        <div class="col-sm-6 col-xs-12">
                            <div class="chart-container">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Meu gráfico de pizza</h5>
                                    </div>
                                    <script src="https://code.highcharts.com/highcharts.js"></script>
                                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                                    <figure class="highcharts-figure">
                                        <div id="pizza"></div>
                                        <!-- <p class="highcharts-description">
                                            This chart shows the use of a logarithmic y-axis. Logarithmic axes can
                                            be useful when dealing with data with spikes or large value gaps,
                                            as they allow variance in the smaller values to remain visible.
                                        </p> -->
                                    </figure>
                                    <!-- <div class="card-body">
                                        <canvas style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 709px;" width="709" height="250" id="myPieChart"></canvas>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-xs-12">
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
                        </div> -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="chart-container">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Meu gráfico de pizza</h5>
                                    </div>
                                    <script src="https://code.highcharts.com/highcharts.js"></script>
                                    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
                                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                                    <figure class="highcharts-figure">
                                        <div id="linha"></div>
                                        <!-- <p class="highcharts-description">
                                            Chart designed to highlight 3D column chart rendering options.
                                            Move the sliders below to change the basic 3D settings for the chart.
                                            3D column charts are generally harder to read than 2D charts, but provide
                                            an interesting visual effect.
                                        </p> -->
                                        <div id="sliders">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <!-- <td><label for="alpha">Alpha Angle</label></td>
                                                        <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td> -->
                                                    </tr>
                                                    <tr>
                                                        <!-- <td><label for="beta">Beta Angle</label></td>
                                                        <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td> -->
                                                    </tr>
                                                    <tr>
                                                        <!-- <td><label for="depth">Depth</label></td>
                                                        <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </figure>
                                    <!-- <div class="card-body">
                                        <canvas id="myBarChart"></canvas>
                                    </div> -->
                                </div>
                            </div>
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
        BuscarChamadosTotais();
        BuscarChamadosPorPeriodo();
    </script>
    <script>
        //Gráfico de pizza
        // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
        Highcharts.chart('pizza', {
            chart: {
                type: 'pie',
                options1d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
               // text: 'Beijing 2022 gold medals by country',
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


        // Gráfico de barras
        const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'barras',
                type: 'column',
                optionsd: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            xAxis: {
                categories: ['O.S em atrasos', 'O.S na fila', 'O.S em andamento', 'O.S concluído', 'Total de O.S',
                    
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                }
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: 'Cars sold: {point.y}'
            },
            title: {
              //  text: 'Sold passenger cars in Norway by brand, January 2021',
                align: 'left'
            },
            subtitle: {
                text: 'Source: ' +
                    '<a href="https://ofv.no/registreringsstatistikk"' +
                    'target="_blank">OFV</a>',
                align: 'left'
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: [{
                data: [25, 25, 25, 25, 100],
                colorByPoint: true
            }]
        });

         /*function showValues() {
            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        } */

        // Activate the sliders
        document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
        }));

        showValues();

        //Gráfico de linhas
        Highcharts.chart('linha', {

            title: {
               // text: 'Logarithmic axis demo'
            },

            xAxis: {
                tickInterval: 1,
                type: 'logarithmic',
                accessibility: {
                    rangeDescription: 'Range: 1 to 10'
                }
            },

            yAxis: {
                type: 'logarithmic',
                minorTickInterval: 0.1,
                accessibility: {
                    rangeDescription: 'Range: 0.1 to 1000'
                }
            },

            tooltip: {
                headerFormat: '<b>{series.name}</b><br />',
                pointFormat: 'x = {point.x}, y = {point.y}'
            },

            series: [{
                data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
                pointStart: 1
            }]
        });
    </script>
</body>

</html>