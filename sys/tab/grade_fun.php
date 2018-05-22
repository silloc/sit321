<?php
	error_reporting(0);
	include_once '../../config/conn.php';
	include_once '../../config/testSession.php';
	header('Content-type: text/html; charset=gb2312');
	/**
	 * 添加班级
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
				echo "添加班级错误！<a href='javascript:window.close();'>关闭窗口</a>";
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}else {
			echo "您所添加的班级已经存在！<a href='javascript:window.close();'>关闭窗口</a>";
		}
		
	}
	/**
	 *  修改班级
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
					echo "添加修改错误！<a href='javascript:window.close();'>关闭窗口</a>";
				}else{
					echo "<script>window.opener.location.reload();window.close();</script>";
				}
		 }else {
			echo "您所修改的班级已经存在！<a href='javascript:window.close();'>关闭窗口</a>";
		 }
	}
	
?>