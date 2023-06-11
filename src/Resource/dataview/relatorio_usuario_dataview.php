<?php

include_once '_include_autoload.php';

use Src\_public\Util;
use Dompdf\Dompdf;
use Dompdf\Options;
use Src\Controller\ProdutoController;
use Src\Controller\ClienteController;
use Src\Controller\UsuarioController;

if (isset($_GET['desc_filtro'])) {
    $options = new Options();
    $options->setChroot('../../Resource/dataview/arquivos');

    $html = "";
    $ctrl_emp = new ProdutoController();
    $ctrl_user = new UsuarioController();
    $filtro_palavra = $_GET['desc_filtro'];
    if ($filtro_palavra == "") {
        $usuario = $ctrl_user->FiltrarUsuariosController();
    } else {
        $usuario = $ctrl_user->FiltrarPessoaController($filtro_palavra, $tipo);
    }
    $dados_empresa = $ctrl_emp->DadosEmpresaCTRL();

    // Inicia o buffer de saída
    $img = ($dados_empresa['EmpLogoPath'] == "" || $dados_empresa['EmpLogoPath'] == null ? "":'<img src=../../Resource/dataview/' . $dados_empresa['EmpLogoPath'] . ' height="100px" width="150px" alt="Photo 2" class="img-fluid">');
    ob_start();
?>


    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .status-inativo{
            color:red;
        }
    </style>
    <html>

    <body>

        <table style="width:100%">
            <tr>
                <th><?= $img ?>
                </th>
                <th colspan="3">
                    <p><?= $dados_empresa['EmpNome'] ?></p>
                    <p><?= $dados_empresa['EmpCNPJ'] ?></p>
                    <p><?= $dados_empresa['EmpEnd'] ?></p>
                </th>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="4">
                    <center><strong>Relação de Usuários</strong></center>
                </td>
            </tr>
            <tr>
                <td><strong>Nome</strong></td>
                <td><strong>E-mail</strong></td>
                <td><strong>Tipo</strong></td>
                <td><strong>Status</strong></td>
            </tr>
            <?php $totalZ = 0;
            for ($i = 0; $i < count($usuario); $i++) {
                $totalZ++; ?>
                <tr>
                    <td>
                        <?= $usuario[$i]['nome'] ?>
                    </td>
                    <td>
                        <?= $usuario[$i]['login'] ?>
                    </td>
                    <td>
                        <?= $usuario[$i]['tipo'] ?>
                    </td>
                    <td class="<?= ($usuario[$i]['status']==0?'status-inativo':'') ?>">
                        <?= Util::Status($usuario[$i]['status']) ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <p style="font-size:12px" align="right">Total de Registros: <?= $totalZ ?></p>

    </body>

    </html>

<?php
    // Captura a saída do HTML
    echo $html;
    $html = ob_get_clean();
    $dompdf = new Dompdf();
    // definir as opções
    $dompdf->setOptions($options);
    $dompdf->loadHtml($html);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');
    // Define o tipo de conteúdo como PDF
    header("Content-Type: application/pdf");
    // Define o cabeçalho para exibir o PDF no navegador
    header("Content-Disposition: inline; filename=nome_do_arquivo.pdf");
    // Render the HTML as PDF
    $dompdf->render();
    // Output the generated PDF to Browser
    echo $dompdf->output();
    // $data = Util::DataHoraAtualPDF();
    // $dompdf = new Dompdf();
    // $html = ob_get_clean();
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('A4');
    // $dompdf->render();
    // $dompdf->stream('documento_' . $data . '.pdf');
} else {
    Util::chamarPagina('usuario.php');
}
