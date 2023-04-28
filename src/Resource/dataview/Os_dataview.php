<?php
include_once '_include_autoload.php';

use Src\Controller\OsController;
use Src\Controller\ClienteController;
use Src\Controller\ProdutoController;
use Src\Controller\ServicoController;
use Src\Controller\UsuarioController;
use Src\VO\OsVO;
use Src\_public\Util;
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
Util::debug($clientes);

$ctrl = new OsController();
$dadosOS = $ctrl->RetornarDadosOsController();

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
    $vo->setOsDtFinal($_POST['dtFinal']);
    $vo->setOsDescProdServ($_POST['descProd']);
    $vo->setOsGarantia($_POST['garantia']);
    $vo->setOsDefeito($_POST['defeito']);
    $vo->setOsObs($_POST['obs']);
    $vo->setOsCliID($_POST['Oscliente']);
    $vo->setOsTecID($_POST['tecnico']);
    $vo->setOsStatus($_POST['status']);
    $vo->setOsLaudoTec($_POST['laudo']);
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
}else if (isset($_POST['btnFiltrarStatus']) && isset($_POST['FiltrarStatus'])) {
    $status_filtro = $_POST['FiltrarStatus'];
    $filtroDe = $_POST['filtroDe'];
    $filtroAte = $_POST['filtroAte'];
    $os = $ctrl->FiltrarStatusController($status_filtro, $filtroDe, $filtroAte);

    if (count($os) > 0) { ?>
         <table class="table table-hover tabela" id="tabela_result_os">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>[NºOS] - Nome do cliente</th>
                                        <th>Dt Inicio</th>
                                        <th>Dt Entrega</th>
                                        <th>Tecnico</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $soma = 0;
                                    for ($i = 0; $i < count($os); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($os[$i]['OsFaturado'] == 'N') { ?>
                                                    <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                                                    <?php foreach ($dadosOS as $do) {
                                                        if ($do['OsID'] == $os[$i]['OsID']) {
                                                            $prodOS = $do['ProdOs_osID'];
                                                            $servOS = $do['ServOs_osID'];
                                                            $anxOS = $do['AnxOsID'];
                                                        }
                                                    } ?>
                                                    <?php if ($prodOS == '' && $servOS == '' && $anxOS == '') { ?>
                                                        <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                    <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                                                <?php } ?>
                                                <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= '[' . $os[$i]['OsID'] . ']' . ' - ' . $os[$i]['nomeCliente'] ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                                            <td><?= $os[$i]['OsTecID'] ?></td>
                                            <td><?= Util::FormatarValor($soma = $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>

                                            <td><?php
                                                $status = '';
                                                if ($os[$i]['OsStatus'] == "O") {
                                                    $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                                } else if ($os[$i]['OsStatus'] == "A") {
                                                    $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "EA") {
                                                    $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "F") {
                                                    $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                                } else if ($os[$i]['OsStatus'] == "C") {
                                                    $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                                } ?>
                                                <?= $status ?>
                                                <?php $texto = "$os[$i]['OsDefeito']"; ?>
                                                <?= ($os[$i]['OsStatus'] != "F" ? '' : ($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>

                                                <?php
                                                $os[$i]['CliNome'] = str_replace(' ', '%20', $os[$i]['nomeCliente']);
                                                $telefone = Util::remove_especial_char(trim($os[$i]['CliTelefone']));
                                                $inicio_texto = "Olá, tudo bem?<br /><br /> Somo da *{$dadosEmp[0]['EmpNome']}<br /><br />*Segue o orçamento:*{$os[$i]['OsID']}*<br /><br />Nome do cliente: *{$os[$i]['nomeCliente']}*<br /><br />Defeito:";
                                                $enviarDadosAparelho = str_replace('<br /', '%0A', $os[$i]['OsDescProdServ']);
                                                $enviarOrcamento = str_replace('<br /', '%0A', $os[$i]['OsDefeito']);
                                                $valorOS = str_replace('<br /', '%0A', $os[$i]['OsValorTotal']);
                                                $linkTratado = "{$inicio_texto}";
                                                $linkTratado = str_replace('<br />', '%0A', $linkTratado);
                                                $linkTratado = str_replace(' ', '%20', $linkTratado);

                                                $link = "https://api.whatsapp.com/send?phone=55{$telefone}&text=🔔%20{$linkTratado}%0A{$enviarOrcamento}%0ADados do aparelho:%0A{$enviarDadosAparelho}%0AValor do Serviço: R$:{$valorOS}";
                                                ?>
                                                <a class="btn btn-primary btn-xs " aria-label="WhatsApp" href="<?= $link ?>" target="_blank">Enviar orçamento</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

    <?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} 


else if (isset($_POST['btnFiltrar']) && isset($_POST['FiltrarNome'])) {
    $nome_filtro = $_POST['FiltrarNome'];
    $os = $ctrl->FiltrarOsController($nome_filtro);

    if (count($os) > 0) { ?>
         <table class="table table-hover tabela" id="tabela_result_os">
                                <thead>
                                    <tr>
                                        <th>Ação</th>
                                        <th>[NºOS] - Nome do cliente</th>
                                        <th>Dt Inicio</th>
                                        <th>Dt Entrega</th>
                                        <th>Tecnico</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $soma = 0;
                                    for ($i = 0; $i < count($os); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php if ($os[$i]['OsFaturado'] == 'N') { ?>
                                                    <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                                                    <?php foreach ($dadosOS as $do) {
                                                        if ($do['OsID'] == $os[$i]['OsID']) {
                                                            $prodOS = $do['ProdOs_osID'];
                                                            $servOS = $do['ServOs_osID'];
                                                            $anxOS = $do['AnxOsID'];
                                                        }
                                                    } ?>
                                                    <?php if ($prodOS == '' && $servOS == '' && $anxOS == '') { ?>
                                                        <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                                                    <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                                                <?php } ?>
                                                <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                                            </td>
                                            <td><?= '[' . $os[$i]['OsID'] . ']' . ' - ' . $os[$i]['nomeCliente'] ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                                            <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                                            <td><?= $os[$i]['OsTecID'] ?></td>
                                            <td><?= Util::FormatarValor($soma = $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>

                                            <td><?php
                                                $status = '';
                                                if ($os[$i]['OsStatus'] == "O") {
                                                    $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                                                } else if ($os[$i]['OsStatus'] == "A") {
                                                    $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "EA") {
                                                    $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                                                } else if ($os[$i]['OsStatus'] == "F") {
                                                    $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                                                } else if ($os[$i]['OsStatus'] == "C") {
                                                    $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                                                } ?>
                                                <?= $status ?>
                                                <?php $texto = "$os[$i]['OsDefeito']"; ?>
                                                <?= ($os[$i]['OsStatus'] != "F" ? '' : ($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>

                                                <?php
                                                $os[$i]['CliNome'] = str_replace(' ', '%20', $os[$i]['nomeCliente']);
                                                $telefone = Util::remove_especial_char(trim($os[$i]['CliTelefone']));
                                                $inicio_texto = "Olá, tudo bem?<br /><br /> Somo da *{$dadosEmp[0]['EmpNome']}<br /><br />*Segue o orçamento:*{$os[$i]['OsID']}*<br /><br />Nome do cliente: *{$os[$i]['nomeCliente']}*<br /><br />Defeito:";
                                                $enviarDadosAparelho = str_replace('<br /', '%0A', $os[$i]['OsDescProdServ']);
                                                $enviarOrcamento = str_replace('<br /', '%0A', $os[$i]['OsDefeito']);
                                                $valorOS = str_replace('<br /', '%0A', $os[$i]['OsValorTotal']);
                                                $linkTratado = "{$inicio_texto}";
                                                $linkTratado = str_replace('<br />', '%0A', $linkTratado);
                                                $linkTratado = str_replace(' ', '%20', $linkTratado);

                                                $link = "https://api.whatsapp.com/send?phone=55{$telefone}&text=🔔%20{$linkTratado}%0A{$enviarOrcamento}%0ADados do aparelho:%0A{$enviarDadosAparelho}%0AValor do Serviço: R$:{$valorOS}";
                                                ?>
                                                <a class="btn btn-primary btn-xs " aria-label="WhatsApp" href="<?= $link ?>" target="_blank">Enviar orçamento</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

    <?php } else {
        echo '<h4><center>Nenhum registro encontrado!</center><h4>';
    }
} else if (isset($_POST['btn_consultar']) && $_POST['btn_consultar'] == 'ajx') {
    $os = $ctrl->RetornarOsController(); ?>


    <table class="table table-hover" id="tabela_result_os">
        <thead>
            <tr>
                <th>Ação</th>
                <th>[Nº OS] - Nome do cliente</th>
                <th>Dt Inicio</th>
                <th>Dt Entrega</th>
                <th>Tecnico</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $soma = 0;
            for ($i = 0; $i < count($os); $i++) { ?>
                <tr>
                    <td>
                        <?php if ($os[$i]['OsFaturado'] == 'N') { ?>
                            <a href="ordem_servico.php?OsID=<?= $os[$i]['OsID'] ?>"><i class="fas fa-edit"></i></a>
                            <?php foreach ($dadosOS as $do) {
                                if ($do['OsID'] == $os[$i]['OsID']) {
                                    $prodOS = $do['ProdOs_osID'];
                                    $servOS = $do['ServOs_osID'];
                                    $anxOS = $do['AnxOsID'];
                                }
                            } ?>
                            <?php if ($prodOS == '' && $servOS == '' && $anxOS == '') { ?>
                                <a href="#" onclick="ExcluirModal('<?= $os[$i]['OsID'] ?>','<?= $os[$i]['nomeCliente'] ?>')" data-toggle="modal" data-target="#modalExcluir"><i style="color:red" class="fas fa-trash-alt"></i></a>
                            <?php } ?>
                            <a href="itens_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:purple" title="Inserir os Itens na OS" class="fas fa-list"></i></a>
                            <a href="anexo_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Inserir os anexos na OS" class="fas fa-file-archive"></i></a>
                        <?php } ?>
                        <a href="print_os.php?OsID=<?= $os[$i]['OsID'] ?>"><i style="color:black" title="Imprimir OS" class="fas fa-print"></i></a>
                    </td>
                    <td><?= '[' . $os[$i]['OsID'] . ']' . ' - ' . $os[$i]['nomeCliente'] ?></td>
                    <td><?= Util::ExibirDataBr($os[$i]['OsDtInicial']) ?></td>
                    <td><?= Util::ExibirDataBr($os[$i]['OsDtFinal']) ?></td>
                    <td><?= $os[$i]['OsTecID'] ?></td>
                    <td><?= Util::FormatarValor($soma = $os[$i]['OsValorTotal'] - $os[$i]['OsDesconto']) ?></td>

                    <td><?php
                        $status = '';
                        if ($os[$i]['OsStatus'] == "O") {
                            $status = "<button class=\"btn btn-secondary btn-xs\">Orçamento</button>";
                        } else if ($os[$i]['OsStatus'] == "A") {
                            $status = "<button class=\"btn btn-info btn-xs\">Aberto</button>";
                        } else if ($os[$i]['OsStatus'] == "EA") {
                            $status = "<button class=\"btn btn-warning btn-xs\">Em aberto</button>";
                        } else if ($os[$i]['OsStatus'] == "F") {
                            $status = "<button class=\"btn btn-success btn-xs\">Finalizada</button>";
                        } else if ($os[$i]['OsStatus'] == "C") {
                            $status = "<button class=\"btn btn-danger btn-xs\">Cancelado</button>";
                        } ?>
                        <?= $status ?>
                        <?php $texto = "$os[$i]['OsDefeito']"; ?>
                        <?= ($os[$i]['OsStatus'] != "F" ? '' : ($os[$i]['OsFaturado'] == "S" ? '<span class="btn btn-success btn-xs">Faturado</span>' : '<span onclick="faturarOs(' . $os[$i]['OsID'] . ',' . $os[$i]['OsCliID'] . ',' . $os[$i]['OsValorTotal'] . ')" class="btn btn-warning btn-xs">Faturar?</span>')) ?>

                        <?php
                        $os[$i]['CliNome'] = str_replace(' ', '%20', $os[$i]['nomeCliente']);
                        $telefone = Util::remove_especial_char(trim($os[$i]['CliTelefone']));
                        $inicio_texto = "Olá, tudo bem?<br /><br /> Somo da *{$dadosEmp[0]['EmpNome']}<br /><br />*Segue o orçamento:*{$os[$i]['OsID']}*<br /><br />Nome do cliente: *{$os[$i]['nomeCliente']}*<br /><br />Defeito:";
                        $enviarDadosAparelho = str_replace('<br /', '%0A', $os[$i]['OsDescProdServ']);
                        $enviarOrcamento = str_replace('<br /', '%0A', $os[$i]['OsDefeito']);
                        $valorOS = str_replace('<br /', '%0A', $os[$i]['OsValorTotal']);
                        $linkTratado = "{$inicio_texto}";
                        $linkTratado = str_replace('<br />', '%0A', $linkTratado);
                        $linkTratado = str_replace(' ', '%20', $linkTratado);

                        $link = "https://api.whatsapp.com/send?phone=55{$telefone}&text=🔔%20{$linkTratado}%0A{$enviarOrcamento}%0ADados do aparelho:%0A{$enviarDadosAparelho}%0AValor do Serviço: R$:{$valorOS}";
                        ?>
                        <a class="btn btn-primary btn-xs " aria-label="WhatsApp" href="<?= $link ?>" target="_blank">Enviar orçamento</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php } else if (isset($_POST['btn_consultar_item']) && $_POST['btn_consultar_item'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    Util::debug($ProdOrdem);
    $ordemOS = $ctrl->RetornaOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo); ?>

    <table class="table table-hover" id="tabela_result_item">
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
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
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
            <tr style="background-color: #dfdfdf;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . Util::FormatarValor($subTotal) ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . Util::FormatarValor($ordemOS[0]['OsValorTotal']) ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else if (isset($_POST['btn_consultar_anx']) && $_POST['btn_consultar_anx'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $AnxOs = $ctrl->RetornaAnxOS($vo);

?>

    <table class="table table-hover" id="tabela_result_anx">
        <thead>
            <tr>
                <th>Ação</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Arquivo</th>

            </tr>
        </thead>
        <tbody>
            <?php $subTotal = 0;
            for ($i = 0; $i < count($AnxOs); $i++) {
                if ($AnxOs[$i]['AnxOsID'] != '') { ?>
                    <tr>
                        <td>
                            <a href="#" onclick="ExcluirModalAnx('<?= $AnxOs[$i]['AnxOsID'] ?>','<?= $AnxOs[$i]['AnxID'] ?>','<?= $AnxOs[$i]['AnxNome'] ?>')" data-toggle="modal" data-target="#modalExcluirAnx"><i style="color:red" class="fas fa-trash-alt"></i></a>
                        </td>
                        <td><?= $AnxOs[$i]['AnxNome'] ?></td>
                        <td><i style="color:red" class="<?= (explode('.', $AnxOs[$i]['AnxPath'])[1] == 'png' ? 'fas fa-image' : 'fa fa-file-pdf') ?>"></i></td>
                        <td><a href="../../Resource/dataview/<?= $AnxOs[$i]['AnxPath'] ?>" target="_blank" rel="noopener noreferrer">visualizar arquivo </a>
                        </td>



                    </tr>
            <?php }
            } ?>

        </tbody>

    </table>


<?php } else if (isset($_POST['btn_consultar_serv']) && $_POST['btn_consultar_serv'] == 'ajx') {

    $vo = new OsVO;
    $vo->setID($_POST['OsID']);
    $ProdOrdem = $ctrl->RetornaProdOrdem($vo);
    $ProdServOrdem = $ctrl->RetornaServOrdem($vo);
    $ordemOS = $ctrl->RetornaOrdem($vo); ?>


    <table class="table table-hover" id="tabela_result_item">
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
                        <td><?= $ProdOrdem[$i]['ProdDescricao'] ?></td>
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
            <tr style="background-color: #dfdfdf;">
                <td colspan="4"><span><strong>Total de valores da OS: </strong></span></td>
                <td colspan="1"><strong><?= 'R$: ' . $subTotal ?></strong></td>
                <td colspan="2"><strong><?= 'R$: ' . $ordemOS[0]['OsValorTotal'] ?></strong></td>
            </tr>
        </tbody>
    </table>


<?php } else {

    $os = $ctrl->RetornarOsController();
}

?>