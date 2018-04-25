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

// set style cells = bold
$activeSheet->setCellValue('A1', 'CUSTOMER BARCODE')->getStyle('A1')->getFont()->setBold(true);
$activeSheet->setCellValue('B1', 'CUSTOMER GROUP')->getStyle('B1')->getFont()->setBold(true);
$activeSheet->setCellValue('C1', 'NAMA PESERTA')->getStyle('C1')->getFont()->setBold(true);
$activeSheet->setCellValue('D1', 'KOTA ASAL')->getStyle('D1')->getFont()->setBold(true);
$activeSheet->setCellValue('E1', 'NO TELP')->getStyle('E1')->getFont()->setBold(true);
$activeSheet->setCellValue('F1', 'VISIT DATE')->getStyle('F1')->getFont()->setBold(true);
$activeSheet->setCellValue('G1', 'MEJA')->getStyle('G1')->getFont()->setBold(true);
$activeSheet->setCellValue('H1', 'KURSI')->getStyle('H1')->getFont()->setBold(true);
// set column width = auto
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

$query = "SELECT customer.customer_hp, customer.customer_name, customer.customer_town, groups.groups_name, customer.customer_meja, customer.customer_kursi, groups.groups_visit, groups.groups_barcode  FROM customer LEFT JOIN groups ON customer.customer_group = groups.groups_id";
$result_groups = mysqli_query($connection, $query);

    $i = 2;
    while ($row = mysqli_fetch_assoc($result_groups)) {
        $customer_barcode = $row['groups_barcode'];
        $customer_name = $row['customer_name'];
        $customer_town = $row['customer_town'];
        $customer_hp = $row['customer_hp'];
        $customer_visit = $row['groups_visit'];
        $customer_meja = $row['customer_meja'];
        $customer_kursi = $row['customer_kursi'];
        $customer_group = $row['groups_name'];

        $activeSheet->setCellValue('A'.$i, $customer_barcode)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('B'.$i, $customer_group)->getStyle('B'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('C'.$i, $customer_name)->getStyle('C'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('D'.$i, $customer_town)->getStyle('D'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('E'.$i, $customer_hp)->getStyle('E'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('F'.$i, $customer_visit)->getStyle('F'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('G'.$i, $customer_meja)->getStyle('G'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('H'.$i, $customer_kursi)->getStyle('H'.$i)->getFont()->setBold(false);
        $i++;
    }

    $count = mysqli_query($connection, "SELECT COUNT(customer_id) AS total FROM customer");
    while ($row = mysqli_fetch_array($count)) {
        $total = $row['total'];
        $cell = $total + 2;

        $spreadsheet->getActiveSheet()->mergeCells('A'.$cell.':E'.$cell);
        $activeSheet->setCellValue('A'.$cell, 'TOTAL')->getStyle('A'.$cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeSheet->setCellValue('F'.$cell, $total)->getStyle('F'.$cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $activeSheet->setCellValue('A'.$cell, 'TOTAL')->getStyle('A'.$cell)->getFont()->setBold(true);
        $activeSheet->setCellValue('F'.$cell, $total)->getStyle('F'.$cell)->getFont()->setBold(true);
    }

////////////////////////////////////////////////////////////////////////////////
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
