<?php

include_once '_include_autoload.php';

use Src\_public\Util;
use Dompdf\Dompdf;
use Dompdf\Options;
use Src\Controller\ProdutoController;

if (isset($_GET['desc_filtro'])) {
  $options = new Options();
  $options->setChroot('../../Resource/dataview/arquivos');

  $html = "";
  $ctrl = new ProdutoController();
  $filtro_palavra = $_GET['desc_filtro'];
  if ($filtro_palavra == ""){
    $produto = $ctrl->SelecioneProdutoAPICTRL(Util::EmpresaLogado());
  }else{
    $produto = $ctrl->FiltrarProdutoCTRL($filtro_palavra);
  }
  $dados_empresa = $ctrl->DadosEmpresaCTRL();

  // Inicia o buffer de saída
  ob_start();
  $img = ($dados_empresa['EmpLogoPath'] == "" || $dados_empresa['EmpLogoPath'] == null ? "" :'<img src=../../Resource/dataview/' . $dados_empresa['EmpLogoPath'] . ' height="100px" width="150px" alt="Photo 2" class="img-fluid">'); ?>


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
  </style>

  <table style="width:100%">
    <tr>
      <th><?= $img ?>
      </th>
      <th colspan="5">
        <p><?= $dados_empresa['EmpNome'] ?></p>
        <p><?= $dados_empresa['EmpCNPJ'] ?></p>
        <p><?= $dados_empresa['EmpEnd'] ?></p>
      </th>
    </tr>
    <tr>
      <td style="text-align: center;" colspan="6">
        <center><strong>Relação de Produto</strong></center>
      </td>
    </tr>
    <tr>
      <td><strong>Nome/Descrição</strong></td>
      <td><strong>Valor Compra</strong></td>
      <td><strong>Valor Venda</strong></td>
      <td><strong>Estoque Atual</strong></td>
      <td><strong>Estoque Mínino</strong></td>
      <td><strong>Satatus</strong></td>
    </tr>
    <?php $servicoZ = 0;
    for ($i = 0; $i < count($produto); $i++) {
      $servicoZ++; ?>
      <tr>
        <td>
          <?= $produto[$i]['ProdDescricao'] ?>
        </td>
        <td>
          <?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorCompra']) ?>
        </td>
        <td>
          <?= Util::FormatarValorMoedaExibir($produto[$i]['ProdValorVenda']) ?>
        </td>
        <td>
          <?= $produto[$i]['ProdEstoque'] ?>
        </td>
        <td>
          <?= $produto[$i]['ProdEstoqueMin'] ?>
        </td>
        <td>
          <?= Util::Status($produto[$i]['ProdStatus']) ?>
        </td>
      </tr>
    <?php } ?>
  </table>
  <p style="font-size:12px" align="right">Total de Registros: <?= $servicoZ ?></p>

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
} else {
  Util::chamarPagina('produto.php');
}

