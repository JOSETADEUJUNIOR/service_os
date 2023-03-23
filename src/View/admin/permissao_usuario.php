<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';
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

									<h1>Definir Permissões de Acesso</h1>
									<form id="permissoes" action="permissao_usuario.php" method="POST">
										<fieldset>
											<legend>Administrador</legend>
											<label><input type="checkbox" name="administrador[]" value="tela1.php"> Tela 1</label><br>
											<label><input type="checkbox" name="administrador[]" value="tela2.php"> Tela 2</label><br>
											<label><input type="checkbox" name="administrador[]" value="tela3.php"> Tela 3</label><br>
										</fieldset>
										<fieldset>
											<legend>Gerente</legend>
											<label><input type="checkbox" name="gerente[]" value="tela2.php"> Tela 2</label><br>
											<label><input type="checkbox" name="gerente[]" value="tela3.php"> Tela 3</label><br>
											<label><input type="checkbox" name="gerente[]" value="tela4.php"> Tela 4</label><br>
										</fieldset>
										<fieldset>
											<legend>Vendedor</legend>
											<label><input type="checkbox" name="vendedor[]" value="tela1.php"> Tela 1</label><br>
											<label><input type="checkbox" name="vendedor[]" value="tela4.php"> Tela 4</label><br>
											<label><input type="checkbox" name="vendedor[]" value="tela5.php"> Tela 5</label><br>
										</fieldset>
										<button type="button" onclick="return SalvarPermissao();">Salvar Permissões</button>
									</form>

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
	<script src="../../Template/assets/js/bootbox.js"></script>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/usuario-ajx.js"></script>
	



</body>


</html>