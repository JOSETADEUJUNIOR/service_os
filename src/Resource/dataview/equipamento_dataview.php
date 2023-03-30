<?php
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;
Util::VerificarLogado();
use Src\Controller\EquipamentoController;
use Src\VO\EquipamentoVO;
use Src\Controller\TipoEquipamentoController;
use Src\Controller\ModeloController;


$id = '';
$equipamento = [];
$ctrlTipo = new TipoEquipamentoController();
$ctrlModelo = new ModeloController();

$tipos = $ctrlTipo->RetornarTiposEquipamentosController();
$modelo = $ctrlModelo->RetornaModeloController();
$ctrl = new EquipamentoController;

if (isset($_POST['btn_cadastrar'])) {
    $vo = new EquipamentoVO;
    $vo->setId($_POST['idEquip']);
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setTipoEquipID($_POST['tipoequip']);
    $vo->setModeloEquipID($_POST['modelo']);
    $ret = $ctrl->CadastrarEquipamentoController($vo);

    if (isset($_POST['btn_cadastrar']) && $_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        echo -1;
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new EquipamentoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirEquipamentoController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    }
}else if (isset($_POST['btn_filtro']) && $_POST['btn_filtro'] == 'ajx') {
    $BuscarTipo = $_POST['BuscarTipo'];
    $filtro_palavra = $_POST['filtro_palavra'];
    $equipamento = $ctrl->ConsultarEquipamentoController($BuscarTipo, $filtro_palavra); 
    if (count($equipamento) > 0) { ?>
        <div class="table-resposive" id="tabela_result_equipamento">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Tipo</th>
                        <th class="sorting_desc">Modelo</th>
                        <th class="sorting_desc">Identificação</th>
                        <th class="sorting_desc">Descrição</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($equipamento); $i++) { ?>
                        <tr>
                            <td>
                                <?= $equipamento[$i]['nomeTipo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['nomeModelo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['identificacao'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['descricao'] ?>
                            </td>
                            <td class="hidden-480">
                                <span class="label label-sm label-warning">Ativo</span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#equipamento" role="button" data-toggle="modal" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ??'' ?>', '<?= $equipamento[$i]['idTipo'] ??'' ?>', '<?= $equipamento[$i]['idModelo'] ??'' ?>', '<?= $equipamento[$i]['identificacao'] ??'' ?>', '<?= $equipamento[$i]['descricao'] ??'' ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ??'' ?>', '<?= $equipamento[$i]['descricao'] ??'' ?>')">
                                        <i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#setor" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ??'' ?>', '<?= $equipamento[$i]['idTipo'] ??'' ?>', '<?= $equipamento[$i]['idModelo'] ??'' ?>', '<?= $equipamento[$i]['identificacao'] ??'' ?>', '<?= $equipamento[$i]['descricao'] ??'' ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ??'' ?>', '<?= $equipamento[$i]['descricao'] ??'' ?>')">
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
    }

}
else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

    $nome_filtro = $_POST['FiltrarNome'];

    $equipamento = $ctrl->FiltrarEquipamentoController($nome_filtro);
    

    if (count($equipamento) > 0) { ?>
        <div  class="table-resposive" id="tabela_result_equipamento">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Tipo</th>
                        <th class="sorting_desc">Modelo</th>
                        <th class="sorting_desc">Identificação</th>
                        <th class="sorting_desc">Descrição</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($equipamento); $i++) { ?>
                        <tr>
                            <td>
                                <?= $equipamento[$i]['nomeTipo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['nomeModelo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['identificacao'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['descricao'] ?>
                            </td>
                            <td class="hidden-480">
                                <span class="label label-sm label-warning">Ativo</span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#equipamento" role="button" data-toggle="modal" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
                                        <i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#setor" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
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
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {

    $equipamento = $ctrl->ConsultarEquipamentoAllController();

    if (count($equipamento) > 0) { ?>

        <div class="table-resposive" id="tabela_result_equipamento">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Tipo</th>
                        <th class="sorting_desc">Modelo</th>
                        <th class="sorting_desc">Identificação</th>
                        <th class="sorting_desc">Descrição</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($equipamento); $i++) { ?>
                        <tr>
                            <td>
                                <?= $equipamento[$i]['nomeTipo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['nomeModelo'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['identificacao'] ?>
                            </td>
                            <td>
                                <?= $equipamento[$i]['descricao'] ?>
                            </td>
                            <td class="hidden-480">
                                <span class="label label-sm label-warning">Ativo</span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#equipamento" role="button" data-toggle="modal" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
                                        <i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#setor" onclick="AlterarEquipamentoModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['idTipo'] ?>', '<?= $equipamento[$i]['idModelo'] ?>', '<?= $equipamento[$i]['identificacao'] ?>', '<?= $equipamento[$i]['descricao'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamento[$i]['idEquip'] ?>', '<?= $equipamento[$i]['descricao'] ?>')">
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
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else {
    $equipamento = $ctrl->ConsultarEquipamentoAllController();
} ?>