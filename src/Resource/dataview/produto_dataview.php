<?php
include_once '_include_autoload.php';

use Src\_public\Util;

Util::VerificarLogado();

use Src\Controller\ProdutoController;
use Src\VO\ProdutoVO;
use Src\Controller\PdfController;

$ctrl = new ProdutoController();
$pdfController = new PdfController;

if (isset($_POST['btn_cadastrar'])) {
    if ($_POST['ProdID'] == '') {

        $vo = new ProdutoVO;
        $vo->setProdDescricao($_POST['ProdDescricao']);
        $vo->setProdCodBarra($_POST['ProdCodBarra']);
        $vo->setProdValorCompra($_POST['ProdValorCompra']);
        $vo->setProdValorVenda($_POST['ProdValorVenda']);
        $vo->setProdEstoqueMin($_POST['ProdEstoqueMin']);
        $vo->setProdEstoque($_POST['ProdEstoque']);
        $ret = $ctrl->CadastrarProdutoCTRL($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    } else {
        $vo = new ProdutoVO;
        $vo->setProdID($_POST['ProdID']);
        $vo->setProdDescricao($_POST['ProdDescricao']);
        $vo->setProdCodBarra($_POST['ProdCodBarra']);
        $vo->setProdValorCompra($_POST['ProdValorCompra']);
        $vo->setProdValorVenda($_POST['ProdValorVenda']);
        $vo->setProdEstoqueMin($_POST['ProdEstoqueMin']);
        $vo->setProdEstoque($_POST['ProdEstoque']);
        $vo->setProdEmpID($_POST['ProdEmpID']);
        $ret = $ctrl->AlterarProdutoCTRL($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    }
} else if (isset($_GET['btn_pdf'])) {
    //$dados = $ctrl->RetornarSetorController();
  
    //$relatorio = $pdfController->gerarPdf('relatorio_setor.php', $dados);
  
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

   // $nome_filtro = $_POST['FiltrarNome'];

    //$setor = $ctrl->FiltrarSetorController($nome_filtro);

    if (count($setor) > 0) { ?>

        <div id="table_result_Setor">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="sorting_desc">Nome Setor</th>
                        <th class="hidden-480">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //for ($i = 0; $i < count($setor); $i++) { ?>
                        <tr>
                            <td>
                                <?php //$setor[$i]['nome_setor'] ?>
                            </td>
                            <td class="hidden-480">
                                <span class="label label-sm label-warning">Ativo</span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#setor" role="button" data-toggle="modal" onclick="AlterarSetorModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
                                        <i title="Excluir Setor" class="ace-icon fa fa-trash-o bigger-130"></i>
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
                                                <a href="#setor" onclick="AlterarSetorModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <a href="#setor" role="button" class="btn btn-info btn-xs" data-toggle="modal">Adicionar Setor</a>
                                            <li>
                                                <a href="#modalExcluir" role="button" data-toggle="modal" class="tooltip-error" title="Delete" onclick="ExcluirModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
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
                    <?php // } ?>

                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == "ajx") {

    $produto = $ctrl->SelecioneProdutoCTRL(); ?>

    <div id="table_result_produto">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                <th class="sorting_desc">Nome/Descrição</th>
                <th class="sorting_desc">Valor Compra</th>
                <th class="sorting_desc">Valor Venda</th>
                <th class="sorting_desc">Estoque Total</th>
                <th class="sorting_desc">Estoque Mínimo</th>
                <th class="hidden-480">Status</th>
                <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($produto); $i++) { ?>
                    <tr>
                        <td><?= $produto[$i]['ProdDescricao'] ?></td>
                        <td><?= $produto[$i]['ProdValorCompra'] ?></td>
                        <td><?= $produto[$i]['ProdValorVenda'] ?></td>
                        <td><?= $produto[$i]['ProdEstoque'] ?></td>
                        <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                        <td><?= $produto[$i]['ProdStatus'] ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarSetorModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
                                    <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="#modalExcluir" data-toggle="modal" onclick="ExcluirModal('<?= $setor[$i]['id'] ?>', '<?= $setor[$i]['nome_setor'] ?>')">
                                    <i title="Excluir Setor" class="ace-icon fa fa-trash-o bigger-130"></i>
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
                                            <a href="#produto" onclick="" data-toggle="modal" class="tooltip-success" data-rel="tooltip" title="Edit">
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
    $produto = $ctrl->SelecioneProdutoCTRL();
} ?>