<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/cliente_dataview.php';
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

						<li class="active">Configurações</li>
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
										<a href="#cliente" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
										<?php //if (count($setor) > 0) { 
										?>
										<button type="button" onclick="Imprimir()" class="btn btn-purple"><i class="ace-icon fa fa-plus white"></i>Relatorio</button>
										<?php //} 
										?>
									</h4>
									<div class="table-header">
										Clientes Cadastrados

										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" onkeyup="FiltrarCliente(this.value)" class="form-control input-sm" placeholder="buscar por nome" aria-controls="dynamic-table">
										</div>
									</div>
									<div id="table_result_cliente">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome</th>
													<th class="sorting_desc">Data Nascimento</th>
													<th class="sorting_desc">Telefone</th>
													<th class="sorting_desc">E-mail</th>
													<th class="hidden-480">Status</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < count($cliente); $i++) { ?>
													<tr>
														<td><?= $cliente[$i]['CliNome'] ?></td>
														<td><?= $cliente[$i]['CliDtNasc'] ?></td>
														<td><?= $cliente[$i]['CliTelefone'] ?></td>
														<td><?= $cliente[$i]['CliEmail'] ?></td>
														<td><?= $cliente[$i]['CliStatus'] ?></td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="#cliente" role="button" data-toggle="modal" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>','<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliCpfCnpj'] ?>','<?= $cliente[$i]['CliTipo'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>')">
																	<i title="Alterar cliente" class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
															</div>
															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<li>
																			<a href="#cliente" onclick="" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
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
		<form id="form_cliente" action="cliente.php" method="post">
			<?php include_once 'modal/_cliente.php' ?>
		</form>
		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/cliente-ajx.js"></script>
	<script src="../../Resource/ajax/buscar_cep_ajx.js"></script>
</body>


</html>