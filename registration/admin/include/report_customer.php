<?php

include "connection.php";
////////////////////////////////////////////////////////////////////////////////
require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

////////////////////////////////////////////////////////////////////////////////
$spreadsheet = new Spreadsheet();  /*----Spreadsheet object-----*/
$spreadsheet->setActiveSheetIndex(0); /*----- Excel (Xls) Object*/
$activeSheet = $spreadsheet->getActiveSheet();

$query = "SELECT customer.customer_hp, customer.customer_name, customer.customer_town, groups.groups_name, groups.groups_visit, groups.groups_barcode FROM customer LEFT JOIN groups ON customer.customer_group = groups.groups_id";
$result_groups = mysqli_query($connection, $query);
// set style cells = bold
$activeSheet->setCellValue('A1' , 'CUSTOMER BARCODE')->getStyle('A1')->getFont()->setBold(true);
$activeSheet->setCellValue('B1' , 'CUSTOMER GROUP')->getStyle('B1')->getFont()->setBold(true);
$activeSheet->setCellValue('C1' , 'NAMA PESERTA')->getStyle('C1')->getFont()->setBold(true);
$activeSheet->setCellValue('D1' , 'KOTA ASAL')->getStyle('D1')->getFont()->setBold(true);
$activeSheet->setCellValue('E1' , 'NO TELP')->getStyle('E1')->getFont()->setBold(true);
$activeSheet->setCellValue('F1' , 'VISIT DATE')->getStyle('F1')->getFont()->setBold(true);
// set column width = auto
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

    $i = 2;
    while ($row = mysqli_fetch_assoc($result_groups)) {
        $customer_barcode = $row['groups_barcode'];
        $customer_name = $row['customer_name'];
        $customer_town = $row['customer_town'];
        $customer_hp = $row['customer_hp'];
        $customer_visit = $row['groups_visit'];
        $customer_group = $row['groups_name'];


        $activeSheet->setCellValue('A'.$i , $customer_barcode)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('B'.$i , $customer_group)->getStyle('B'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('C'.$i , $customer_name)->getStyle('B'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('D'.$i , $customer_town)->getStyle('B'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('E'.$i , $customer_hp)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('F'.$i , $customer_visit)->getStyle('B'.$i)->getFont()->setBold(false);
        $i++;
    }

////////////////////////////////////////////////////////////////////////////////
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>
