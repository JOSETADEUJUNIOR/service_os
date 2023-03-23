<?php

namespace Src\Controller;
// controller para gerar o arquivo PDF (PdfController.php)

use Dompdf\Dompdf;

class PdfController
{

    function gerarPdf($pagina, $dados)
    {
      // Cria uma nova instância da classe Dompdf
      $dompdf = new Dompdf();

      // Carrega o conteúdo HTML do arquivo
      ob_start();
      include PATH_URL . '/relatorio_setor.php';
      $html = ob_get_clean();

      // Carrega o HTML no Dompdf
      $dompdf->loadHtml($html);

      // Renderiza o HTML como PDF
      $dompdf->render();

      // Define o nome do arquivo de saída
      $filename = $nome_arquivo . '.pdf';

      // Envia o PDF gerado para o navegador
      $dompdf->output(array('Content-Type' => 'application/pdf'));
  }
}
