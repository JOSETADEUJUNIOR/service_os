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


					<div class="page-header">
						<h1>
							Configurações Gerais
							<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								Configurações do sistema
							</small>
						</h1>
					</div><!-- /.page-header -->

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="tabbable">
								<ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#faq-tab-1">
											<i class="blue ace-icon fa fa-cogs bigger-120"></i>
											Configurações
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#faq-tab-2">
											<i class="green ace-icon fa fa-info-circle bigger-120"></i>
											Sobre
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#faq-tab-3">
											<i class="orange ace-icon fa fa-user bigger-120"></i>
											Perfil
										</a>
									</li>


								</ul>

								<div class="tab-content no-border padding-24">
									<div id="faq-tab-1" class="tab-pane fade in active">
										<h4 class="blue">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Configurações do sistema
										</h4>

										<div class="space-8"></div>

										<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

														<i class="ace-icon fa fa-user bigger-130"></i>
														&nbsp; Configurações de Envio de Email (SMTP)
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-1-1">
													<div class="panel-body">
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label>Host</label>
																	<input type="hidden" name="AlteraID" id="AlteraID">
																	<input class="form-control obg" id="smtpHost" name="smtpHost" placeholder="Digite o aqui....">
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label>User</label>
																	<input type="hidden" name="AlteraID" id="AlteraID">
																	<input class="form-control obg" id="smtpUser" name="smtpUser" placeholder="Digite o aqui....">
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group">
																	<label>Senha</label>
																	<input type="hidden" name="AlteraID" id="AlteraID">
																	<input class="form-control obg" id="smtpSenha" name="smtpSenha" placeholder="Digite o aqui....">
																</div>
															</div>
															<div class="col-md-2">
																<div class="form-group">
																	<label>porta</label>
																	<input type="hidden" name="AlteraID" id="AlteraID">
																	<input class="form-control obg" id="porta" name="porta" placeholder="Digite o aqui....">
																</div>
															</div>
														</div>
														<div class="modal-footer justify-content-between">
															<button name="btnGravar" class="btn btn-success col-sm-12" onclick="return CadastrarSetor('form_setor')">Salvar</button>
														</div>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-1-2" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

														<i class="ace-icon fa fa-sort-amount-desc"></i>
														&nbsp; Dados da empresa.
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-1-2">
													<div class="panel-body">
														<div id="faq-list-nested-1" class="panel-group accordion-style1 accordion-style2">
															<div class="panel panel-default">


																<div class="panel-body">
																	<div class="ace-settings-container" id="ace-settings-container">
																		<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
																			<i class="ace-icon fa fa-cog bigger-130"></i>
																		</div>





																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label>Host</label>
																					<div class="ace-settings-box clearfix" id="ace-settings-box">
																						<div class="pull-left width-50">
																							<div class="ace-settings-item">
																								<div class="pull-left">
																									<select id="skin-colorpicker" class="hide">
																										<option data-skin="no-skin" value="#438EB9">#438EB9</option>
																										<option data-skin="skin-1" value="#222A2D">#222A2D</option>
																										<option data-skin="skin-2" value="#C6487E">#C6487E</option>
																										<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
																									</select>
																								</div>
																								<span>&nbsp; Choose Skin</span>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
																								<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
																								<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
																								<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
																								<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
																								<label class="lbl" for="ace-settings-add-container">
																									Inside
																									<b>.container</b>
																								</label>
																							</div>
																						</div><!-- /.pull-left -->

																						<div class="pull-left width-50">
																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
																								<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
																								<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
																							</div>

																							<div class="ace-settings-item">
																								<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
																								<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
																							</div>
																						</div><!-- /.pull-left -->
																					</div><!-- /.ace-settings-box -->
																				</div>
																			</div>

																		</div>






																	</div><!-- /.ace-settings-container -->
																</div>

															</div>




														</div>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-1-3" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

														<i class="ace-icon fa fa-credit-card bigger-130"></i>
														&nbsp; Single-origin coffee nulla assumenda shoreditch et?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-1-3">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life
														accusamus terry richardson ad squid. 3 wolf moon officia aute,
														non cupidatat skateboard dolor brunch. Food truck quinoa
														nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
														put a bird on it squid single-origin coffee nulla assumenda
														shoreditch et.
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-1-4" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

														<i class="ace-icon fa fa-files-o bigger-130"></i>
														&nbsp; Sunt aliqua put a bird on it squid?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-1-4">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life
														accusamus terry richardson ad squid. 3 wolf moon officia aute,
														non cupidatat skateboard dolor brunch. Food truck quinoa
														nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
														put a bird on it squid single-origin coffee nulla assumenda
														shoreditch et.
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-1-5" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

														<i class="ace-icon fa fa-cog bigger-130"></i>
														&nbsp; Brunch 3 wolf moon tempor sunt aliqua put?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-1-5">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life
														accusamus terry richardson ad squid. 3 wolf moon officia aute,
														non cupidatat skateboard dolor brunch. Food truck quinoa
														nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
														put a bird on it squid single-origin coffee nulla assumenda
														shoreditch et.
													</div>
												</div>
											</div>
										</div>
									</div>

									<div id="faq-tab-2" class="tab-pane fade">
										<h4 class="blue">
											<i class="green ace-icon fa fa-user bigger-110"></i>
											Informações Sobre o Autor
										</h4>

										<div class="space-8"></div>


										<div id="faq-list-2" class="panel-group accordion-style1 accordion-style2">
											<form action="" class="form-horizontal" role="form" method="post">
												<div class="form-group">

													<div class="col-sm-12">
														<!-- <label class="control-label" for="form-field-1-1"> Full Length </label> -->
														<textarea style="resize: vertical;" rows="10" class="form-control" id="form-field-8" placeholder="Descreva o que deve aparecer no sobre"></textarea>
													</div>

												</div>
												<div class="form-group">
													<div class="col-sm-6">

														<button class="col-sm-12 btn btn-white btn-success">
															<i class="ace-icon fa fa-check bigger-110"></i>Gravar dados
														</button>
													</div>
													<div class="col-sm-6">
														<button class="col-sm-12 btn btn-white btn-warning">
															<i class="ace-icon fa fa-undo bigger-110"></i>Voltar
														</button>

													</div>
												</div>
											</form>
										</div>


									</div>







									<div id="faq-tab-3" class="tab-pane fade">
										<h4 class="blue">
											<i class="orange ace-icon fa fa-user bigger-110"></i>
											Meus Dados
										</h4>

										<div class="space-8"></div>

										<div id="faq-list-2" class="panel-group accordion-style1 accordion-style2">
											<form action="" class="form-horizontal" role="form" method="post">
												<div class="form-group">


													<div class="col-md-12">

														<label>Nome</label>
														<input class="form-control obg" id="nome" name="nome" value="<?= $dadosUser['nome']?>"  placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>E-mail</label>
														<input class="form-control obg" id="email" name="email" value="<?= $dadosUser['login']?>" placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>Telefone</label>
														<input class="form-control obg" id="telefone" name="telefone" value="<?= $dadosUser['telefone']?>" placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>Cep</label>
														<input class="form-control obg" id="cep" name="cep" value="<?= $dadosUser['cep']?>" placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>Rua</label>
														<input class="form-control obg" id="rua" name="rua" value="<?= $dadosUser['rua']?>" placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>Cidade</label>
														<input class="form-control obg" id="cidade" name="cidade" value="<?= $dadosUser['cidade']?>" placeholder="Digite o aqui....">

													</div>
													<div class="col-md-12">

														<label>Estado</label>
														<input class="form-control obg" id="estado" name="estado" value="<?= $dadosUser['sigla_estado']?>" placeholder="Digite o aqui....">

													</div>

												</div>
												<div class="form-group">
													<div class="col-sm-6">

														<button class="col-sm-12 btn btn-white btn-success">
															<i class="ace-icon fa fa-check bigger-110"></i>Gravar dados
														</button>
													</div>
													<div class="col-sm-6">
														<button class="col-sm-12 btn btn-white btn-warning">
															<i class="ace-icon fa fa-undo bigger-110"></i>Voltar
														</button>

													</div>
												</div>
											</form>
										</div>
									</div>

									<div id="faq-tab-4" class="tab-pane fade">
										<h4 class="blue">
											<i class="purple ace-icon fa fa-magic bigger-110"></i>
											Miscellaneous Questions
										</h4>

										<div class="space-8"></div>

										<div id="faq-list-4" class="panel-group accordion-style1 accordion-style2">
											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-4-1" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-hand-o-right" data-icon-hide="ace-icon fa fa-hand-o-down" data-icon-show="ace-icon fa fa-hand-o-right"></i>&nbsp;
														Enim eiusmod high life accusamus terry richardson?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-4-1">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-4-2" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-frown-o bigger-120" data-icon-hide="ace-icon fa fa-smile-o" data-icon-show="ace-icon fa fa-frown-o"></i>&nbsp;
														Single-origin coffee nulla assumenda shoreditch et?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-4-2">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-4-3" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
														Sunt aliqua put a bird on it squid?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-4-3">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<a href="#faq-4-4" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
														<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
														Brunch 3 wolf moon tempor sunt aliqua put?
													</a>
												</div>

												<div class="panel-collapse collapse" id="faq-4-4">
													<div class="panel-body">
														Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- PAGE CONTENT ENDS -->


						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.final do conteudo da pagina -->
			</div>
		</div><!-- /.main-content -->

		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>


	</div><!-- /.final do conteudo Princial -->







	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
</body>


</html>