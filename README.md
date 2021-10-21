# excelToCsv

A simple Excel multisheets file to Csv convertor.  

The Class constructor have 3 calls :    
  *&ensp;new ExcelToCsv($file,$filePath)*  
  *&ensp;new ExcelToCsv($file,$filePath,$delimiter)*   
  *&ensp;new ExcelToCsv($file,$filePath,$delimiter,$savepath)*

Basic Usage

*require_once('vendor\autoload.php');*    
*use thecodeisbae\ExcelToCsv\ExcelToCsv;*    
    
*$convert = new ExcelToCsv('sample.xlsx','sample.xlsx');*    
*if($convert->convertExcelToCsv())*    
    *&ensp;echo 'Convertion is ended please check for the root of the project to see files :)';*    
*else*  
    *&ensp;echo 'An error occured check your file extension or your filePath';*   
