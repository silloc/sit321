<?php
	/**
	 * Ajax �߼�ҳ�棬�������ƽ�ʦ��Ϣ
	 * */
	session_start();
	include_once './teacher_fun.php';
	include_once './student_fun.php';
	$obj = new teacher_fun();
	$sobj = new student_fun();
	$val = iconv("utf-8","gb2312",$_POST['val']); //���ajax �ύ����������⣬ajax�ύ��Ϊutf-8����
	$hid =$_POST['homeId'];
	if($_POST['action']=='user'){
		$obj->upadta_tcode($_SESSION['uid'],$val);
	}
	if($_POST['action']=='teacher'){
		
		$obj->updata_name($_SESSION['uid'], $val);
	}
	/**
	 * Ajax �߼�ҳ�棬�������ѧ����ͥ������޸�
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