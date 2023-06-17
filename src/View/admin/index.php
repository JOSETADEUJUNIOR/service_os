<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';
?>
<!DOCTYPE html>
<html>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
    <style>
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
                       
                    </ul><!-- /.breadcrumb -->


                </div>
                <!-- conteudo da pagina -->
                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Dashboard dos chamados
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
                                <span id="total_chamados" name="total_chamados" class="line-height-1 bigger-170">10</span>

                                <br>
                                <span class="line-height-1 smaller-90"> Total Chamados </span>

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
                                <span class="line-height-1 smaller-90"> Em Atendimento </span>
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <span class="btn btn-app btn-sm btn-success no-hover">
                                <i class="fa fa-ticket fa-2x card-icon float-left mr-10"></i>
                                <span id="concluidos" class="line-height-1 bigger-170"></span>

                                <br>
                                <span class="line-height-1 smaller-90"> Concluídos </span>
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
                                        Quantidade por Status
                                    </h5>


                                </div>

                                <div class="widget-body" style="margin-bottom: 20px;">
                                    <div class="widget-main">
                                    <canvas id="chart_chamados_status" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid12">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-ticket fa-2x blue"></i>
                                                    &nbsp; Quantidade total de chamados:
                                                </span>
                                                <h4 id="qtd_chamado_por_status" class="bigger pull-right"></h4>
                                            </div>

                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Estatística dos chamados
                                    </h5>


                                </div>

                                <div class="widget-body" style="margin-bottom: 20px;">
                                    <div class="widget-main">
                                        <canvas id="chamado_por_responsavel" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
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

                        





                        <div class="col-sm-6 col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Quantidade por Setor
                                    </h5>


                                </div>

                                <div class="widget-body" style="margin-bottom: 20px;">
                                    <div class="widget-main">
                                    <canvas id="chamado_por_setor" style="min-height: 250px; height: 250px; max-height: 350px; max-width: 100%; display: block; width: 709px;" width="709" height="250" class="chartjs-render-monitor"></canvas>
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid12">
                                                <span class="grey">
                                                    <i class="ace-icon fa fa-ticket fa-2x blue"></i>
                                                    &nbsp; Quantidade total de chamados:
                                                </span>
                                                <h4 id="qtd_chamado_por_setor" class="bigger pull-right"></h4>
                                            </div>

                                        </div>
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
     
        
    </script>

</body>

</html>