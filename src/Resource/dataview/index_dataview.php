
<?php
include_once '_include_autoload.php';

use Src\_public\Util;
Util::VerificarLogado();
use Src\Controller\ChamadoController;
use Src\Controller\UsuarioController;

$dados = [];
$chamadosPorFuncionario = [];

$ctrl = new ChamadoController();
$userController = new UsuarioController();
//
// Util::debug($dados);
if (isset($_GET['acao']) && $_GET['acao'] == 'requisicao') {
    $chamadosPorFuncionario = $ctrl->ChamadosPorFuncionarioController();
    echo json_encode($chamadosPorFuncionario);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_status') {
    $dados = $ctrl->CarregarDadosChamadoController();

    echo json_encode($dados);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_dados_tabela') {
    $dados = $ctrl->CarregarDadosChamadoTabelaController();
    
    foreach ($dados as $tb) { ?>
    <tbody>
    <tr>
        <td><?= $tb['numero_nf']?></td>

        <td>
            <small>
                <h4 class="red">09/06/2023</h4>
            </small>
        </td>
        <td class="hidden-480">
            <span class="label label-info arrowed-right arrowed-in">Em andamento</span>
        </td>
        <td>
        <small>
                <h4 class="red">1.300,00</h4>
            </small>
        </td>

    </tr>

</tbody>
 <?php }
    echo $dados;
}


if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_periodo'){
    $chamadosPorPeriodo = $ctrl->ChamadosPorPeriodoController();

    echo json_encode($chamadosPorPeriodo);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_setor'){
    $chamadosPorSetor = $ctrl->ChamadosPorSetorController();

    echo json_encode($chamadosPorSetor);
}



$dadosUser = $userController->DetalharUsuarioController($_SESSION['id']);
$dados = $userController->RetornarDadosCadastraisController();


