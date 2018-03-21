<?php

include "registration/admin/include/connection.php";
////////////////////////////////////////////////////////////////////////////////
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

////////////////////////////////////////////////////////////////////////////////
$spreadsheet = new Spreadsheet();  /*----Spreadsheet object-----*/
$spreadsheet->setActiveSheetIndex(0); /*----- Excel (Xls) Object*/
$activeSheet = $spreadsheet->getActiveSheet();

$query = "SELECT customer.customer_barcode, customer.customer_name, customer.customer_town, groups.groups_name FROM customer LEFT JOIN groups ON customer.customer_group = groups.groups_id";
$result_groups = mysqli_query($connection, $query);

$activeSheet->setCellValue('A1' , 'CUSTOMER BARCODE')->getStyle('A1')->getFont()->setBold(true);
$activeSheet->setCellValue('B1' , 'CUSTOMER NAME')->getStyle('B1')->getFont()->setBold(true);
$activeSheet->setCellValue('C1' , 'CUSTOMER TOWN')->getStyle('C1')->getFont()->setBold(true);
$activeSheet->setCellValue('D1' , 'CUSTOMER GROUP')->getStyle('D1')->getFont()->setBold(true);

    $i = 2;
    while ($row = mysqli_fetch_assoc($result_groups)) {
        $customer_barcode = $row['customer_barcode'];
        $customer_name = $row['customer_name'];
        $customer_town = $row['customer_town'];
        $customer_group = $row['groups_name'];

        $activeSheet->setCellValue('A'.$i , $customer_barcode)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('B'.$i , $customer_name)->getStyle('B'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('C'.$i , $customer_town)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('D'.$i , $customer_group)->getStyle('B'.$i)->getFont()->setBold(false);
        $i++;
    }

////////////////////////////////////////////////////////////////////////////////
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>