<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\VO\AlocarVO;
use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoController;
use Src\Controller\SetorController;

$ctrl = new EquipamentoController();
$situacao = '';
if (isset($_POST['btn_cadastrar'])) {
    $vo = new AlocarVO;
    #$vo->setSituacao($_POST['situacao']);
    #$vo->setDataAlocacao($_POST['data_alocacao']);
    #$vo->setDataRemocao($_POST['data_remocao']);
    $vo->setEquipamentoID($_POST['equipamento']);
    $vo->setSetorID($_POST['setor']);

    $ret = $ctrl->AlocarEquipamentoController($vo);
    if (isset($_POST['btn_cadastrar']) && $_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        echo -4;
    }
    $eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController();
} else if (isset($_POST['btnExcluir'])) {
    $vo = new AlocarVO;
    $vo->setIdAlocar($_POST['ExcluirID']);
    $ret = $ctrl->RemoverAlocamentoController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    }
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

    $situacao = $_POST['FiltrarNome'];

    $equipamentosAlocados = (new EquipamentoController)->SelecionarEquipamentosAlocadosController($situacao);
    if (count($equipamentosAlocados) > 0) { ?>
        <div id="tabela_result_alocado">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Tipo</th>
                        <th class="sorting_desc">Modelo</th>
                        <th class="sorting_desc">Identificação</th>
                        <th class="sorting_desc">Descrição</th>
                        <th class="sorting_desc">Setor</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($equipamentosAlocados); $i++) { ?>
                        <tr>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_tipo'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_modelo'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['identificacao'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['descricao'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_setor'] ?>
                            </td>
                            <td class="hidden-480">
                                <?php if ($equipamentosAlocados[$i]['situacao'] == 1) { ?>
                                    <span class="label label-sm label-success">ALOCADO</span>
                                <?php } else if ($equipamentosAlocados[$i]['situacao'] == 2) { ?>
                                    <span class="label label-sm label-warning">EM MANUTENÇÃO</span>
                                <?php } else if ($equipamentosAlocados[$i]['situacao'] == 3) { ?>
                                    <span class="label label-sm label-danger">REMOVIDO</span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamentosAlocados[$i]['id_alocar'] ?>', '<?= $equipamentosAlocados[$i]['descricao'] ?>')">
                                        <i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamentosAlocados[$i]['id_alocar'] ?>', '<?= $equipamentosAlocados[$i]['descricao'] ?>')">
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

    $equipamentosAlocados = (new EquipamentoController)->SelecionarEquipamentosAlocadosController($situacao);

    if (count($equipamentosAlocados) > 0) { ?>

        <div id="tabela_result_alocado">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Tipo</th>
                        <th class="sorting_desc">Modelo</th>
                        <th class="sorting_desc">Identificação</th>
                        <th class="sorting_desc">Descrição</th>
                        <th class="sorting_desc">Setor</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($equipamentosAlocados); $i++) { ?>
                        <tr>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_tipo'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_modelo'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['identificacao'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['descricao'] ?>
                            </td>
                            <td>
                                <?= $equipamentosAlocados[$i]['nome_setor'] ?>
                            </td>
                            <td class="hidden-480">
                                <?php if ($equipamentosAlocados[$i]['situacao'] == 1) { ?>
                                    <span class="label label-sm label-success">ALOCADO</span>
                                <?php } else if ($equipamentosAlocados[$i]['situacao'] == 2) { ?>
                                    <span class="label label-sm label-warning">EM MANUTENÇÃO</span>
                                <?php } else if ($equipamentosAlocados[$i]['situacao'] == 3) { ?>
                                    <span class="label label-sm label-danger">REMOVIDO</span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $equipamentosAlocados[$i]['id_alocar'] ?>', '<?= $equipamentosAlocados[$i]['descricao'] ?>')">
                                        <i title="Excluir Equipamento" class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $equipamentosAlocados[$i]['id_alocar'] ?>', '<?= $equipamentosAlocados[$i]['descricao'] ?>')">
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
} else if (isset($_POST['btn_consultar_equipamento']) && $_POST['btn_consultar_equipamento'] == 'ajx') {

    $eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController(); ?>

    <input type="hidden" name="idEquip" id="idEquip">
    <div class="form-group">
        <label>Equipamento</label>
        <select class="form-control obg" id="equipamento" name="equipamento">
            <option value="">Selecione</option>
            <?php foreach ($eqs as $eq) { ?>
                <option value="<?= $eq['id'] ?>"><?= $eq['nome_modelo'] ?></option>
            <?php } ?>

        </select>
    </div>



<?php } else {
    $equipamentosAlocados = (new EquipamentoController)->SelecionarEquipamentosAlocadosController($situacao);
    $setores = (new SetorController)->RetornarSetorController();
    $eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController();
}

$setores = (new SetorController)->RetornarSetorController();
$eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController();
$equipamentosAlocados = (new EquipamentoController)->SelecionarEquipamentosAlocadosController($situacao);
