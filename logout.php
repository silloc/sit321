<?php
	session_start();
	$_SESSION["uname"]='';
	$_SESSION["upass"]='';
	$_SESSION["urole"]='';
    echo "<script>window.location.href='index.php';</script>";
?>