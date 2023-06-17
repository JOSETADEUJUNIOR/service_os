<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/os_dataview.php';

use Src\_public\Util;
?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once PATH_URL . '/Template/_includes/_head.php' ?>

	<meta name="description" content="Static &amp; Dynamic Tables" />



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

						<li class="active">Ordem de serviço</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<!-- conteudo da pagina -->
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="row">
								<div class="col-xs-12">
									<h4 class="pink">
										<a href="#novoChamado" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
									</h4>
									<div class="table-header">
										Chamados Realizados

										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" onkeyup="FiltrarOsNf(this.value)" class="form-control input-sm" placeholder="buscar por numero NF" aria-controls="dynamic-table">
										</div>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="CheckFuncionario" onclick="FiltrarChamado('4')" type="radio" class="ace" checked>
											<span class="lbl"> Todos</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="CheckTecnico" onclick="FiltrarChamado('1')" type="radio" class="ace">
											<span class="lbl"> Em aberto</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="CheckTecnico" onclick="FiltrarChamado('2')" type="radio" class="ace">
											<span class="lbl"> Em atendimento</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="CheckTecnico" onclick="FiltrarChamado('3')" type="radio" class="ace">
											<span class="lbl"> Encerrados</span>
										</label>
									</div>
									<div class="table-responsive" id="dynamic-table">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover" style="max-width:600px;">

										</table>
									</div>
									<form id="form_chamado" action="chamados.php" method="post">
				<?php include_once 'modal/_novo_chamado.php' ?>

			</form>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.final do conteudo da pagina -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.final do conteudo da pagina -->
				<div id="divload">

				</div>
			</div>
		</div><!-- /.main-content -->

		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/os-ajx.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/print-this@1.15.0/printThis.min.js"></script>
	<script>
		//console.log(Verify());
		FiltrarChamado();
		//CarregarProdutos();
		CarregarClientes();
		$("#btn-toggle-div").click(function() {
			$("#div-produtos").toggle();
		});
		$("#btn-toggle-div-serv").click(function() {
			$("#div-servicos").toggle();
		});
// Abrir o modal e adicionar a classe CSS ao conteúdo do modal
	</script>
</body>
</html>
</body>


</html>