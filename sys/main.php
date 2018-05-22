<?php
	session_start();
	if($_SESSION["uid"]=="" || $_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>SARMS</title>
</head>

<frameset rows="61,*,24" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="./top.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" />
  <frame src="./center.php" name="mainFrame" id="mainFrame" />
  <frame src="./down.php" name="bottomFrame" scrolling="no" noresize="noresize" id="bottomFrame" />
</frameset>
<noframes><body>
</body>
</noframes></html>