<?php
    //新浪SEA数据库链接
	 /*
	 $conn= mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	 mysql_select_db(SAE_MYSQL_DB,$conn);
	 mysql_query("set names gb2312");*/
	$conn=mysql_connect("sql200.epizy.com","epiz_22007414","1xfFq24yRMcZ") or die("database connect failed");
	mysql_select_db("epiz_22007414_student",$conn);
	mysql_query("set names gb2312");
	
	
	 
?>