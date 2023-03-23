<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;

use Src\Controller\UsuarioController;
use Src\Controller\SendMailController;
use Src\VO\UsuarioVO;
use Src\VO\TecnicoVO;
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
}



if (isset($_POST['VerificaEmail']) and $_POST['VerificaEmail'] == 'ajx') {
    $ret = $ctrl_usuario->VerificarEmailController($_POST['Email']);


    if ($ret) {
        echo 1;
    } else {
        echo -1;
    }
} else if (isset($_POST['btn_acessar'])) {
    $ret = $ctrl_usuario->ValidarLoginController($_POST['login'], $_POST['senha']);
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

        <div id="table_result_Usuario">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Nome</th>
                        <th class="sorting_desc">E-mail</th>
                        <th class="sorting_desc">Setor/Empresa</th>
                        <th class="sorting_desc">Tipo</th>
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
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
                                        Alterar
                                    </a>
                                    <a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
                                        Enviar e-mail
                                    </a>
                                    <a href="#modal_status" data-toggle="modal" onclick="CarregarModalStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['status'] ?>')" class=" btn btn-xs btn-<?= $pessoas[$i]['status'] == STATUS_ATIVO ? "danger" : "success" ?> "><?= $pessoas[$i]['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>
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

    <div id="table_result_Usuario">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome</th>
                    <th class="sorting_desc">E-mail</th>
                    <th class="sorting_desc">Setor/Empresa</th>
                    <th class="sorting_desc">Tipo</th>
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
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
                                    Alterar
                                </a>
                                <a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
                                    Enviar e-mail
                                </a>
                                <a href="#modal_status" data-toggle="modal" onclick="CarregarModalStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['status'] ?>')" class=" btn btn-xs btn-<?= $pessoas[$i]['status'] == STATUS_ATIVO ? "danger" : "success" ?> "><?= $pessoas[$i]['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>
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

    <div id="table_result_Usuario">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome</th>
                    <th class="sorting_desc">E-mail</th>
                    <th class="sorting_desc">Setor/Empresa</th>
                    <th class="sorting_desc">Tipo</th>
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
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a st class="green btn btn-warning btn-xs" href="#usuario" role="button" data-toggle="modal" onclick="AlterarUsuarioModal('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['tipo'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= $pessoas[$i]['telefone'] ?>', '<?= $pessoas[$i]['cep'] ?>', '<?= $pessoas[$i]['rua'] ?>', '<?= $pessoas[$i]['bairro'] ?>', '<?= $pessoas[$i]['cidade'] ?>', '<?= $pessoas[$i]['sigla_estado'] ?>', '<?= $pessoas[$i]['empresa_tecnico'] ?>', '<?= $pessoas[$i]['setor_id'] ?>', '<?= $pessoas[$i]['id_end'] ?>')">
                                    Alterar
                                </a>
                                <a st class="green btn btn-purple btn-xs" title="Envia dados de acesso via email" role="button" onclick="EnviarEmailAcesso('<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['login'] ?>', '<?= ($pessoas[$i]['tipo'] == 1 ? SITE_ADMIN : ($pessoas[$i]['tipo'] == 2 ? SITE_FUNC : SITE_TEC)) ?>',)">
                                    Enviar e-mail
                                </a>
                                <a href="#modal_status" data-toggle="modal" onclick="CarregarModalStatus('<?= $pessoas[$i]['id'] ?>', '<?= $pessoas[$i]['nome'] ?>', '<?= $pessoas[$i]['status'] ?>')" class=" btn btn-xs btn-<?= $pessoas[$i]['status'] == STATUS_ATIVO ? "danger" : "success" ?> "><?= $pessoas[$i]['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>
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
<?php } else {
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
} ?>