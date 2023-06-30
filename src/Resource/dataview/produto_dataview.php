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
        $OldImg = $_POST['OldImagem'];
        $OldPath = $_POST['OldPath'];
        if (isset($_FILES) && $_FILES != null) {
            $arquivos = $_FILES['ProdImagem'];
            if ($arquivos['name'] != "") {
                if ($arquivos['size'] > 2097152) { # 2097152 = 2MB
                    $ret = 10;
                } else {
                    $pasta = CAMINHO_PARA_SALVAR_IMG_PRODUTO;
                    @mkdir($pasta);
                    $nomeDoArquivo = $arquivos['name'];
                    $novoNomeDoArquivo = uniqid();
                    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != '') {
                        $ret = 11;
                    } else {
                        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
                        $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
                        $vo->setProdImagem($nomeDoArquivo);
                        $vo->setProdImagemPath($path);
                        $ret = $ctrl->CadastrarProdutoCTRL($vo);
                    }
                }
            }
        } else {
            $vo->setProdImagem($OldImg != "" ? $OldImg : "");
            $vo->setProdImagemPath($OldPath != "" ? $OldPath : "");
            $ret = $ctrl->CadastrarProdutoCTRL($vo);
        }
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
        $OldImg = $_POST['OldImagem'];
        $OldPath = $_POST['OldPath'];
        if (isset($_FILES) && $_FILES != null) {
            $arquivos = $_FILES['ProdImagem'];
            if ($arquivos['name'] != "") {
                if ($arquivos['size'] > 2097152) { # 2097152 = 2MB
                    $ret = 10;
                } else {
                    /* $pasta = CAMINHO_PARA_SALVAR_IMG_PRODUTO; */
                    $pasta = "arquivos/";
                    @mkdir($pasta);
                    $nomeDoArquivo = $arquivos['name'];
                    $novoNomeDoArquivo = uniqid();
                    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != '') {
                        $ret = 11;
                    } else {
                        $path = $pasta . $novoNomeDoArquivo . '.' . $extensao;
                        $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
                        $vo->setProdImagem($nomeDoArquivo);
                        $vo->setProdImagemPath($path);
                        if (file_exists($OldPath)){
                            unlink($OldPath);
                        }
                        $ret = $ctrl->AlterarProdutoCTRL($vo);
                    }
                }
            }
        } else {
           $vo->setProdImagem($OldImg != "" ? $OldImg : "");
           $vo->setProdImagemPath($OldPath != "" ? $OldPath : "");
            $ret = $ctrl->AlterarProdutoCTRL($vo);
        }
        if ($_POST['btn_cadastrar'] == 'ajx') {
            echo $ret;
        }
    }
} else if (isset($_GET['btn_pdf']) || isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    header("location: relatorio_produto_dataview.php?filtro=$nome_filtro");
    //$dados = $ctrl->RetornarSetorController();

    //$relatorio = $pdfController->gerarPdf('relatorio_setor.php', $dados);

} else if (isset($_POST['mudar_status']) && $_POST['mudar_status'] == 'ajx') {

    $vo =  new ProdutoVO;

    $vo->setProdID($_POST['ProdID']);
    $vo->setProdStatus($_POST['status_produto']);
    echo $ctrl->AlterarStatusProdutoCTRL($vo);

} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarProduto'])) {

    $nome_filtro = $_POST['FiltrarProduto'];

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
                        <th class="sorting_desc">Img Produto</th>
                        <th class="sorting_desc">Ativo/Inativo</th>
                        <th class="sorting_desc">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($produto); $i++) { ?>
                        <tr>
                            <td><?= $produto[$i]['ProdDescricao'] ?></td>
                            <td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorCompra']) ?></td>
                            <td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorVenda']) ?></td>
                            <td><?= $produto[$i]['ProdEstoque'] ?></td>
                            <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                            <?php if ($produto[$i]['ProdImagemPath'] != "" || $produto[$i]['ProdImagemPath'] != null) { ?>
                                <td>
                                <center><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" width="50px" height="50px" class="produto-imagem brand-image img-circle elevation-3" data-toggle="modal" data-target="#modal-imagem" data-imagem="<?= $produto[$i]['ProdImagemPath'] ?>"></center>
                                </td>
                            <?php } else { ?><td></td><?php } ?>
                            <td>
                                <div class="col-xs-3">
                                    <label>
                                        <input name="switch-field-1" value="0" id="status_produto" onclick="MudarStatusProduto('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdStatus'] ?>')" title="Ativar/Inativar Produto" class="ace ace-switch ace-switch-6" <?= $produto[$i]['ProdStatus'] == STATUS_ATIVO ? "checked='checked'" : ''  ?> type="checkbox" />
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-3">
                                    <a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdImagem'] ?>','<?= $produto[$i]['ProdImagemPath'] ?>')">
                                        <i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
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
                    <th class="sorting_desc">Img Produto</th>
                    <th class="sorting_desc">Ativo/Inativo</th>
                    <th class="sorting_desc">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($produto); $i++) { ?>
                    <tr>
                        <td><?= $produto[$i]['ProdDescricao'] ?></td>
                        <td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorCompra']) ?></td>
                        <td><?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorVenda']) ?></td>
                        <td><?= $produto[$i]['ProdEstoque'] ?></td>
                        <td><?= $produto[$i]['ProdEstoqueMin'] ?></td>
                        <?php if ($produto[$i]['ProdImagemPath'] != "" || $produto[$i]['ProdImagemPath'] != null) { ?>
                            <td>
                                <center><img src="../../Resource/dataview/<?= $produto[$i]['ProdImagemPath'] ?>" alt="<?= $produto[$i]['ProdImagemPath'] ?>" width="50px" height="50px" class="produto-imagem brand-image img-circle elevation-3" data-toggle="modal" data-target="#modal-imagem" data-imagem="<?= $produto[$i]['ProdImagemPath'] ?>"></center>
                            </td>
                        <?php } else { ?><td></td><?php } ?>
                        <td>
                            <div class="col-xs-3">
                                <label>
                                    <input name="switch-field-1" value="0" id="status_produto" onclick="MudarStatusProduto('<?= $produto[$i]['ProdID'] ?>', '<?= $produto[$i]['ProdStatus'] ?>')" title="Ativar/Inativar Produto" class="ace ace-switch ace-switch-6" <?= $produto[$i]['ProdStatus'] == STATUS_ATIVO ? "checked='checked'" : ''  ?> type="checkbox" />
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="col-xs-3">
                                <a class="green" href="#produto" role="button" data-toggle="modal" onclick="AlterarProdutoModal('<?= $produto[$i]['ProdID'] ?>','<?= $produto[$i]['ProdDescricao'] ?>','<?= $produto[$i]['ProdCodBarra'] ?>','<?= $produto[$i]['ProdValorCompra'] ?>','<?= $produto[$i]['ProdValorVenda'] ?>','<?= $produto[$i]['ProdEstoque'] ?>','<?= $produto[$i]['ProdEstoqueMin'] ?>','<?= $produto[$i]['ProdImagem'] ?>','<?= $produto[$i]['ProdImagemPath'] ?>')">
                                    <i title="Alterar Produto" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
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