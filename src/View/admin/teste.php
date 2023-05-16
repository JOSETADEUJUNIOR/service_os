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
									
									<h2>Lista de Produtos</h2>

<form id="form-produtos">
  <div id="lista-produtos">
	<!-- Área onde os produtos serão carregados dinamicamente -->
  </div>
  <button type="submit">Gravar Itens</button>
</form>















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


<script>
	$(document).ready(function() {
		carregarProdutos();
	  });

</script>
			
			
</body>


</html>