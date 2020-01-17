<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once __DIR__ . '../../../libs/vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';


$helper = new Sample();
if ($helper->isCli()) {
    $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

    return;
}


require_once "app/modelo/CDocente.php";


// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$ODocente = new CDocente(); 
$docentes = $ODocente->listarDocentes(); 

// Set document properties
$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
    ->setLastModifiedBy('Maarten Balliauw')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

// Add some data
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'CÉDULA')
    ->setCellValue('B1', 'NOMBRE')
    ->setCellValue('C1', 'APELLIDO')
    ->setCellValue('D1', 'FECHA DE NACIMIENTO')
    ->setCellValue('E1', 'SEXO')
    ->setCellValue('F1', 'TELEFONO');


    // Miscellaneous glyphs, UTF-8
    $spreadsheet->setActiveSheetIndex(0);
    // ->setCellValue('A4', 'Miscellaneous glyphs')
    // ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
    foreach ($docentes as $cantidad => $data) {
        var_dump($cantidad['data']);
        exit();
       $spreadsheet->setCellValue('A'.$data, 'Miscellaneous glyphs');
    }

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Docentes');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Docentes.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
