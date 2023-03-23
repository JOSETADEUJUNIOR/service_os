<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';


use Src\Resource\api\Classe\FuncionarioApi;

$api = new FuncionarioApi();

$api->SetMethod($_SERVER['REQUEST_METHOD']);


if (!$api->CheckMethod($api->GetMethod()))
    $api->SendData("Method invalid", -1, "ERROR");



$get_data = getallheaders();

$tem_json = $get_data['Content-Type'] == 'application/json' ? true : false;

if ($tem_json) {

    $dados = file_get_contents('php://input');
    $dados = json_decode($dados, true);
} else {

    $dados = $_POST;
}


//-----------------------------------------------------------

$api->SetEndPoint($dados['endpoint']);

if (!$api->CheckEndPoint($api->GetEndPoint()))
    $api->SendData("Endpoint invalid", -1, "ERROR");

$api->AddParameters($dados);

$result = $api->{$api->GetEndPoint()}();

$api->SendData('Resultado', $result, '200');
