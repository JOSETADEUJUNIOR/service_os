<?php

include_once '_include_autoload.php';

use Src\_public\Util;
Util::VerificarLogado();
use Src\VO\TipoEquipamentoVO;
use Src\Controller\TipoEquipamentoController;

$ctrl = new TipoEquipamentoController();

if (isset($_POST['btn_cadastrar'])){
    if ($_POST['AlteraID'] == '') {
    $vo = new TipoEquipamentoVO;
    $vo->setNome($_POST['nome']);
    $ret = $ctrl->CadastrarTipoEquipamento($vo);
    if ($_POST['btn_cadastrar']== 'ajx') {
        echo $ret;
    }
    } else if($_POST['AlteraID'] != ''){
        $vo = new TipoEquipamentoVO;
        $vo->setID($_POST['AlteraID']);
        $vo->setNome($_POST['nome']);
        $ret = $ctrl->AlterarTipoEquipamentoController($vo);
        if ($_POST['btn_cadastrar']== 'ajx') {
            echo $ret;
        } 
    }else {
        $setor = $ctrl->RetornarSetorController();
    }
}else if (isset($_POST['btnExcluir'])){
    $vo = new TipoEquipamentoVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirTipoEquipamentoController($vo);
    if($_POST['btnExcluir'] == 'ajx'){
        echo $ret;
    }else {
        $tipos = $ctrl->RetornarTiposEquipamentosController();
    }

}else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])){
    $nome_filtro = $_POST['FiltrarNome'];

    $tipos = $ctrl->FiltrarTiposEquipamentosController($nome_filtro); 
    
    if (count($tipos) > 0) { ?>
    <div id="tabela_result_tipo">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="sorting_desc">Nome Tipo equipamento</th>
                    <th class="hidden-480">Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                    <tr>
                        <td>
                            <?= $tipos[$i]['nome'] ?>
                        </td>
                        <td class="hidden-480">
                            <span class="label label-sm label-warning">Ativo</span>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#tipoequipamento" role="button" data-toggle="modal" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
                                    <i title="Alterar Tipo Equipamento" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
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
                                            <a href="#tipoequipamento" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                        <li>
                                            <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
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
} else{


echo '<h4><center>Nenhum registro encontrado!</center><h4>';

} 
}
else if (isset($_POST['btnConsultar']) && $_POST['btnConsultar']){
    $tipos = $ctrl->RetornarTiposEquipamentosController(); ?>

<div id="tabela_result_tipo">
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="sorting_desc">Nome Tipo equipamento</th>
                <th class="hidden-480">Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                <tr>
                    <td>
                        <?= $tipos[$i]['nome'] ?>
                    </td>
                    <td class="hidden-480">
                        <span class="label label-sm label-warning">Ativo</span>
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a class="green" href="#tipoequipamento" role="button" data-toggle="modal" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
                                <i title="Alterar Tipo Equipamento" class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                            <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
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
                                        <a href="#tipoequipamento" onclick="AlterarTipoEquipamentoModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                    <li>
                                        <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?=$tipos[$i]['id']?>','<?=$tipos[$i]['nome']?>')">
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




<?php } else{
    $tipos = $ctrl->RetornarTiposEquipamentosController(); } ?>


