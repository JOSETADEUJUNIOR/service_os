<div class="modal fade" id="print_os">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-white">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Impressão da OS</h4>
				
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="space-6"></div>

						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<div class="widget-box transparent">
									<div class="widget-header widget-header-large">
										<h3 class="widget-title grey lighter">
											<i class="ace-icon fa fa-leaf green"></i>
											Dados para pagamento
										</h3>

										<div class="widget-toolbar no-border invoice-info">
											<span class="invoice-info-label">Nota Fiscal:</span>
											<span id="numero_nf_rel" class="red"></span>

											<br />
											<span class="invoice-info-label">Data da fatura:</span>
											<span id="data_fatura" class="blue"></span>
										</div>

										<div class="widget-toolbar hidden-480">
											<button class="btn btn-purple btn-xs" id="imprimirModal">
												<i class="ace-icon fa fa-print"></i>
											</button>
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main padding-24">
											<div class="row">
												<div class="col-sm-6">
													<div class="row">
														<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
															<b>Informações da empresa</b>
														</div>
													</div>

													<div>
														<ul class="list-unstyled spaced">
															<li id="empresa_cnpj">
																<i class="ace-icon fa fa-caret-right blue"></i>Street,
																City
															</li>
															<li id="empresa_nome">
																<i class="ace-icon fa fa-caret-right blue"></i>Street,
																City
															</li>
															<li id="empresa_endereco">
																<i class="ace-icon fa fa-caret-right blue"></i>Street,
																City
															</li>

															<li id="empresa_cep">
																<i class="ace-icon fa fa-caret-right blue"></i>Zip
																Code
															</li>

															<li id="empresa_cidade">
																<i class="ace-icon fa fa-caret-right blue"></i>State,
																Country
															</li>
														</ul>
													</div>
												</div><!-- /.col -->

												<div class="col-sm-6">
													<div class="row">
														<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
															<b>Informações do Cliente</b>
														</div>
													</div>

													<div>
														<ul class="list-unstyled  spaced">
															<li id="cliente_nome">
																<i class="ace-icon fa fa-caret-right green">Endereco: </i>
															</li>
															<li id="cliente_endereco">
																<i class="ace-icon fa fa-caret-right green">Endereco: </i>
															</li>

															<li id="cliente_cep">
																<i class="ace-icon fa fa-caret-right green"></i>Zip
																Code
															</li>

															<li id="cliente_estado">
																<i class="ace-icon fa fa-caret-right green"></i>State,
																Country
															</li>

															<!-- <li class="divider"></li> -->

															<li id="cliente_email">
																<i class="ace-icon fa fa-caret-right green"></i>
																Informações:
															</li>
														</ul>
													</div>
												</div><!-- /.col -->













											</div><!-- /.row -->


											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Descrição da OS</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li id="os_descricao">
																		<i class="ace-icon fa fa-caret-right blue"></i>Descrição da OS
																	</li>

																</ul>
															</div>
														</div><!-- /.col -->
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Defeito da OS</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li id="os_defeito">
																		<i class="ace-icon fa fa-caret-right blue"></i>Descrição da OS
																	</li>

																</ul>
															</div>
														</div><!-- /.col -->
													</div>
												</div>
											</div>

											<!-- informações das os -->

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Observações gerais da OS</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li id="os_observacao">
																		<i class="ace-icon fa fa-caret-right blue"></i>Descrição da OS
																	</li>

																</ul>
															</div>
														</div><!-- /.col -->
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Laudo técnico</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li id="os_laudo_tec">
																		<i class="ace-icon fa fa-caret-right blue"></i>Descrição da OS
																	</li>

																</ul>
															</div>
														</div><!-- /.col -->
													</div>
												</div>
											</div>





											<div class="space"></div>

											<div class="table-responsive">
												<table class="table table-striped table-bordered">
													<thead>
														<tr>
															<th class="center">#</th>
															<th>Produto/Serviço</th>
															<th class="hidden-xs">Descrição</th>
															<th class="hidden-xs">Quantidade</th>
															<th class="hidden-480">Valor Unitário</th>
															<th>Total</th>
														</tr>
													</thead>

													<tbody id="table_rel_os">

													</tbody>
												</table>
											</div>

											<div class="hr hr8 hr-double hr-dotted"></div>

											<div class="row">
												<div class="col-sm-5 pull-right">
													<h4 class="pull-right">
														Total geral :
														<span id="total_geral" class="red">$395</span>
													</h4>
												</div>
												<!-- <div class="col-sm-7 pull-left"> Extra Information </div> -->
											</div>

											<div class="space-6"></div>
											<!-- <div class="well">
												Thank you for choosing Ace Company products.
												We believe you will be satisfied by our services.
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->

			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
	/* $(window).on("load", function(){
   // página totalmente carregada (DOM, imagens etc.)
   $("#nome").focus();
   $("#nome").reset();
}); */

	// Função para imprimir o conteúdo do modal com o CSS aplicado
	function imprimirModal() {
		// Copiar o conteúdo do modal para uma nova janela pop-up
		var conteudo = document.getElementById('print_os').innerHTML;
		var janelaImpressao = window.open('', 'janelaImpressao', 'width=1000,height=800');

		// Escrever o conteúdo copiado na nova janela
		janelaImpressao.document.write('<html><head><title>Imprimir Modal</title>');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/ace.min.css" type="text/css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/bootstrap.min.css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/plugins/toastr/toastr.min.css">');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/fonts.googleapis.com.css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/ace-skins.min.css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/ace-rtl.min.css" />');
		janelaImpressao.document.write('<link rel="stylesheet" href="../Template/assets/css/estilo.css">');
		janelaImpressao.document.write('</head><body>');
		janelaImpressao.document.write(conteudo);
		janelaImpressao.document.write('</body></html>');
		janelaImpressao.document.close();

		janelaImpressao.print();
	}

	// Evento de clique no botão de impressão
	document.getElementById('imprimirModal').addEventListener('click', imprimirModal);

	// Evento de clique no botão para abrir o modal
	document.getElementById('abrirModal').addEventListener('click', function() {
		document.getElementById('print_os').style.display = 'block';
	});
</script>









</script>