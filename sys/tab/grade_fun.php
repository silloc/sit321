<?php
	error_reporting(0);
	include_once '../../config/conn.php';
	include_once '../../config/testSession.php';
	header('Content-type: text/html; charset=gb2312');
	/**
	 * ��Ӱ༶
	 * */
	if($_POST['action_add']=="grade_add"){
		
		
		$gname = $_POST['gname'];
		echo "SELECT * FROM  `grade` WHERE gname = '".$gname."'";
		$rs=mysql_query("SELECT * FROM  `grade` WHERE gname = '".$gname."'");
		$row=mysql_fetch_row($re);
		if($row==false){
			$sql = "INSERT INTO `grade` (`gname`) VALUES ('".$gname."')";
			$result=mysql_query($sql);
			if(!$result){
				echo "��Ӱ༶����<a href='javascript:window.close();'>�رմ���</a>";
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}else {
			echo "������ӵİ༶�Ѿ����ڣ�<a href='javascript:window.close();'>�رմ���</a>";
		}
		
	}
	/**
	 *  �޸İ༶
	 * */
	if($_POST['action_modify']=="grade_modify"){
		$gname = $_POST['gname'];
		$gid   = $_POST['gid'];
		$rs=mysql_query("SELECT * FROM  `grade` WHERE gname = '".$gname."'");
		$row=mysql_fetch_row($re);
		if($row==false){
				//UPDATE  `message`.`grade` SET  `gname` =  '1-111' WHERE  `grade`.`id` =16
				$sql = "UPDATE  `message`.`grade` SET  `gname` =  '".$gname."' WHERE  `grade`.`id` =".$gid;
				$result=mysql_query($sql);
				if(!$result){
					echo "����޸Ĵ���<a href='javascript:window.close();'>�رմ���</a>";
				}else{
					echo "<script>window.opener.location.reload();window.close();</script>";
				}
		 }else {
			echo "�����޸ĵİ༶�Ѿ����ڣ�<a href='javascript:window.close();'>�رմ���</a>";
		 }
	}
	
?>