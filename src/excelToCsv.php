<?php
 
/*
** Simple xlsx to csv file made by thecodeisbae using PhpSpreadSheet
*/

/** Set the namespace **/
namespace thecodeisbae\ExcelToCsv;

/** Load all require class using the autoload file **/
require_once("vendor/autoload.php");

/** Call for required class using the namespace PhpOffice\PhpSpreadsheet **/
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory as io_factory; 

class ExcelToCsv
{
	private $file;
	private $filePath;
	private $delimiter = ";";
	private $savePath = '';

	function __construct(String $file,String $filePath,String $delimiter=';',String $savePath='')
	{
		$this->file = $file;
		$this->filePath = $filePath;
		$this->savePath = $savePath;
		$this->delimiter = $delimiter;
	}

	function setFile($file)
	{
		$this->file = $file;
	}

	function getFile()
	{
		return $this->file;
	}

	function setFilePath($filepath)
	{
		$this->filePath = $filepath;
	}
	
	function getFilePath()
	{
		return $this->filePath;
	}

	function setSaveFilePath($savefilepath)
	{
		$this->savePath = $savefilepath;
	}
	
	function getSaveFilePath()
	{
		return $this->savePath;
	}

	/* Write the main function */
	function convertExcelToCsv()
	{
		/** Check if the params file is an xlsx **/
		if(strtolower(explode('.',$this->file)[sizeof(explode('.',$this->file))-1]) != 'xlsx')	
		{
			echo 'Only xlsx files are allowed :(';
			return false;
		}
		$filename = explode('.',$this->file)[0];
		$reader = io_factory::createReader("Xlsx");
		$spreadsheet = $reader->load($this->filePath);
		$numberOfSheets = $spreadsheet->getSheetCount();

		for($index = 0;$index < $numberOfSheets; $index++)
		{
			$writer = io_factory::createWriter($spreadsheet, "Csv");
			$writer->setSheetIndex($index);   // Select which sheet to export.
			$writer->setDelimiter($this->delimiter);  // Set delimiter.
			/** Check savepath **/
			if($this->savePath == '')
				$writer->save($filename."_to_csv_sheet_".($index+1).".csv");
			else
				$writer->save($this->savePath."/".$filename."_to_csv_sheet_".($index+1).".csv");
		}
		return true;
	}

}
