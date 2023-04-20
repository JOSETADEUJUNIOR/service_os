<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\Controller\ServicoController;
use Src\VO\ServicoVO;

$ctrlServico = new ServicoController();

if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'OK') {
    $servico = $ctrlServico->RetornarServicoController(); ?>
    <div id="tabela_result_modelo">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome do modelo</th>
                    <th class="hidden-480">Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($modelo); $i++) { ?>
                    <tr>
                        <td>
                            <?= $modelo[$i]['nome'] ?>
                        </td>
                        <td class="hidden-480">
                            <span class="label label-sm label-warning">Ativo</span>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#modelo" role="button" data-toggle="modal" onclick="AlterarModeloModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')">
                                    <i title="Alterar Tipo Equipamento" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')">
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
                                            <a href="#modelo" onclick="AlterarModeloModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $modelo[$i]['id'] ?>', '<?= $modelo[$i]['nome'] ?>')">
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