<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';

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
							<a href="index.php">Home</a>
						</li>

						<li class="active">Usuarios</li>
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
										<a href="#usuario" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
										<?php if (count($pessoas) > 0) { ?>
											<button id="btnImprimirUsuario" type="button" onclick="Imprimir()" class="btn btn-purple"><i class="ace-icon fa fa-plus white"></i>Relatorio</button>
										<?php } ?>
									</h4>
									<div class="table-header">
										Usuarios Cadastrados

										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" id="buscaUsuario" onkeyup="FiltrarUsuario(this.value)" class="form-control input-sm" placeholder="buscar por usuário" aria-controls="dynamic-table">

										</div>
										<label style="margin-left:10px">
											<input name="form-field-radio" value="2" id="CheckFuncionario" onclick="ChecarFiltro('2')" type="radio" class="ace">
											<span class="lbl"> Funcionários</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" value="3" id="CheckTecnico" onclick="ChecarFiltro('3')" type="radio" class="ace">
											<span class="lbl"> Técnico</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="CheckTecnico" onclick="ChecarFiltro()" type="radio" class="ace" checked>
											<span class="lbl"> Todos</span>
										</label>
									</div>
									<div class="table-responsive" id="table_result_Usuario">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome</th>
													<th class="sorting_desc">E-mail</th>
													<th class="sorting_desc">Setor/Empresa</th>
													<th class="sorting_desc">Tipo</th>
													<th class="sorting_desc">Ativo/inativo</th>
													<th class="sorting_desc">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < count($pessoas); $i++) { ?>
													<tr>
														<td>
															<?= $pessoas[$i]['nome'] ?>
														</td>
														<td>
															<?= $pessoas[$i]['login'] ?>
														</td>
														<td>
															<?= ($pessoas[$i]['nome_setor'] != '' ? $pessoas[$i]['nome_setor'] : $pessoas[$i]['empresa_tecnico']) ?>
														</td>
														<td>
															<?= Util::DescricaoTipo($pessoas[$i]['tipo']) ?>
														</td>
														<td><div class="col-xs-3">
																	<label>
																		<input name="switch-field-1" value="0" id="usuario_status" onclick="MudarStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['status'] ?>')" title="Ativar/inativar usuário" class="ace ace-switch ace-switch-6" <?= $pessoas[$i]['status'] == STATUS_ATIVO ? "checked='checked'" : ''  ?> type="checkbox" />
																		<span class="lbl"></span>
																	</label>
																</div></td>
														<td>
																<a st class="green" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
																	<i title="Alterar Usuário" class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<!-- <a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
																	Enviar e-mail
																</a> -->
															<!-- <div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#usuario" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
																		<li>
																			<a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="CarregarModalStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['status'] ?>')" class=" btn btn-xs btn-<?= $pessoas[$i]['status'] == STATUS_ATIVO ? "danger" : "success" ?> "><?= $pessoas[$i]['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<li>
																			<a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="CarregarModalStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['status'] ?>')" class=" btn btn-xs btn-<?= $pessoas[$i]['status'] == STATUS_ATIVO ? "danger" : "success" ?> "><?= $pessoas[$i]['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div> -->
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
		<form id="form_usuario" action="usuario.php" method="post">
			<?php include_once 'modal/_usuario.php' ?>
			<?php include_once 'modal/_mudar_status.php' ?>

		</form>
		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->


	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Template/assets/js/bootbox.js"></script>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/usuario-ajx.js"></script>
	<script src="../../Resource/ajax/buscar_cep_ajx.js"></script>

</body>


</html>