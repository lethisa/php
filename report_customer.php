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

$query = "SELECT * FROM groups";
$result_groups = mysqli_query($connection, $query);

$activeSheet->setCellValue('A1' , 'Group ID')->getStyle('A1')->getFont()->setBold(true);
$activeSheet->setCellValue('B1' , 'Group Name')->getStyle('B1')->getFont()->setBold(true);

    $i = 2;
    while ($row = mysqli_fetch_assoc($result_groups)) {
        $groups_id = $row['groups_id'];
        $groups_name = $row['groups_name'];

        $activeSheet->setCellValue('A'.$i , $groups_id)->getStyle('A'.$i)->getFont()->setBold(false);
        $activeSheet->setCellValue('B'.$i , $groups_name)->getStyle('B'.$i)->getFont()->setBold(false);
        $i++;
    }

////////////////////////////////////////////////////////////////////////////////
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>
