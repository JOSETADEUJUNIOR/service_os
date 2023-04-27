<?php

include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\Controller\UsuarioController;
use Src\Controller\SendMailController;
use Src\VO\UsuarioVO;
use Src\VO\TecnicoVO;
use Src\VO\EmpresaVO;
use Src\VO\FuncionarioVO;
use Src\mail\ModeloUsuario;


use Src\Controller\SetorController;

$ctrl_setor = new SetorController;
$setores = $ctrl_setor->RetornarSetorController();
$ctrl_usuario = new UsuarioController;

if (isset($_POST['EnviarEmail']) and $_POST['EnviarEmail'] == 'ajx') {
    $mailSender = new SendMailController();
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'][0];
    $site = $_POST['site'];
    $body = (new ModeloUsuario)->EmailUser($nome, $email, $senha, $site);

    $mailSender->sendEmail($email, 'segue dados de acesso ao syschamados', $body);
    if ($mailSender == true) {
        echo 1;
    } else {
        echo -1;
    }
} else if (isset($_POST['btnAlterar'])) {

    $nomeDoArquivo = "";
    $path = "";
    $vo = new EmpresaVO;
    $vo->setNomeEmpresa($_POST['EmpNome']);
    $vo->setCNPJ($_POST['EmpCNPJ']);
    $vo->setEndereco($_POST['EmpEnd']);
    $vo->setCep($_POST['EmpCep']);
    $vo->setNumero($_POST['EmpNumero']);
    $vo->setCidade($_POST['EmpCidade']);
    if ($_FILES['arquivos'] != "") {

        $arquivos = $_FILES['arquivos'] ?? "";

        if ($arquivos['size'] > 2097152)
            die("Arquivo muito grande !! Max: 2MB");

        $pasta = "arquivos/";
        @mkdir($pasta);
        $nomeDoArquivo = $arquivos['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != '')
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
    }
    $vo->setEmpLogo($nomeDoArquivo);
    $vo->setLogoPath($path);

    $ret = $ctrl_usuario->AlterarEmpresaController($vo);

    if ($_POST['btnAlterar'] == 'ajxx') {
        echo $ret;
    } else {
        $dados = $ctrl_usuario->RetornarDadosCadastraisController();
    }
} else if (isset($_POST['VerificaEmail']) and $_POST['VerificaEmail'] == 'ajx') {
    $ret = $ctrl_usuario->VerificarEmailController($_POST['Email']);


    if ($ret) {
        echo 1;
    } else {
        echo -1;
    }
} else if (isset($_POST['mudar_status']) && $_POST['mudar_status'] == 'ajx') {

    $vo =  new UsuarioVO;

    $vo->setId($_POST['id_user']);
    $vo->setStatus($_POST['status_user']);
    echo $ctrl_usuario->MudarStatusController($vo);
} else if (isset($_POST['btn_cadastrar_permissao'])) {
    $tipo_usuario = $_POST['tipo_usuario'];
    $telas = implode(',', $_POST['telas']);

    $ret = $ctrl_usuario->CadastrarPermissao($telas);
} else if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $user = $ctrl_usuario->DetalharUsuarioController($_GET['id_user']);
    if (empty($user)) {
        Util::chamarPagina('consultar_usuario.php');
    }
    if ($user['tipo'] == PERFIL_FUNCIONARIO) {
        $ctrl_setor = new SetorController;
        $setores = $ctrl_setor->RetornarSetorController();
    }
} else if (isset($_POST['btnVerificarSenha'])) {

    $senhaAtual = $ctrl_usuario->ValidarSenhaAdmin($_POST['senha']);
    echo $senhaAtual;
} else if (isset($_POST['btnAtualizarSenha'])) {
    $vo = new UsuarioVO;
    $vo->setSenha($_POST['senha']);
    $vo->setId(Util::CodigoLogado());
    $resenha = $_POST['repetir_senha'];

    $senhaAlterada = $ctrl_usuario->AtualizarSenhaAtual($vo, $resenha);
    if ($_POST['btnAtualizarSenha'] == 'ajx') {
        echo $senhaAlterada;
    }
} else if (isset($_POST['btn_cadastrar'])) {


    if ($_POST['idUser'] == '') {

        if ($_POST['tipo'] == '1') {
            $vo = new UsuarioVO;

            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
        } else if ($_POST['tipo'] == '2') {
            $vo = new FuncionarioVO;
            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setSetor($_POST['setor']);
        } else if ($_POST['tipo'] == '3') {
            $vo = new TecnicoVO;
            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setNomeEmpresa($_POST['nome_empresa_tec']);
        }

        $vo->setCep($_POST['cep']);
        $vo->setRua($_POST['endereco']);
        $vo->setBairro($_POST['bairro']);
        $vo->setNomeCidade($_POST['cidade']);
        $vo->setEstado($_POST['estado']);
        //Util::debug($vo);
        $ret = $ctrl_usuario->CadastrarUsuarioController($vo);

        if ($_POST['btn_cadastrar'] == 'ajx') {

            echo $ret;
        }
    } else {
        if ($_POST['tipo'] == '1') {
            $vo = new UsuarioVO;
            $vo->setId($_POST['idUser']);
            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
        } else if ($_POST['tipo'] == '2') {
            $vo = new FuncionarioVO;
            $vo->setId($_POST['idUser']);
            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setSetor($_POST['setor']);
        } else if ($_POST['tipo'] == '3') {
            $vo = new TecnicoVO;
            $vo->setId($_POST['idUser']);
            $vo->setTipo($_POST['tipo']);
            $vo->setNome($_POST['nome']);
            $vo->setLogin($_POST['email']);
            $vo->setTelefone($_POST['telefone']);
            $vo->setNomeEmpresa($_POST['nome_empresa_tec']);
        }

        $vo->setIdEndereco($_POST['idEnd']);
        $vo->setCep($_POST['cep']);
        $vo->setRua($_POST['endereco']);
        $vo->setBairro($_POST['bairro']);
        $vo->setNomeCidade($_POST['cidade']);
        $vo->setEstado($_POST['estado']);
        //Util::debug($vo);
        $ret = $ctrl_usuario->AlterarUsuarioController($vo);

        if ($_POST['btn_cadastrar'] == 'ajx') {

            echo $ret;
        }
    }
} else if (isset($_POST['btnFiltrar']) && $_POST['btnFiltrar'] == 'ajx') {

    $nome_filtro = $_POST['FiltrarNome'] ?? '';
    $tipo = $_POST['FiltrarTipo'] ?? '';

    $pessoas = $ctrl_usuario->FiltrarPessoaController($nome_filtro, $tipo);
    if (count($pessoas) > 0) { ?>

        <div class="table-responsive" id="table_result_Usuario">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome</th>
													<th class="sorting_desc">E-mail</th>
													<th class="sorting_desc">Setor/Empresa</th>
													<th class="sorting_desc">Tipo</th>
													<th>Ativo/inativo</th>

													<th>Ações</th>
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
															<div class="hidden-sm hidden-xs action-buttons">
																<a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
																	Alterar
																</a>
																<a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
																	Enviar e-mail
																</a>
																
															</div>
															<div class="hidden-md hidden-lg">
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
															</div>
														</td>
													</tr>
												<?php } ?>

											</tbody>
										</table>
									</div>
    <?php
    } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == "ajx") {

    $pessoas = $ctrl_usuario->FiltrarUsuariosController(); ?>

<div class="table-responsive" id="table_result_Usuario">
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="sorting_desc">Nome</th>
                <th class="sorting_desc">E-mail</th>
                <th class="sorting_desc">Setor/Empresa</th>
                <th class="sorting_desc">Tipo</th>
                <th>Ativo/inativo</th>

                <th>Ações</th>
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
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
                                Alterar
                            </a>
                            <a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
                                Enviar e-mail
                            </a>
                            
                        </div>
                        <div class="hidden-md hidden-lg">
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
                        </div>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
<?php } else if (isset($_POST['btn_consultar']) && $_GET['btn_consultar'] == "ajx") {

    $registros = $ctrl_usuario->FiltrarUsuariosController();

    $registrosPorPagina = REGISTRO_POR_PAGINA;
    $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    // Obtém o número total de registros
    $totalRegistros = count($registros);

    // Calcula o número total de páginas
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

    // Calcula o índice inicial do registro a ser exibido na página atual
    $indiceInicial = ($paginaAtual - 1) * $registrosPorPagina;

    // Obtém os registros para exibir na página atual
    $pessoas = array_slice($registros, $indiceInicial, $registrosPorPagina);
?>

    <div class="table-responsive" id="table_result_Usuario">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="sorting_desc">Nome</th>
													<th class="sorting_desc">E-mail</th>
													<th class="sorting_desc">Setor/Empresa</th>
													<th class="sorting_desc">Tipo</th>
													<th>Ativo/inativo</th>

													<th>Ações</th>
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
															<div class="hidden-sm hidden-xs action-buttons">
																<a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
																	Alterar
																</a>
																<a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
																	Enviar e-mail
																</a>
																
															</div>
															<div class="hidden-md hidden-lg">
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
															</div>
														</td>
													</tr>
												<?php } ?>

											</tbody>
										</table>
									</div>
    <?php } else if (isset($_POST['btn_consultar_empresa']) && $_POST['btn_consultar_empresa'] == "ajx") {

    $dados = $ctrl_usuario->RetornarDadosCadastraisController();

    if ($dados != "") { ?>
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


            <!-- <div class="col-sm-12">

                <div class="position-relative">
                    <img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath'] ?>" heigth="180px" width="120px" alt="Photo 2" class="img-fluid">

                </div>

            </div> -->
            <div style="margin-top: 10px;" class="col-sm-12 col-xs-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">Logo da empresa</h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            <a href="#" data-action="close">
                                <i class="ace-icon fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <div class="position-relative">
                                    <img src="../../Resource/dataview/<?= $dados[0]['EmpLogoPath'] ?>" heigth="180px" width="120px" alt="Photo 2" class="img-fluid">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="ace-file-input"><input type="file" name="logo" id="logo" value="<?= $dados[0]['EmpLogo'] ?>"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                </div>
                            </div>

                            <!-- <div class="form-group">
																						<div class="col-xs-12">
																							<label class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
																						</div>
																					</div> -->

                            <label>
                                <!-- <input type="checkbox" name="file-format" id="id-file-format" class="ace"> -->
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>
                </div>
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
<?php } else {
        $dados = $ctrl_usuario->RetornarDadosCadastraisController();
    }
} else {
    $registros = $ctrl_usuario->FiltrarUsuariosController();

    $registrosPorPagina = REGISTRO_POR_PAGINA;
    $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    // Obtém o número total de registros
    $totalRegistros = count($registros);

    // Calcula o número total de páginas
    $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
    // Calcula o índice inicial do registro a ser exibido na página atual
    $indiceInicial = ($paginaAtual - 1) * $registrosPorPagina;

    // Obtém os registros para exibir na página atual
    $pessoas = array_slice($registros, $indiceInicial, $registrosPorPagina);
}

?>