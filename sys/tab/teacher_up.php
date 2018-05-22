<?php
	/**
	 * Ajax 逻辑页面，用来完善教师信息
	 * */
	session_start();
	include_once './teacher_fun.php';
	include_once './student_fun.php';
	$obj = new teacher_fun();
	$sobj = new student_fun();
	$val = iconv("utf-8","gb2312",$_POST['val']); //解决ajax 提交后的乱码问题，ajax提交的为utf-8编码
	$hid =$_POST['homeId'];
	if($_POST['action']=='user'){
		$obj->upadta_tcode($_SESSION['uid'],$val);
	}
	if($_POST['action']=='teacher'){
		
		$obj->updata_name($_SESSION['uid'], $val);
	}
	/**
	 * Ajax 逻辑页面，用来完成学生家庭情况的修改
	 * */
	if($_POST['action']=='title'){
		$sobj->update_home_Ajax_title($hid, $val);
	}
	if($_POST['action']=='hname'){
		$sobj->update_home_Ajax_name($hid, $val);
		
	}
	if($_POST['action']=='work'){
		$sobj->update_home_Ajax_work($hid, $val);
	}
	if($_POST['action']=='telephone'){
		$sobj->update_home_Ajax_telephone($hid, $val);
	}
?>