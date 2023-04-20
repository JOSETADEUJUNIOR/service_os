<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/index_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once PATH_URL . '/Template/_includes/_head.php' ?>
</head>

<body class="skin-1">
	<?php include_once PATH_URL . '/Template/_includes/_topo.php' ?>
	<!-- topo-->

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

									<div class="col-xs-12 col-sm-6 widget-container-col ui-sortable" id="widget-container-col-5">
										<div class="widget-box ui-sortable-handle" id="widget-box-5">
											<div class="widget-header">
												<i class="orange ace-icon fa fa-send bigger-110"></i>
												<h5 class="widget-title smaller">Dados do SMTP</h5>


											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">
													<div class="alert alert">
														<form id="form" method="post">
															<fieldset>
																<div class="row">
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>Host</label>
																			<input type="hidden" name="AlteraID" id="AlteraID">
																			<input class="form-control obg" id="smtpHost" name="smtpHost" placeholder="Host....">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>User</label>
																			<input type="hidden" name="AlteraID" id="AlteraID">
																			<input class="form-control obg" id="smtpUser" name="smtpUser" placeholder="User....">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>Senha</label>
																			<input type="hidden" name="AlteraID" id="AlteraID">
																			<input class="form-control obg" id="smtpSenha" name="smtpSenha" placeholder="Senha....">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<div class="form-group">
																			<label>porta</label>
																			<input type="hidden" name="AlteraID" id="AlteraID">
																			<input class="form-control obg" id="porta" name="porta" placeholder="Porta....">
																		</div>
																	</div>
																</div>
															</fieldset>
															<fieldset>
																<div class="form-group">
																	<button name="btnGravar" class="btn btn-success col-sm-12" onclick="return CadastrarSetor('form_setor')">Salvar</button>
																</div>
															</fieldset>
														</form>


													</div>
												</div>
											</div>
										</div>
									</div>





									<div class="col-xs-12 col-sm-6 widget-container-col ui-sortable" id="widget-container-col-5">
										<div class="widget-box ui-sortable-handle" id="widget-box-5">
											<div class="widget-header">
												<i class="orange ace-icon fa fa-key bigger-110"></i>
												<h5 class="widget-title smaller">Alterar senha</h5>


											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">
													<div class="alert alert">

														<form action="" id="form_alterar_senha">
															<fieldset>
																<div class="row">
																	<input type="hidden" id="id_end">
																	<div class="col-md-12 col-xs-12">
																		<div class="row">
																			<div class="col-md-12 col-xs-12" id="divSenhaAtual">
																				<div class="col-md-12 col-xs-12">
																					<div class="form-group">
																						<label>Senha atual</label><span style="margin-left: 3px;"><i onclick="VerSenha()" class="fa fa-eye fa-0x"></i></span>
																						<input type="password" class="form-control obg" id="senha" name="senha" placeholder="Digite o aqui....">
																					</div>
																					<button class="btn btn-success col-md-12 col-xs-12" onclick="return VerificarSenhaAtual('form_alterar_senha')">Validar</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</fieldset>

														</form>

														<form action="" id="form_nova_senha">
															<fieldset>
																<div class="row">
																	<div class="col-md-12 col-xs-12" id="divMudarSenha" style="display: none;">
																		<div class="row">
																			<div class="col-md-12 col-xs-12">
																				<div class="form-group">
																					<label>Nova senha</label>
																					<input type="password" class="form-control obg" id="newsenha" name="newsenha" placeholder="Digite o aqui....">
																				</div>
																			</div>
																			<div class="col-md-12 col-xs-12">
																				<div class="form-group">
																					<label>Repetir senha</label>
																					<input type="password" class="form-control obg" id="resenha" name="resenha" placeholder="Digite o aqui....">
																				</div>
																				<button class="btn btn-success col-md-12 col-xs-12" onclick="return AtualizarSenha('form_nova_senha')">Gravar</button>
																			</div>

																		</div>
																	</div>
																</div>
															</fieldset>
														</form>


													</div>
												</div>
											</div>
										</div>
									</div>



									<div style="margin-top: 10px;" class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-5">
										<div class="widget-box ui-sortable-handle" id="widget-box-5">
											<div class="widget-header">
												<i class="orange ace-icon fa fa-database bigger-110"></i>
												<h5 class="widget-title smaller">Alterar dados empresa</h5>

												<div class="widget-toolbar">

												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">
													<div class="alert">

														<form action="" id="formAlterarEmpresa">
															<fieldset>
																<div class="row" id="resultDadosEmpresa">
																	<input type="hidden" id="id_user" value="<?= $dados[0]['id'] ?>">
																	<input type="hidden" id="id_emp" value="<?= $dados[0]['EmpID'] ?>">
																	<input type="hidden" id="tipo" value="<?= $dados[0]['tipo'] ?>">
																	<div class="col-md-4">

																		<label>Nome empresa</label>
																		<input class="form-control obg" id="nome" name="nome" value="<?= $dados[0]['EmpNome'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>CNPJ</label>
																		<input class="form-control obg" id="cnpj" name="cnpj" value="<?= $dados[0]['EmpCNPJ'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Cep</label>
																		<input class="form-control obg" id="cep" name="cep" value="<?= $dados[0]['EmpCep'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Endereço</label>
																		<input class="form-control obg" id="endereco" name="endereco" value="<?= $dados[0]['EmpEnd'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Numero</label>
																		<input class="form-control obg" id="numero" name="numero" value="<?= $dados[0]['EmpNumero'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Cidade</label>
																		<input class="form-control obg" id="cidade" name="cidade" value="<?= $dados[0]['EmpCidade'] ?>" placeholder="Digite o aqui....">

																	</div>
																	
																	
																	<div class="col-sm-12">

																		<div class="position-relative">
																			<img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath'] ?>" heigth="180px" width="120px" alt="Photo 2" class="img-fluid">

																		</div>

																	</div>
																	<div class="col-sm-12">
																		<label for="">Incluir Logo</label>
																		<input type="file" name="logo" id="logo" value="<?= $dados[0]['EmpLogo'] ?>" class="custom-file-input">
																		

																	</div>

																	<div style="margin-top: 10px;" class="col-sm-6 col-xs-6">

																		<button onclick="return CadastrarDadosEmpresa('formAlterarEmpresa')" class="col-sm-12 col-xs-12 btn btn-success">
																			<i class="ace-icon fa fa-check bigger-110"></i>Gravar dados
																		</button>
																	</div>
																	<div style="margin-top: 10px;" class="col-sm-6 col-xs-6">
																		<button class="col-sm-12 col-xs-12 btn btn-warning">
																			<i class="ace-icon fa fa-undo bigger-110"></i>Voltar
																		</button>

																	</div>
																</div>
															</fieldset>
														</form>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div style="margin-top: 10px;" class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-5">
										<div class="widget-box ui-sortable-handle" id="widget-box-5">
											<div class="widget-header">
												<i class="orange ace-icon fa fa-database bigger-110"></i>
												<h5 class="widget-title smaller">Alterar meus dados</h5>

												<div class="widget-toolbar">

												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-6">
													<div class="alert">

														<form action="" id="form_meus_dados">
															<fieldset>
																<div class="row">
																	<input type="hidden" id="id_user" value="<?= $dadosUser['id_user'] ?>">
																	<input type="hidden" id="id_end" value="<?= $dadosUser['id_end'] ?>">
																	<input type="hidden" id="tipo" value="<?= $dadosUser['tipo'] ?>">
																	<div class="col-md-4">

																		<label>Nome</label>
																		<input class="form-control obg" id="nome" name="nome" value="<?= $dadosUser['nome'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>E-mail</label>
																		<input class="form-control obg" id="email" name="email" value="<?= $dadosUser['login'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Telefone</label>
																		<input class="form-control obg" id="telefone" name="telefone" value="<?= $dadosUser['telefone'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-2">

																		<label>Cep</label>
																		<input class="form-control obg" id="cep" name="cep" value="<?= $dadosUser['cep'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-4">

																		<label>Rua</label>
																		<input class="form-control obg" id="endereco" name="endereco" value="<?= $dadosUser['rua'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-2">

																		<label>Cidade</label>
																		<input class="form-control obg" id="cidade" name="cidade" value="<?= $dadosUser['cidade'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-3">

																		<label>Bairro</label>
																		<input class="form-control obg" id="bairro" name="bairro" value="<?= $dadosUser['bairro'] ?>" placeholder="Digite o aqui....">

																	</div>
																	<div class="col-md-1">

																		<label>Estado</label>
																		<input class="form-control obg" id="estado" name="estado" value="<?= $dadosUser['sigla_estado'] ?>" placeholder="Digite o aqui....">

																	</div>

																	<div style="margin-top: 10px;" class="col-sm-6 col-xs-6">

																		<button onclick="return CadastrarMeusDados('form_meus_dados')" class="col-sm-12 col-xs-12 btn btn-success">
																			<i class="ace-icon fa fa-check bigger-110"></i>Gravar dados
																		</button>
																	</div>
																	<div style="margin-top: 10px;" class="col-sm-6 col-xs-6">
																		<button class="col-sm-12 col-xs-12 btn btn-warning">
																			<i class="ace-icon fa fa-undo bigger-110"></i>Voltar
																		</button>

																	</div>
																</div>
															</fieldset>
														</form>

													</div>
												</div>
											</div>
										</div>
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

		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Resource/ajax/usuario-ajx.js"></script>
	<script src="../../Resource/ajax/buscar_cep_ajx.js"></script>
</body>


</html>