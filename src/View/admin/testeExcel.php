<?php

require_once dirname(__DIR__, 2) . '/Resource/dataview/setor_dataview.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    // Cria uma nova planilha
    $spreadsheet = new Spreadsheet();

    // Seleciona a planilha ativa
    $sheet = $spreadsheet->getActiveSheet();

    // Define os títulos das colunas
    $sheet->setCellValue('A1', 'Nome');
   /*  $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Telefone'); */

    // Popula a planilha com os dados dos clientes
    $row = 2;
    foreach($setor as $st) {
        $sheet->setCellValue('A'.$row, $st["nome_setor"]);
       /*  $sheet->setCellValue('B'.$row, $st["email"]);
        $sheet->setCellValue('C'.$row, $st["telefone"]); */
        $row++;
    }

    // Salva a planilha em um arquivo do Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save('dados_dos_clientes.xlsx');

   
?>
