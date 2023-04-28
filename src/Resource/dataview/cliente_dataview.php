<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\Controller\ClienteController;
use Src\VO\ClienteVO;
use Src\Controller\PdfController;

$ctrl = new ClienteController();
$pdfController = new PdfController;

if (isset($_POST['btn_cadastrar'])) {
    if ($_POST['CliID'] == '') {

        $vo = new ClienteVO;
        $vo->setCliNome($_POST['CliNome']);
        $vo->setCliDtNasc($_POST['CliDtNasc']);
        $vo->setCliCpfCnpj($_POST['CliCpfCnpj']);
        $vo->setCilTipo($_POST['CliTipo']);
        $vo->setCliTelefone($_POST['CliTelefone']);
        $vo->setCliEmail($_POST['CliEmail']);
        $vo->setCliCep($_POST['cep']);
        $vo->setCliEndereco($_POST['endereco']);
        $vo->setCliBairro($_POST['bairro']);
        $vo->setCliNumero($_POST['CliNumero']);
        $vo->setCliCidade($_POST['cidade']);
        $vo->setCliEstado($_POST['estado']);
        $vo->setCliDescricao($_POST['CliDescricao']);
        $ret = $ctrl->CadastrarClienteCTRL($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    } else {
        $vo = new ClienteVO;
        $vo->setCliID($_POST['CliID']);
        $vo->setCliNome($_POST['CliNome']);
        $vo->setCliDtNasc($_POST['CliDtNasc']);
        $vo->setCliCpfCnpj($_POST['CliCpfCnpj']);
        $vo->setCilTipo($_POST['CliTipo']);
        $vo->setCliTelefone($_POST['CliTelefone']);
        $vo->setCliEmail($_POST['CliEmail']);
        $vo->setCliCep($_POST['cep']);
        $vo->setCliEndereco($_POST['endereco']);
        $vo->setCliBairro($_POST['bairro']);
        $vo->setCliNumero($_POST['CliNumero']);
        $vo->setCliCidade($_POST['cidade']);
        $vo->setCliEstado($_POST['estado']);
        $vo->setCliDescricao($_POST['CliDescricao']);
        $ret = $ctrl->AlterarClienteCTRL($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    }
} else if (isset($_GET['btn_pdf'])) {
    //$dados = $ctrl->RetornarSetorController();

    //$relatorio = $pdfController->gerarPdf('relatorio_setor.php', $dados);

} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

    $nome_filtro = $_POST['FiltrarNome'];

    $cliente = $ctrl->FiltrarClienteCTRL($nome_filtro);

    if (count($cliente) > 0) { ?>

        <div id="table_result_cliente">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Nome</th>
                        <th class="sorting_desc">Data Nascimento</th>
                        <th class="sorting_desc">Telefone</th>
                        <th class="sorting_desc">E-mail</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($cliente); $i++) { ?>
                        <tr>
                            <td><?= $cliente[$i]['CliNome'] ?></td>
                            <td><?= $cliente[$i]['CliDtNasc'] ?></td>
                            <td><?= $cliente[$i]['CliTelefone'] ?></td>
                            <td><?= $cliente[$i]['CliEmail'] ?></td>
                            <td><?= $cliente[$i]['CliStatus'] ?></td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#cliente" role="button" data-toggle="modal" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>','<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliCpfCnpj'] ?>','<?= $cliente[$i]['CliTipo'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>')">
                                        <i title="Alterar cliente" class="ace-icon fa fa-pencil bigger-130"></i>
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
                                                <a href="#cliente" onclick="" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
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
    <?php
    } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == "ajx") {

    $cliente = $ctrl->SelecioneclienteCTRL(); ?>

    <div id="table_result_cliente">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome</th>
                    <th class="sorting_desc">Data Nascimento</th>
                    <th class="sorting_desc">Telefone</th>
                    <th class="sorting_desc">E-mail</th>
                    <th class="hidden-480">Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($cliente); $i++) { ?>
                    <tr>
                        <td><?= $cliente[$i]['CliNome'] ?></td>
                        <td><?= $cliente[$i]['CliDtNasc'] ?></td>
                        <td><?= $cliente[$i]['CliTelefone'] ?></td>
                        <td><?= $cliente[$i]['CliEmail'] ?></td>
                        <td><?= $cliente[$i]['CliStatus'] ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#cliente" role="button" data-toggle="modal" onclick="AlterarClienteModal('<?= $cliente[$i]['CliID'] ?>','<?= $cliente[$i]['CliNome'] ?>','<?= $cliente[$i]['CliDtNasc'] ?>','<?= $cliente[$i]['CliCpfCnpj'] ?>','<?= $cliente[$i]['CliTipo'] ?>','<?= $cliente[$i]['CliTelefone'] ?>','<?= $cliente[$i]['CliEmail'] ?>','<?= $cliente[$i]['CliCep'] ?>','<?= $cliente[$i]['CliEndereco'] ?>','<?= $cliente[$i]['CliBairro'] ?>','<?= $cliente[$i]['CliNumero'] ?>','<?= $cliente[$i]['CliCidade'] ?>','<?= $cliente[$i]['CliEstado'] ?>','<?= $cliente[$i]['CliDescricao'] ?>')">
                                    <i title="Alterar cliente" class="ace-icon fa fa-pencil bigger-130"></i>
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
                                            <a href="#cliente" onclick="" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
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
<?php } else {
    $cliente = $ctrl->SelecioneClienteCTRL();
} ?>