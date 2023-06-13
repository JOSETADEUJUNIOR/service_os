<?php

use Src\_public\Util;

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
										<?php if (count($produto) > 0) { ?>
											<button  id="btnImprimir" type="button" onclick="Imprimir()" class="btn btn-purple"><i class="ace-icon fa fa-plus white"></i>Relatorio</button>
										<?php } ?>
									</h4>
									<div class="table-header">
										Produtos Cadastrados
										<div style="display:inline-flex" id="dynamic-table_filter">
											<input id="buscaProduto" name="buscaProduto" type="search" onkeyup="FiltrarProdutoAjx(this.value)" class="form-control input-sm" placeholder="buscar por produto" aria-controls="dynamic-table">
										</div>
									</div>
									<div class="table-responsive" id="table_result_produto">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome/Descrição</th>
													<th class="sorting_desc">Valor Compra</th>
													<th class="sorting_desc">Valor Venda</th>
													<th class="sorting_desc">Estoque Total</th>
													<th class="sorting_desc">Estoque Mínimo</th>
													<th class="sorting_desc">Img Produto</th>
													<th class="sorting_desc">Ativo/Inativo</th>
													<th class="sorting_desc">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 0; $i < count($produto); $i++) { ?>
													<tr>
														<td><?= $produto[$i]['ProdDescricao'] ?></td>
														<td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorCompra']) ?></td>
														<td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorVenda']) ?></td>
														<td><?= $produto[$i]['ProdEstoque'] ?></td>
														<td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
														<?php if ( $produto[$i]['ProdImagemPath'] != "" || $produto[$i]['ProdImagemPath'] != null) { ?>
															<td>																
																<center><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" width="50px" height="50px" class="produto-imagem brand-image img-circle elevation-3" data-toggle="modal" data-target="#modal-imagem" data-imagem="<?= $produto[$i]['ProdImagemPath'] ?>"></center>
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
															<div class="col-xs-3">
																<a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdImagem'] ?>','<?= $produto[$i]['ProdImagemPath'] ?>')">
																	<i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
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
				<form id="form_produto" action="produto.php" method="post">
					<?php include_once 'modal/_produto.php' ?>
					<?php include_once 'modal/_imagens.php' ?>
				</form>
				<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
			</div><!-- /.final do conteudo Princial -->
			<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
			<script src="../../Resource/js/mensagem.js"></script>
			<script src="../../Resource/ajax/produto-ajx.js"></script>
			<script src="../../Resource/ajax/modal_imagem-ajx.js"></script>
</body>


</html>