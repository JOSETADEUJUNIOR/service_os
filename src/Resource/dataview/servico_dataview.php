<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\Controller\ServicoController;
use Src\VO\ServicoVO;

$ctrlServico = new ServicoController();

if (isset($_POST['btn_cadastrar'])) {
    if ($_POST['ServID'] != '') {

        $vo = new ServicoVO;
        $vo->setServID($_POST['ServID']);
        $vo->setServNome($_POST['ServNome']);
        $vo->setServValor($_POST['ServValor']);
        $vo->setServDescricao($_POST['ServDescricao']);
        $ret = $ctrlServico->AlterarServicoController($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    } else {
        $vo = new ServicoVO;
        $vo->setServNome($_POST['ServNome']);
        $vo->setServValor($_POST['ServValor']);
        $vo->setServDescricao($_POST['ServDescricao']);
        $ret = $ctrlServico->CadastrarServico($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new ServicoVO;
    $vo->setServID($_POST['ExcluirID']);
    $ret = $ctrlServico->ExcluirServicoController($vo);
    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $servico = $ctrlServico->RetornarServicoController();
    }
    //} else if (isset($_GET['btn_pdf'])) {
    //    $dados = $ctrl->RetornarServicoController();

    //    $relatorio = $pdfController->gerarPdf('relatorio_servico.php', $dados);

}/*  else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

    $nome_filtro = $_POST['FiltrarNome'];

    $servico = $ctrlServico->FiltrarServicoController($nome_filtro);
} */
if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $servico = $ctrlServico->RetornarServicoController(); ?>
    <div id="tabela_result_servico">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome do Serviço</th>
                    <th class="hidden-480">Valor</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($servico); $i++) { ?>
                    <tr>
                        <td>
                            <?= $servico[$i]['ServNome'] ?>
                        </td>
                        <td class="hidden-480">
                            <?= $servico[$i]['ServValor'] ?>
                        </td>
                        <td class="hidden-480">
                            <?= $servico[$i]['ServDescricao'] ?>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#servico" role="button" data-toggle="modal" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>','<?= $servico[$i]['ServValor'] ?>','<?= $servico[$i]['ServDescricao'] ?>')">
                                    <i title="Alterar Tipo Equipamento" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')">
                                    <i title="Excluir Tipo Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#servico" onclick="AlterarServicoModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $servico[$i]['ServID'] ?>', '<?= $servico[$i]['ServNome'] ?>')">
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

    $servico = $ctrlServico->RetornarServicoController();
} ?>