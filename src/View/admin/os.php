<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/os_dataview.php';
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
							<a href="#">Home</a>
						</li>

						<li class="active">Ordem de serviço</li>
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
										<a href="#os" role="button" class="btn btn-success" data-toggle="modal"><i class="ace-icon fa fa-plus white"></i>Novo</a>
									</h4>
									<div class="table-header">
										Buscar ordem de serviço

										<div style="display:inline-flex" id="dynamic-table_filter">
											<input type="search" onkeyup="FiltrarOs(this.value)" class="form-control input-sm" placeholder="buscar por NF" aria-controls="dynamic-table">
										</div>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="buscarEmAberto" onclick="FiltrarEquipamento('0')" type="radio" class="ace" checked>
											<span class="lbl">Em aberto</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="buscarEmAndamento" onclick="FiltrarEquipamento('1')" type="radio" class="ace">
											<span class="lbl">Em andamento</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="buscarCancelada" onclick="FiltrarEquipamento('2')" type="radio" class="ace">
											<span class="lbl">Cancelada</span>
										</label>
										<label style="margin-left:10px">
											<input name="form-field-radio" id="buscarConcluida" onclick="FiltrarEquipamento('3')" type="radio" class="ace">
											<span class="lbl"> Concluídas</span>
										</label>
									</div>
									<div id="tabela_result_alocado">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>[NºOS] - Nome do cliente</th>
													<th>Dt Inicio</th>
													<th>Dt Entrega</th>
													<th>Tecnico</th>
													<th>Valor</th>
													<th>Status</th>
													<th>Ação</th>
												</tr>
											</thead>
											<tbody>
                                    <?php $soma = 0;
                                    for ($i = 0; $i < count($os); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($os[$i]['OsFaturado'] == 'N') { ?>
                                                    <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                                                    <?php foreach ($dadosOS as $do) {
                                                        if ($do['OsID'] == $os[$i]['OsID']) {
                                                            $prodOS = $do['ProdOs_osID'];
                                                            $servOS = $do['ServOs_osID'];
                                                            $anxOS = $do['AnxOsID'];
                                                        }
                                                    } ?>
                                                    <?php if ($prodOS == '' && $servOS == '' && $anxOS == '') { ?>
                                                        <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                    <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                                                <?php } ?>
                                                <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= '[' . $os[$i]['OsID'] . ']' . ' - ' . $os[$i]['nomeCliente'] ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                                            <td><?= $os[$i]['OsTecID'] ?></td>
                                            <td><?= Util::FormatarValor($soma = $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>

                                            <td><?php
                                                $status = '';
                                                if ($os[$i]['OsStatus'] == "O") {
                                                    $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                                } else if ($os[$i]['OsStatus'] == "A") {
                                                    $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "EA") {
                                                    $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "F") {
                                                    $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                                } else if ($os[$i]['OsStatus'] == "C") {
                                                    $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                                } ?>
                                                <?= $status ?>
                                                <?php $texto = "$os[$i]['OsDefeito']"; ?>
                                                <?= ($os[$i]['OsStatus'] != "F" ? '' : ($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>

                                                <?php
                                                $os[$i]['CliNome'] = str_replace(' ', '%20', $os[$i]['nomeCliente']);
                                                $telefone = Util::remove_especial_char(trim($os[$i]['CliTelefone']));
                                                $inicio_texto = "Olá, tudo bem?<br /><br /> Somo da *{$dadosEmp[0]['EmpNome']}<br /><br />*Segue o orçamento:*{$os[$i]['OsID']}*<br /><br />Nome do cliente: *{$os[$i]['nomeCliente']}*<br /><br />Defeito:";
                                                $enviarDadosAparelho = str_replace('<br /', '%0A', $os[$i]['OsDescProdServ']);
                                                $enviarOrcamento = str_replace('<br /', '%0A', $os[$i]['OsDefeito']);
                                                $valorOS = str_replace('<br /', '%0A', $os[$i]['OsValorTotal']);
                                                $linkTratado = "{$inicio_texto}";
                                                $linkTratado = str_replace('<br />', '%0A', $linkTratado);
                                                $linkTratado = str_replace(' ', '%20', $linkTratado);

                                                $link = "https://api.whatsapp.com/send?phone=55{$telefone}&text=🔔%20{$linkTratado}%0A{$enviarOrcamento}%0ADados do aparelho:%0A{$enviarDadosAparelho}%0AValor do Serviço: R$:{$valorOS}";
                                                ?>
                                                <a class="btn btn-primary btn-xs " aria-label="WhatsApp" href="<?= $link ?>" target="_blank">Enviar orçamento</a>
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
		<form id="form_os" action="os.php" method="post">
			<?php include_once 'modal/_os.php' ?>
			<?php include_once 'modal/_excluir.php' ?>

		</form>


		<?php include_once PATH_URL . '/Template/_includes/_footer.php' ?>
	</div><!-- /.final do conteudo Princial -->

	<?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
	<script src="../../Resource/js/mensagem.js"></script>
	<script src="../../Resource/ajax/os-ajx.js"></script>
</body>


</html>