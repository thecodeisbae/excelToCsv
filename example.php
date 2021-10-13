<?php
/*
** An example of usage 
*/
require_once('excelToCsv.php');
use thecodeisbae\ExcelToCsv\ExcelToCsv;

$convert = new ExcelToCsv('sample.xlsx','sample.xlsx');
if($convert->convertExcelToCsv())
    echo 'Convertion is ended please check for the root of the project to see files :)';
else
    echo 'An error occured check your file extension or your filePath';