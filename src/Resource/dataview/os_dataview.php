<?php
include_once '_include_autoload.php';

use Src\Controller\OsController;
use Src\Controller\ClienteController;
use Src\Controller\ProdutoController;
use Src\Controller\ServicoController;
use Src\Controller\UsuarioController;
use Src\VO\OsVO;
use Src\_public\Util;
use Src\Controller\ChamadoController;
use Src\VO\ServicoOSVO;
use Src\VO\ProdutoOSVO;
use Src\VO\AnxOSVO;

Util::VerificarLogado();

$ordemOS = 0;
$OsID = 0;
$ctrlEmp = new UsuarioController();
$dadosEmp = $ctrlEmp->RetornarDadosCadastraisController();
$cliCtrl = new ClienteController();
$ctrlProd = new ProdutoController();
$ctrlServ = new ServicoController();
$servicos = $ctrlServ->RetornarServicoController();
$produtos = $ctrlProd->SelecioneProdutoCTRL();
$clientes = $cliCtrl->SelecioneClienteCTRL();
$ctrl = new OsController();
$ctrl_os = new ChamadoController;
$vo = new OsVO;
$ProdOrdem = $ctrl->RetornaProdOrdem($vo);

$dadosOS = $ctrl->RetornarDadosOsController();

if (isset($_POST['FiltrarOSGeral']) && $_POST['FiltrarOSGeral'] == 'ajx') {
    $dados = $ctrl_os->FiltrarChamadoGeralAdminController($tipo=4);

    echo $dados;
}





if (isset($_POST['btn_detalhar_os'])) {
    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);

    if (count($ProdOrdem) > 0) { ?>

        <div class="table-header">
            Produtos e serviços da ordem de serviço

        </div>


        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Produto/Serviço</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Valor Total</th>

                </tr>
            </thead>
            <tbody>
                <?php $subTotal = 0;
                for ($i = 0; $i < count($ProdOrdem); $i++) {
                    if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                        $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                        <tr>
                            <td>
                                <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"><i style="color:red" class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><?= $ProdOrdem[$i]['ProdDescricao'] ?>

                                <input type="hidden" id="ExcluirID" name="ExcluirID">
                                <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
                                <input type="hidden" id="ExcluirProdID" name="ExcluirProdID">
                                <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">
                            </td>
                            <td><span class="btn btn-block btn-outline-primary btn-xs"> Produto</span></td>
                            <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                            <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                            <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                        </tr>
                <?php }
                } ?>

            </tbody>
            </hr>
            <tbody>
                <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                    if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                        $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                        <tr>
                            <td>
                                <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ"><i style="color:red" class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                            <td><span class="btn btn-block btn-outline-secondary btn-xs"> Serviço</span></td>
                            <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                            <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                            <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>

            </tbody>
            <tbody>
                <tr style="background-color: #FFA500;">
                    <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                    <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                    <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($ordemOS[0]['OsValorTotal']) ?></strong></td>
                </tr>
            </tbody>
        </table>



    <?php }
}
if (isset($_GET['OsMes'])) {
    $os = $ctrl->RetornarOsMesController();
} else if (isset($_GET['OsID']) &&  is_numeric($_GET['OsID'])) {
    $OsID = $_GET['OsID'];
    $vo = new OsVO;
    $vo->setID($_GET['OsID']);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $AnxOs = $ctrl->RetornaAnxOS($vo);
} else if (isset($_GET['Oscliente']) &&  is_numeric($_GET['Oscliente'])) {
    $CliID = $_GET['Oscliente'];
    $tipo = $_GET['tipo'];

    $os = $ctrl->RetornarOsClienteController($CliID, $tipo);
} else if (isset($_POST['btn_cadastrar'])) {
    $vo = new OsVO;
    $vo->setDtInicial($_POST['dtInicial']);
    //$vo->setOsDtFinal($_POST['dtFinal']);
    $vo->setOsDescProdServ($_POST['descProd']);
    //$vo->setOsGarantia($_POST['garantia']);
    $vo->setOsDefeito($_POST['defeito']);
    $vo->setOsObs($_POST['obs']);
    $vo->setOsCliID($_POST['Oscliente']);
    //$vo->setOsTecID($_POST['tecnico']);
    $vo->setOsStatus($_POST['status']);
    $vo->setOsLaudoTec($_POST['laudo']);
    $vo->setOsNumeroNF($_POST['NumeroNF']);
    if ($_POST['OsID'] > 0) {
        $vo->setID($_POST['OsID']);
        $ret = $ctrl->AlterarOsController($vo);
    } else {
        $ret = $ctrl->CadastrarOsController($vo);
    }

    if ($_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btn_addServ'])) {
    $vo = new ServicoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setServQtd($_POST['qtdServ']);
    $vo->setOsServID($_POST['servico']);

    $ret = $ctrl->InserirServOrdemController($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->SelecioneProdutoCTRL();

    if ($_POST['btn_addServ'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btn_addItem'])) {
    $vo = new ProdutoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setProdQtd($_POST['qtdProd']);
    $vo->setOsProdID($_POST['produto']);

    $ret = $ctrl->InserirItemOrdemController($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->SelecioneProdutoCTRL();

    if ($_POST['btn_addItem'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnAddAnx'])) {
    $vo = new AnxOSVO;
    $vo->setAnxOsID($_POST['anxOsID']);
    $vo->setAnxNome($_POST['anxNome']);
    $arquivos = $_FILES['arquivos'];

    if ($arquivos['size'] > 2097152)
        die("Arquivo muito grande !! Max: 2MB");

    $pasta = "arquivos/";
    @mkdir($pasta);
    $nomeDoArquivo = $arquivos['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "pdf" && $extensao != "jpeg" && $extensao != '')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivos["tmp_name"], $path);
    $vo->setAnxUrl($nomeDoArquivo);
    $vo->setAnxPath($path);
    $ret = $ctrl->InserirAnxOrdemController($vo);

    if ($_POST['btnAddAnx'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluir'])) {
    $vo = new OSVO;
    $vo->setID($_POST['ExcluirID']);
    $ret = $ctrl->ExcluirOSController($vo);

    if ($_POST['btnExcluir'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluirAnx'])) {
    $vo = new AnxOSVO;
    $vo->setAnxID($_POST['AnxID']);
    $ret = $ctrl->ExcluirAnxOSController($vo);
    if ($_POST['btnExcluirAnx'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluirItemOs'])) {
    $vo = new ProdutoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setProdQtd($_POST['qtd']);
    $vo->setProdOsID($_POST['ExcluirID']);
    $vo->setOsProdID($_POST['produto']);
    $ret = $ctrl->ExcluirItemOSController($vo);

    if ($_POST['btnExcluirItemOs'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnExcluirServ'])) {
    $vo = new ServicoOSVO;
    $vo->setOsID($_POST['OsID']);
    $vo->setServQtd($_POST['qtd']);
    $vo->setID($_POST['ExcluirID']);
    $vo->setOsServID($_POST['servico']);
    $ret = $ctrl->ExcluirServOSController($vo);

    if ($_POST['btnExcluirServ'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnFaturar'])) {
    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $vo->setOsCliID($_POST['CliID']);
    $vo->setOsValorTotal($_POST['OsValor']);
    $ret = $ctrl->FaturarOsController($vo);

    if ($_POST['btnFaturar'] == 'ajx') {
        echo $ret;
    } else {
        $os = $ctrl->RetornarOsController();
    }
} else if (isset($_POST['btnFiltrarStatus']) && isset($_POST['FiltrarStatus'])) {
    $status_filtro = $_POST['FiltrarStatus'];
    $filtroDe = $_POST['filtroDe'];
    $filtroAte = $_POST['filtroAte'];
    $os = $ctrl->FiltrarStatusController($status_filtro, $filtroDe, $filtroAte);

    if (count($os) > 0) { ?>
        <div id="tabela_result_os">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NF</th>
                        <th>Dt Inicio</th>
                        <th>Dt Entrega</th>
                        <th>Tecnico</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($os); $i++) { ?>
                        <tr>
                            <td>
                                <?= $os[$i]['OsNumeroNF'] ?>
                            </td>
                            <td>
                                <?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsDtFinal'] ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsTecID'] ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsValorTotal'] ?>
                            </td>
                            <td class="hidden-480">
                                <?php if ($os[$i]['OsStatus'] == ORDEM_EM_ABERTO) { ?>
                                    <span class="label label-sm label-success">Em aberto</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_EM_ANDAMENTO) { ?>
                                    <span class="label label-sm label-warning">Em andamento</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_CANCELADA) { ?>
                                    <span class="label label-sm label-danger">Cancelada</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_CONCLUIDA) { ?>
                                    <span class="label label-sm label-danger">Concluída</span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#ordem" role="button" data-toggle="modal" onclick="AlterarOs('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['OsNumeroNF'] ?>', '<?= $os[$i]['OsDtInicial'] ?>','<?= $os[$i]['OsStatus'] ?>','<?= $os[$i]['OsCliID'] ?>','<?= $os[$i]['OsDescProdServ'] ?>','<?= $os[$i]['OsDefeito'] ?>','<?= $os[$i]['OsObs'] ?>','<?= $os[$i]['OsLaudoTec'] ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="green" href="#itens-os" role="button" data-toggle="modal" onclick="VerItens('<?= $os[$i]['OsID'] ?>')">
                                        <i title="Itens da os" class="ace-icon fa fa-list bigger-130"></i>
                                    </a>
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
} else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    $os = $ctrl->FiltrarOsController($nome_filtro);

    if (count($os) > 0) { ?>
        <div id="tabela_result_os">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NF</th>
                        <th>Dt Inicio</th>
                        <th>Dt Entrega</th>
                        <th>Tecnico</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($os); $i++) { ?>
                        <tr>
                            <td>
                                <?= $os[$i]['OsNumeroNF'] ?>
                            </td>
                            <td>
                                <?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsDtFinal'] ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsTecID'] ?>
                            </td>
                            <td>
                                <?= $os[$i]['OsValorTotal'] ?>
                            </td>
                            <td class="hidden-480">
                                <?php if ($os[$i]['OsStatus'] == ORDEM_EM_ABERTO) { ?>
                                    <span class="label label-sm label-success">Em aberto</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_EM_ANDAMENTO) { ?>
                                    <span class="label label-sm label-warning">Em andamento</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_CANCELADA) { ?>
                                    <span class="label label-sm label-danger">Cancelada</span>
                                <?php } else if ($os[$i]['OsStatus'] == ORDEM_CONCLUIDA) { ?>
                                    <span class="label label-sm label-danger">Concluída</span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#ordem" role="button" data-toggle="modal" onclick="AlterarOs('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['OsNumeroNF'] ?>', '<?= $os[$i]['OsDtInicial'] ?>','<?= $os[$i]['OsStatus'] ?>','<?= $os[$i]['OsCliID'] ?>','<?= $os[$i]['OsDescProdServ'] ?>','<?= $os[$i]['OsDefeito'] ?>','<?= $os[$i]['OsObs'] ?>','<?= $os[$i]['OsLaudoTec'] ?>')">
                                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <a class="green" href="#itens-os" role="button" data-toggle="modal" onclick="VerItens('<?= $os[$i]['OsID'] ?>')">
                                        <i title="Itens da os" class="ace-icon fa fa-list bigger-130"></i>
                                    </a>
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
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $os = $ctrl->RetornarOsController(); ?>


    <div id="tabela_result_os">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>NF</th>
                    <th>Dt Inicio</th>
                    <th>Dt Entrega</th>
                    <th>Tecnico</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($os); $i++) { ?>
                    <tr>
                        <td>
                            <?= $os[$i]['OsNumeroNF'] ?>
                        </td>
                        <td>
                            <?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?>
                        </td>
                        <td>
                            <?= $os[$i]['OsDtFinal'] ?>
                        </td>
                        <td>
                            <?= $os[$i]['OsTecID'] ?>
                        </td>
                        <td>
                            <?= $os[$i]['OsValorTotal'] ?>
                        </td>
                        <td class="hidden-480">
                            <?php if ($os[$i]['OsStatus'] == ORDEM_EM_ABERTO) { ?>
                                <span class="label label-sm label-success">Em aberto</span>
                            <?php } else if ($os[$i]['OsStatus'] == ORDEM_EM_ANDAMENTO) { ?>
                                <span class="label label-sm label-warning">Em andamento</span>
                            <?php } else if ($os[$i]['OsStatus'] == ORDEM_CANCELADA) { ?>
                                <span class="label label-sm label-danger">Cancelada</span>
                            <?php } else if ($os[$i]['OsStatus'] == ORDEM_CONCLUIDA) { ?>
                                <span class="label label-sm label-danger">Concluída</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="#ordem" role="button" data-toggle="modal" onclick="AlterarOs('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['OsNumeroNF'] ?>', '<?= $os[$i]['OsDtInicial'] ?>','<?= $os[$i]['OsStatus'] ?>','<?= $os[$i]['OsCliID'] ?>','<?= $os[$i]['OsDescProdServ'] ?>','<?= $os[$i]['OsDefeito'] ?>','<?= $os[$i]['OsObs'] ?>','<?= $os[$i]['OsLaudoTec'] ?>')">
                                    <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="green" href="#itens-os" role="button" data-toggle="modal" onclick="VerItens('<?= $os[$i]['OsID'] ?>')">
                                    <i title="Itens da os" class="ace-icon fa fa-list bigger-130"></i>
                                </a>
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

<?php } else if (isset($_POST['btn_consultar_item']) && $_POST['btn_consultar_item'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->SelecioneProdutoCTRL(); ?>

    <div id="DivProduto" style="display:none">
        <div class="col-md-9">
            <form id="form_itens_os">
                <div class="form-group">
                    <label>Produto</label>
                    <select class="chosen-select" data-placeholder="Selecione o produto" id="produto" name="produto" style="width: 100%;">
                        <option value="">Selecione...</option>
                        <?php foreach ($produtos as $produto) { ?>
                            <option value="<?= $produto['ProdID'] ?>"><?= $produto['ProdDescricao'] . '| Preço: ' . $produto['ProdValorVenda'] . '| Estoque: ' . $produto['ProdEstoque'] ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Quantidade</label>
                <input class="form-control" name="qtdProd" id="qtdProd">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label>Add</label>
                <button class="form-control btn btn-success btn-xs" onclick="return InserirProd()" name="btnAddItem"><i class="fa fa-edit"></i></button>
            </div>
        </div>
        </form>
        <?php # aqui abaixo vai ser carregado os serviços 
        ?>
        <div class="col-md-9">
            <form id="form_serv_os">
                <div class="form-group">
                    <label>Serviço</label>
                    <select class="chosen-select" data-placeholder="Selecione o produto" id="servico" name="servico" style="width: 100%;">
                        <option value="">Selecione...</option>
                        <?php foreach ($servicos as $servico) { ?>
                            <option value="<?= $servico['ServID'] ?>"><?= $servico['ServNome'] . '| Preço: ' . $servico['ServValor'] ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Quantidade</label>
                <input class="form-control" name="qtdServ" id="qtdServ">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label>Add</label>
                <button class="form-control btn btn-success btn-xs" onclick="return InserirServ('form_serv_os')" name="btnAddItem"><i class="fa fa-edit"></i></button>
            </div>
        </div>
        </form>




    </div>


    <div class="table-header">
        Produtos e serviços da ordem de serviço
    </div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdOrdem); $i++) {
                if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                    $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"> <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </span></a>






                        </td>
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?>

                            <input type="hidden" id="ExcluirID" name="ExcluirID">
                            <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
                            <input type="hidden" id="ExcluirProdID" name="ExcluirProdID">
                            <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">
                        </td>
                        <td><span class="label label-info arrowed-right arrowed-in">produto</span></td>
                        <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                    $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </span>
                            </a>
                        </td>
                        <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                        <td><span class="label label-warning arrowed arrowed-right">serviço</span></td>
                        <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </tbody>
        <tbody>
            <tr style="background-color: #FFA500;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($ordemOS[0]['OsValorTotal']) ?></strong></td>
            </tr>
        </tbody>
    </table>

<?php } else if (isset($_POST['btn_consultar_os']) && $_POST['btn_consultar_os'] == 'ajx') {


    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $servicos = $ctrlServ->RetornarServicoController();
    $produtos = $ctrlProd->SelecioneProdutoCTRL(); ?>

    <div id="DivProduto" style="display:none">
        <div class="col-md-9">
            <form id="form_itens_os">
                <div class="form-group">
                    <label>Produto</label>
                    <select class="chosen-select" data-placeholder="Selecione o produto" id="produto" name="produto" style="width: 100%;">
                        <option value="">Selecione...</option>
                        <?php foreach ($produtos as $produto) { ?>
                            <option value="<?= $produto['ProdID'] ?>"><?= $produto['ProdDescricao'] . '| Preço: ' . $produto['ProdValorVenda'] . '| Estoque: ' . $produto['ProdEstoque'] ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Quantidade</label>
                <input class="form-control" name="qtdProd" id="qtdProd">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label>Add</label>
                <button class="form-control btn btn-success btn-xs" onclick="return InserirProd()" name="btnAddItem"><i class="fa fa-edit"></i></button>
            </div>
        </div>
        </form>
        <?php # aqui abaixo vai ser carregado os serviços 
        ?>
        <div class="col-md-9">
            <form id="form_serv_os">
                <div class="form-group">
                    <label>Serviço</label>
                    <select class="chosen-select" data-placeholder="Selecione o produto" id="servico" name="servico" style="width: 100%;">
                        <option value="">Selecione...</option>
                        <?php foreach ($servicos as $servico) { ?>
                            <option value="<?= $servico['ServID'] ?>"><?= $servico['ServNome'] . '| Preço: ' . $servico['ServValor'] ?></option>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Quantidade</label>
                <input class="form-control" name="qtdServ" id="qtdServ">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label>Add</label>
                <button class="form-control btn btn-success btn-xs" onclick="return InserirServ('form_serv_os')" name="btnAddItem"><i class="fa fa-edit"></i></button>
            </div>
        </div>
        </form>




    </div>



    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdOrdem); $i++) {
                if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                    $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                    <tr>

                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?>

                            <input type="hidden" id="ExcluirID" name="ExcluirID">
                            <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
                            <input type="hidden" id="ExcluirProdID" name="ExcluirProdID">
                            <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">
                        </td>
                        <td><span class="label label-info arrowed-right arrowed-in">produto</span></td>
                        <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                    $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                    <tr>

                        <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                        <td><span class="label label-warning arrowed arrowed-right">serviço</span></td>
                        <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </tbody>
        <tbody>
            <tr style="background-color: #FFA500;">
                <td colspan="3"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($ordemOS[0]['OsValorTotal']) ?></strong></td>
            </tr>
        </tbody>
    </table>

<?php } else if (isset($_POST['btn_consultar_serv']) && $_POST['btn_consultar_serv'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo); ?>
    <div class="table-header">
        Produtos e serviços da ordem de serviço
    </div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Produto/Serviço</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Valor Total</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($ProdOrdem); $i++) {
                if ($ProdOrdem[$i]['ProdOsProdID'] != '') {
                    $subTotal = $subTotal + $ProdOrdem[$i]['ProdValorVenda'] ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalItem('<?= $ProdOrdem[$i]['OsID'] ?>','<?= $ProdOrdem[$i]['ProdOsID'] ?>','<?= $ProdOrdem[$i]['ProdDescricao'] ?>','<?= $ProdOrdem[$i]['ProdOsProdID'] ?>','<?= $ProdOrdem[$i]['ProdOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirItem"> <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </span></a>






                        </td>
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?>

                            <input type="hidden" id="ExcluirID" name="ExcluirID">
                            <input type="hidden" id="ExcluirOsID" name="ExcluirOsID">
                            <input type="hidden" id="ExcluirProdID" name="ExcluirProdID">
                            <input type="hidden" id="ExcluirQtd" name="ExcluirQtd">
                        </td>
                        <td><span class="label label-info arrowed-right arrowed-in">produto</span></td>
                        <td><?= $ProdOrdem[$i]['ProdOsQtd'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdValorVenda'] ?></td>
                        <td><?= $ProdOrdem[$i]['ProdOsSubTotal'] ?></td>


                    </tr>
            <?php }
            } ?>

        </tbody>
        </hr>
        <tbody>
            <?php for ($i = 0; $i < count($ProdServOrdem); $i++) {
                if ($ProdServOrdem[$i]['ServOsServID'] != '') {
                    $subTotal = $subTotal + $ProdServOrdem[$i]['ServValor']  ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalServ('<?= $ProdServOrdem[$i]['OsID'] ?>','<?= $ProdServOrdem[$i]['ServOsID'] ?>','<?= $ProdServOrdem[$i]['ServNome'] ?>','<?= $ProdServOrdem[$i]['ServOsServID'] ?>','<?= $ProdServOrdem[$i]['ServOsQtd'] ?>')" data-toggle="modal" data-target="#modalExcluirServ">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </span>
                            </a>
                        </td>
                        <td><?= $ProdServOrdem[$i]['ServNome'] ?></td>
                        <td><span class="label label-warning arrowed arrowed-right">serviço</span></td>
                        <td><?= $ProdServOrdem[$i]['ServOsQtd'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServValor'] ?></td>
                        <td><?= $ProdServOrdem[$i]['ServOsSubTotal'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </tbody>
        <tbody>
            <tr style="background-color: #FFA500;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($ordemOS[0]['OsValorTotal']) ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else {

    $os = $ctrl->RetornarOsController();
}



?>