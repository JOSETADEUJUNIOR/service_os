<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/equipamento_dataview.php';
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

						<li class="active">Equipamento</li>
					</ul><!-- /.breadcrumb -->
				</div>
				<!-- conteudo da pagina -->
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="row">
								<div class="col-sm-12">
									<h4 class="pink">
										<a href="#equipamento" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
										<button onclick="Imprimir()" id="relatorioEquipamento" role="button" class="btn btn-purple ocultar"><i class="ace-icon fa fa-print white"></i>Imprimir</button>
									</h4>
								</div>
							</div>
							<div class="row">
								<form id="form_consultaEquip">
									<div class="form-group col-md-6">
										<label>Filtrar Por:</label>
										<select class="form-control obg" id="tipoFiltro" name="tipoFiltro">
											<option value="">Selecione</option>
											<option value="<?= FILTRO_TIPO ?>">TIPO</option>
											<option value="<?= FILTRO_MODELO ?>">MODELO</option>
											<option value="<?= FILTRO_IDENTIFICACAO ?>">IDENTIFICACAO</option>
											<option value="<?= FILTRO_DESCRICAO ?>">DESCRICAO</option>

										</select>
									</div>
									<div class="form-group col-md-6">
										<label>Escolha o filtro</label>
										<input id="filtro_palavra" name="filtro_palavra" class="form-control obg">
									</div>

									<div class="col-md-12">
										<center>
											<button name="btn_consultar" id="btn_consultar" class="btn btn-secondary" onclick=" return FiltrarEquipamentos('form_consultaEquip')">Pesquisar</button>
										</center>
									</div>
								</form>
							</div>


						</div>
					</div>

					<div class="row" id="divResult" style="display:none">
						<div class="col-sm-12">
							<div class="table-header" style="margin-top: 10px;">
								Equipamentos Cadastrados

							</div>

							<div id="tabela_result_equipamento">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="sorting_desc">Tipo</th>
											<th class="sorting_desc">Modelo</th>
											<th class="sorting_desc">Identificação</th>
											<th class="sorting_desc">Descrição</th>
											<th class="hidden-480">Status</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($i = 0; $i < count($equipamento); $i++) { ?>
											<tr>
												<td>
													<?= $equipamento[$i]['nomeTipo'] ?>
												</td>
												<td>
													<?= $equipamento[$i]['nomeModelo'] ?>
												</td>
												<td>
													<?= $equipamento[$i]['identificacao'] ?>
												</td>
												<td>
													<?= $equipamento[$i]['descricao'] ?>
												</td>
												<td class="hidden-480">
													<span class="label label-sm label-warning">Ativo</span>
												</td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="#equipamento" role="button" data-toggle="modal" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
															<i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
														</a>
														<a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
															<i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
														</a>
													</div>
													<div class="hidden-md hidden-lg">
														<div class="inline pos-rel">
															<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
															</button>

															<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																<li>
																	<a href="#setor" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																		</span>
																	</a>
																</li>
																<a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
																<li>
																	<a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
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
		<!-- /.final do conteudo da pagina -->
		<div id="divload">

		</div>
	
	</div><!-- /.main-content -->
	<form id="form_equipamento" action="equipamento.php" method="post">
		<?php include_once 'modal/_equipamento.php' ?>
		<?php include_once 'modal/_excluir.php' ?>

	</form>


	<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Template/assets/js/bootbox.js"></script>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/equipamento-ajx.js"></script>




</body>


</html>