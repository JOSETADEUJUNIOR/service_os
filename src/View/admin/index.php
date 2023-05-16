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
                                <span id="concluídos" class="line-height-1 bigger-170"></span>

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
                                <span id="total_chamados" class="line-height-1 bigger-170"></span>

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

                    </div><!-- /.final do conteudo da pagina -->
                </div>
            </div><!-- /.main-content -->


        </div><!-- /.final do conteudo Princial -->

        <?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>

        <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
        <script src="../../Resource/ajax/index-ajx.js"></script>

        <script>
  BuscarChamadosPorColaborador();
  BuscarChamadosPorStatus();
  BuscarChamadosPorSetor();
  BuscarChamadosTotais();
  BuscarChamadosPorPeriodo();

  // Gráfico de barras
  const totalChamados = parseInt(document.getElementById('total_chamados').textContent);
  function criarGraficoBarras() {
    const chart = new Highcharts.Chart({
      chart: {
        renderTo: 'barras',
        type: 'column',
        options2d: {
          enabled: true,
          alpha: 15,
          beta: 15,
          depth: 50,
          viewDistance: 25
        }
      },
      xAxis: {
        categories: ['O.S em atraso', 'O.S na fila', 'O.S em andamento', 'O.S concluído', 'Total de O.S']
      },
      yAxis: {
        title: {
          text: null
        }
      },
      tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: 'Quantidade: {point.y}'
      },
      title: {
        text: 'Chamados por Status'
      },
      subtitle: {
        text: 'Fonte: OFV',
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
        name: 'Quantidade',
        data: [25, 25, 25, 25, totalChamados],
        colorByPoint: true
      }]
    });
  }

  criarGraficoBarras();
</script>
    </div>
</body>

</html>