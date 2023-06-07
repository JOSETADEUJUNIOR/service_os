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

if (isset($_GET['acao']) && $_GET['acao'] == 'requisicao') {
    $chamadosPorFuncionario = $ctrl->ChamadosPorFuncionarioController();
    echo json_encode($chamadosPorFuncionario);
}
else if  (isset($_GET['acao']) && $_GET['acao'] == 'chamado_status') {
    $dados = $ctrl->CarregarDadosChamadoController();

    echo json_encode($dados);
}
else if (isset($_POST['acao']) && $_POST['acao'] == 'chamado_status_tabela') {
    $dados = $ctrl->CarregarDadosChamadoController();
echo $dados;
  
}
else if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_periodo') {
    $chamadosPorPeriodo = $ctrl->ChamadosPorPeriodoController();

    echo json_encode($chamadosPorPeriodo);
}
else if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_setor') {
    $chamadosPorSetor = $ctrl->ChamadosPorSetorController();

    echo json_encode($chamadosPorSetor);
}

$dadosUser = $userController->DetalharUsuarioController($_SESSION['id']);
$dados = $userController->RetornarDadosCadastraisController();
