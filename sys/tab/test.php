<?php
   //php读取xml
   error_reporting(E_ALL);
   set_time_limit(0);

   //date_default_timezone_set('Europe/London'); 
   
   //set_include_path(get_include_path() . PATH_SEPARATOR . '../../PHPExcel/');
   include '../../PHPExcel/IOFactory.php';
   if($_POST['action']=='excel'){
     	echo "*******************************";
   	echo $_POST['file'];
   
	    //$inputFileName = $_POST['file'];
	    $inputFileName= mb_convert_encoding($_POST['file'],'UTF-8','gb2312');
		echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	
	
		echo '<hr />';
	
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		var_dump($sheetData);
		echo "<hr />";
	    echo count($sheetData[1]);
   }
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
  	<title>读取Excel测试</title>
  </head>
  <body>
  	
  </body>
</html>