<?php
	class user_fun{
		private $uname;
		private $upass;
		private $uid;
		private $rid;
		
		public function __construct(){
			include_once '../../config/conn.php';
		}
		/**
		 * 添加用户
		 * */
		public function  add_user($uname,$upass,$rid){
			$iobj = new user_fun();
			if($iobj->chack_user($uname)){
				$query = "INSERT INTO user (`username`,`password`,`role_id`) values ('".$uname."','".$upass."',".$rid.")";
				if(mysql_query($query)){
					$query = "SELECT LAST_INSERT_ID()";
					$result = mysql_query($query);
					$row = mysql_fetch_row($result);
					$this->uname = $uname;
					$this->uid = $row[0];
					$this->rid = $rid;
					if($this->rid == 0){
						echo "<script>window.opener.location.reload();window.close();</script>";
					}
					if($this->rid == 1){
						$iobj->add_teacher($this->uid);
					}
					if($rid == 2){
						$iobj->add_student($this->uid,$this->uname);
						//$iobj->add_home($this->uid);
						$iobj->add_health($this->uid);
					}
				}else{
					echo "<script>alert('添加失败');window.close();</script>";
				}
			}else{
				echo "<script>alert('用户已经存在添加失败');window.close();</script>";
			}
		}
		public function dr_user($uname,$rid){
			$query = "INSERT INTO user (`username`,`password`,`role_id`) values ('".$uname."','".md5("123456")."',".$rid.")";
			if(mysql_query($query)){
				$query = "SELECT LAST_INSERT_ID()";
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
				$this->uid = $row[0];
			}
			return $this->uid;
		}
	
		public  function dr_student($returnID,$Number,$sheetData){
			$query="INSERT INTO `student` (
								`user_id` ,
								`studentcode` ,
								`studentno` ,
								`name` ,
								`telehpon` ,
								`homeadd` ,
								`postaladdress` ,
								`address`
								)
								VALUES (
								  $returnID,
								 '".iconv('utf-8','gb2312',$sheetData['A'])."',
								 '".$Number."',
								 '".iconv('utf-8','gb2312',$sheetData['C'])."',
								 '".iconv('utf-8','gb2312',$sheetData['D'])."',
								 '".iconv('utf-8','gb2312',$sheetData['E'])."',
								 '".iconv('utf-8','gb2312',$sheetData['F'])."',
								 '".iconv('utf-8','gb2312',$sheetData['G'])."'
								)";
			$result = mysql_query($query);
		}
		public  function dr_home($returnID,$sheetData){
			$query="INSERT INTO `home` (
								`user_id` ,
								`title` ,
								`name` ,
								`work` ,
								`telephone`
								)
								VALUES (
								$returnID,
								'".iconv('utf-8','gb2312',$sheetData['H'])."',
								'".iconv('utf-8','gb2312',$sheetData['I'])."',
								'".iconv('utf-8','gb2312',$sheetData['J'])."',
								'".iconv('utf-8','gb2312',$sheetData['K'])."'
								)";
			 $result = mysql_query($query);
		}
		public function dr_health($returnID,$sheetData){
			 $query="INSERT INTO   `health` (
									`user_id` ,
									`height` ,
									`weight` ,
									`bust` ,
									`vc` ,
									`vision_left` ,
									`vision_right`
									)
									VALUES (
									$returnID,
									'".iconv('utf-8','gb2312',$sheetData['L'])."',
									'".iconv('utf-8','gb2312',$sheetData['M'])."',
									'".iconv('utf-8','gb2312',$sheetData['N'])."',
									'".iconv('utf-8','gb2312',$sheetData['O'])."',
									'".iconv('utf-8','gb2312',$sheetData['P'])."',
									'".iconv('utf-8','gb2312',$sheetData['Q'])."'
									)";
			   $result = mysql_query($query);
		}
		public function dr_Up_student($uID,$sheetData){
			$query="UPDATE  `student` SET  `studentcode` =  '".iconv('utf-8','gb2312',$sheetData['A'])."',
							`name` =  '".iconv('utf-8','gb2312',$sheetData['C'])."',
							`telehpon` =  '".iconv('utf-8','gb2312',$sheetData['D'])."',
							`homeadd` =  '".iconv('utf-8','gb2312',$sheetData['E'])."',
							`postaladdress` =  '".iconv('utf-8','gb2312',$sheetData['F'])."',
							`address` =  '".iconv('utf-8','gb2312',$sheetData['G'])."' WHERE  `user_id` =$uID ";
			$result = mysql_query($query);
		}
		public function dr_Up_home($uID,$sheetData){
			$query="UPDATE  `home` SET  `title` =  '".iconv('utf-8','gb2312',$sheetData['H'])."',
							`name` =  '".iconv('utf-8','gb2312',$sheetData['I'])."',
							`work` =  '".iconv('utf-8','gb2312',$sheetData['J'])."',
							`telephone` =  '".iconv('utf-8','gb2312',$sheetData['K'])."' WHERE  `user_id` =$uID";
			$result = mysql_query($query);
		}
		public function  dr_Up_health($uID,$sheetData){
			$query="UPDATE  `health` SET  `height` =  '".iconv('utf-8','gb2312',$sheetData['L'])."',
							`weight` =  '".iconv('utf-8','gb2312',$sheetData['M'])."',
							`bust` =  '".iconv('utf-8','gb2312',$sheetData['N'])."',
							`vc` =  '".iconv('utf-8','gb2312',$sheetData['O'])."',
							`vision_left` =  '".iconv('utf-8','gb2312',$sheetData['P'])."',
							`vision_right` =  '".iconv('utf-8','gb2312',$sheetData['Q'])."' WHERE  `user_id` =$uID";
			$result = mysql_query($query);
		}
		/**
		 * 添加教师记录
		 * */
		public function  add_teacher($uid){
			
			$query = "INSERT INTO `teacher` (`user_id`) values (".$uid.")";
			$result = mysql_query($query);
			if(!$result){
				
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}
		
		public function  add_student($uid,$uname){
			$query = "INSERT INTO `student` (`user_id`,`studentno`) values (".$uid.",'".$uname."')";
			$result = mysql_query($query);
			if(!$result){
				
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}
		
		public function  add_home($uid){
			$query = "INSERT INTO `home` (`user_id`) values (".$uid.")";
			$result = mysql_query($query);
			if(!$result){
				
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}
		
		public function add_health($uid){
			$query = "INSERT INTO `health` (`user_id`) values (".$uid.")";
			$result = mysql_query($query);
			if(!$result){
				
			}else{
				echo "<script>window.opener.location.reload();window.close();</script>";
			}
		}
		
		public function del_user($uid,$rid){
			$this->uid = $uid;
			$this->rid = $rid;
			$query = "DELETE FROM user WHERE  id=".$this->uid;
			$result = mysql_query($query);
			$obj=new user_fun();
			if($result && $this->rid == 1){
				$obj->del_teacher($this->uid);
				$obj->del_tforc($this->uid);
			}
			if($result && $this->rid == 2){
				$obj->del_student($this->uid);
				$obj->del_health($this->uid);
				$obj->del_health($this->uid);
			}
			
		}
		public function del_teacher($uid){
			$query = "DELETE FROM teacher WHERE user_id=".$uid;
			mysql_query($query);
			
		}
		public function del_student($uid){
			$query = "DELETE FROM student WHERE user_id=".$uid;
			mysql_query($query);
		}
		public function del_home($uid){
			$query = "DELETE FROM home WHERE user_id=".$uid;
			mysql_query($query);
		}
		public function del_health($uid){
			$query = "DELETE FROM health WHERE user_id=".$uid;
			mysql_query($query);
		}
		public function del_tforc($uid){
			//删除老师与班级对应关系
			$query = "DELETE FROM tforc WHERE tid=".$uid;
			mysql_query($query);
		}
		public function chack_user($uname){
			$flag = false;
			$query = "select * from user where username='".$uname."'";
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			if(!$row){
				$flag=true;
			}
			return $flag;
		}
		public function chack_pass($pass,$uid){
				$flag = false;
				$query = "select * from user where password='".$pass."' and id=".$uid;
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
				if($row){
					$flag=true;
				}
				return $flag;
			}
		public function select_uname($uid){
			$query = "select * from user where id=".$uid;
			$result = mysql_query($query);
			return $result;
		}
		public function select_user($uname){
			//根据用户名，查询用户ID
			$query="select * from user where username='".$uname."'";
			$value="";
			$result = mysql_query($query);
			while ($row=mysql_fetch_row($result)){
				$value=$row[0];
			}
			return $value;
		}
		public function select_role(){
			//查询权限表
			$query ="select * from role";
			$result = mysql_query($query);
			return $result;
		}
		public function resetPassword($uid){
			
			$pass=md5("123456");
			$query = "UPDATE user SET password='".$pass."' WHERE id=".$uid;
			if(mysql_query($query)){
				echo "<script>alert('密码重置成功,重置密码为（123456）！');window.opener.location.reload();</script>";
			}
		}
		public  function update_pass($uid,$newpass){
			$query = "UPDATE user SET password='".$newpass."' WHERE id=".$uid;
			if(mysql_query($query)){
				echo "<script>alert('密码修改成功，请牢记新密码！');</script>";
			}
		}
		
		public function del_gradeById($gid){
			$query = "DELETE FROM grade WHERE id=".$gid;
			$result = mysql_query($query);
		}
	}
?>