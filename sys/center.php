<?php
	session_start();
	if($_SESSION["uid"]=="" || $_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
-->
</style></head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed">
  <tr>
    <td background="images/main_40.gif" style="width:3px;">&nbsp;</td>
    <td width="177"  style="border-right:solid 1px #9ad452;"><iframe name="I2" height="100%" width="177" border="0" frameborder="0" src="left.php">
		</iframe></td>
    <td><iframe name="center" src="./tab/tab.html" height="100%" width="100%" border="0" frameborder="0">
		</iframe></td>
    <td background="images/main_42.gif" style="width:3px;">&nbsp;</td>
  </tr>
</table>
</body>
</html>