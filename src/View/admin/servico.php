<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/servico_dataview.php';
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

						<li class="active">Servico</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<!-- conteudo da pagina -->
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="row">
								<div class="col-xs-12">
									<h4 class="pink">
										<a href="#servico" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
									</h4>
									<div class="table-header">
										Serviços Cadastrados
										
										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" onkeyup="FiltrarServico(this.value)" class="form-control input-sm" placeholder="buscar por serviço" aria-controls="dynamic-table">
										</div>
									</div>
									<div id="tabela_result_servico">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome do Serviço</th>
													<th class="hidden-480">Valor</th>
													<th>Descrição</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < count($servico); $i++) { ?>
													<tr>
														<td>
															<?= $servico[$i]['ServNome'] ?>
														</td>
														<td class="hidden-480">
														<?= $servico[$i]['ServValor'] ?>
														</td>
														<td class="hidden-480">
														<?= $servico[$i]['ServDescricao'] ?>
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="#servico" role="button" data-toggle="modal" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>','<?= $servico[$i]['ServValor'] ?>','<?= $servico[$i]['ServDescricao'] ?>')">
																	<i title="Alterar Tipo Equipamento" class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')">
																	<i title="Excluir Tipo Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#modelo" onclick="AlterarModeloModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<li>
																			<a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php } ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.final do conteudo da pagina -->
				<div id="divload">

				</div>
			</div>
		</div><!-- /.main-content -->
		<form id="form_modelo" action="modelo.php" method="post">
			<?php include_once 'modal/_servico.php' ?>
			<?php include_once 'modal/_excluir.php' ?>

		</form>
		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/servico-ajx.js"></script>
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>

</body>


</html>