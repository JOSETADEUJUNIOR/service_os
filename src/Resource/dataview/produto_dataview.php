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
        $ret = $ctrl->AlterarProdutoCTRL($vo);
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    }
} else if (isset($_GET['btn_pdf'])) {
    //$dados = $ctrl->RetornarSetorController();

    //$relatorio = $pdfController->gerarPdf('relatorio_setor.php', $dados);

} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {

    $nome_filtro = $_POST['FiltrarNome'];

    $produto = $ctrl->FiltrarProdutoCTRL($nome_filtro);

    if (count($produto) > 0) { ?>

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
                                    <a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>')">
                                        <i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
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
                                <a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>')">
                                    <i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
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