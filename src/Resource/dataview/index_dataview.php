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
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_status') {
    $dados = $ctrl->CarregarDadosChamadoController();

    echo json_encode($dados);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_status') {
    $dados = $ctrl->consultarChamado();

    echo json_encode($dados);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_periodo') {
    $chamadosPorPeriodo = $ctrl->ChamadosPorPeriodoController();

    echo json_encode($chamadosPorPeriodo);
}
if (isset($_GET['acao']) && $_GET['acao'] == 'chamado_por_setor') {
    $chamadosPorSetor = $ctrl->ChamadosPorSetorController();

    echo json_encode($chamadosPorSetor);
}

$dadosUser = $userController->DetalharUsuarioController($_SESSION['id']);
$dados = $userController->RetornarDadosCadastraisController(); 

?>

<!-- <script>
function preencherTabelaChamados(chamados) {
  var tbody = '';
  chamados.forEach(function (chamado) {
    tbody += '<tr>' +
      '<td>' + chamado.numero_nf + '</td>' +
      '<td><b class="green">' + chamado.data_lancamento + '</b></td>' +
      '<td class="hidden-480">' +
      '<span class="label label-info arrowed-right arrowed-in">' + chamado.status + '</span>' +
      '</td>' +
      '<td class="hidden-480"><b class="">' + chamado.valor_total + '</b></td>' +
      '</tr>';
  });

  $("#chamado_status_tabela").html(tbody);
}
</script> -->