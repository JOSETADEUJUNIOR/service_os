<?php
require_once dirname(__DIR__, 2) . '/Resource/dataview/produto_dataview.php';
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
										<a href="#produto" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
										<?php //if (count($setor) > 0) { 
										?>
										<button style="display: none;" type="button" onclick="Imprimir()" class="btn btn-purple"><i class="ace-icon fa fa-plus white"></i>Relatorio</button>
										<?php //} 
										?>
									</h4>
									<div class="table-header">
										Produtos Cadastrados

										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" onkeyup="FiltrarProduto(this.value)" class="form-control input-sm" placeholder="buscar por produto" aria-controls="dynamic-table">
										</div>
									</div>
									<div id="table_result_produto">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome/Descrição</th>
													<th class="sorting_desc">Valor Compra</th>
													<th class="sorting_desc">Valor Venda</th>
													<th class="sorting_desc">Estoque Total</th>
													<th class="sorting_desc">Estoque Mínimo</th>
													<th class="sorting_desc">Img Produto</th>
													<th class="hidden-480">Ativo/Inativo</th>
													<th class="sorting_desc">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < count($produto); $i++) { ?>
													<tr>
														<td><?= $produto[$i]['ProdDescricao'] ?></td>
														<td><?= $produto[$i]['ProdValorCompra'] ?></td>
														<td><?= $produto[$i]['ProdValorVenda'] ?></td>
														<td><?= $produto[$i]['ProdEstoque'] ?></td>
														<td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
														<?php if ($produto[$i]['ProdImagemPath'] != "") { ?>
															<td>
																<!-- <center><a href="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" target="_blank" rel="noopener noreferrer"><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" class="brand-image img-circle elevation-3" width="50px" height="50px"></a></center> -->
																<img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" width="50px" height="50px" class="produto-imagem" data-toggle="modal" data-target="#modal-imagem" data-imagem="<?= $produto[$i]['ProdImagemPath'] ?>">

															</td>
														<?php } else { ?><td></td><?php } ?>
														<td>
															<div class="col-xs-3">
																<label>
																	<input name="switch-field-1" value="0" id="status_produto" onclick="MudarStatusProduto('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdStatus'] ?>')" title="Ativar/Inativar Produto" class="ace ace-switch ace-switch-6" <?= $produto[$i]['ProdStatus'] == STATUS_ATIVO ? "checked='checked'" : ''  ?> type="checkbox" />
																	<span class="lbl"></span>
																</label>
															</div>
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>')">
																	<i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
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
																			<a href="#produto" onclick="" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
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
			</div><!-- /.main-content -->
			<form id="form_produto" action="produto.php" method="post">
				<?php include_once 'modal/_produto.php' ?>
				<?php include_once 'modal/_imagens.php' ?>
			</form>
			<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
		</div><!-- /.final do conteudo Princial -->

		<script src="../../Template/assets/js/jquery.dataTables.min.js"></script>
		<script src="../../Template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../../Template/assets/js/dataTables.buttons.min.js"></script>


		<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
		<script src="../../Template/assets/js/bootbox.js"></script>
		<script src="../../Resource/js/mensagem.js"></script>
		<script src="../../Resource/ajax/produto-ajx.js"></script>
		<script type="text/javascript">
			if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>
		<script>


		</script>
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
					$('#dynamic-table')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
					.DataTable({
						bAutoWidth: false,
						"aoColumns": [{
								"bSortable": false
							},
							null, null, null, null, null,
							{
								"bSortable": false
							}
						],
						"aaSorting": [],


						//"bProcessing": true,
						//"bServerSide": true,
						//"sAjaxSource": "http://127.0.0.1/table.php"	,

						//,
						//"sScrollY": "200px",
						//"bPaginate": false,

						//"sScrollX": "100%",
						//"sScrollXInner": "120%",
						//"bScrollCollapse": true,
						//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
						//you may want to wrap the table inside a "div.dataTables_borderWrap" element

						//"iDisplayLength": 50


						select: {
							style: 'multi'
						}
					});

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if (div.length == 1) div.tooltip({
							container: 'body',
							title: div.parent().text()
						});
						else $(this).tooltip({
							container: 'body',
							title: $(this).text()
						});
					});
				}, 500);

				$('[data-rel="tooltip"]').tooltip({
					placement: tooltip_placement
				});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
					return 'left';
				}

				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				new $.fn.dataTable.Buttons(myTable, {
					buttons: [{
							"extend": "colvis",
							"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
							"className": "btn btn-white btn-primary btn-bold",
							columns: ':not(:first):not(:last)'
						},
						{
							"extend": "copy",
							"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
							"className": "btn btn-white btn-primary btn-bold"
						},
						{
							"extend": "csv",
							"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
							"className": "btn btn-white btn-primary btn-bold"
						},
						{
							"extend": "excel",
							"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
							"className": "btn btn-white btn-primary btn-bold"
						},
						{
							"extend": "pdf",
							"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
							"className": "btn btn-white btn-primary btn-bold"
						},
						{
							"extend": "print",
							"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
							"className": "btn btn-white btn-primary btn-bold",
							autoPrint: false,
							message: 'This print was produced using the Print button for DataTables'
						}
					]
				});
				myTable.buttons().container().appendTo($('.tableTools-container'));

				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function(e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function(e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if ($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
							.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
							.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});

				////

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if (div.length == 1) div.tooltip({
							container: 'body',
							title: div.parent().text()
						});
						else $(this).tooltip({
							container: 'body',
							title: $(this).text()
						});
					});
				}, 500);





				myTable.on('select', function(e, dt, type, index) {
					if (type === 'row') {
						$(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
					}
				});
				myTable.on('deselect', function(e, dt, type, index) {
					if (type === 'row') {
						$(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
					}
				});




				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function() {
					var th_checked = this.checked; //checkbox inside "TH" table header

					$('#dynamic-table').find('tbody > tr').each(function() {
						var row = this;
						if (th_checked) myTable.row(row).select();
						else myTable.row(row).deselect();
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
					var row = $(this).closest('tr').get(0);
					if (this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});



				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});



				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
					var th_checked = this.checked; //checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function() {
						var row = this;
						if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]', function() {
					var $row = $(this).closest('tr');
					if ($row.is('.detail-row ')) return;
					if (this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({
					placement: tooltip_placement
				});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
					return 'left';
				}




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/





				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			})
		</script>



</body>


</html>