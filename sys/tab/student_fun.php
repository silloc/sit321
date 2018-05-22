<?php
	class student_fun{
		
		public function __construct(){
			include_once '../../config/conn.php';
		}
		
		public function  select_student($uid){
			$query="select * from student where user_id=".$uid;
			$result=mysql_query($query);
			return $result;
		}
		public function select_home($uid){
			$query = "select * from home where user_id=".$uid;
			$result = mysql_query($query);
			return $result;
		}
		public function select_health($uid){
			$query = "select * from health where user_id=".$uid;
			$result = mysql_query($query);
			return $result;
		}
		public function student_e($uid){
			$query = "select * from evaluate where su_id=".$uid;
			$result = mysql_query($query);
			return $result;
		}
		
		public function  update_student($uid,$scode,$sno,$sname,$gid,$phone,$address1,$address2,$address3){
			
			$query="UPDATE  `student` SET `studentcode`='".$scode."',`studentno`='".$sno."',`name`='".$sname."',
					`grade`=$gid ,`telehpon`=$phone,`homeadd` =  '".$address1."',
					 `postaladdress`='".$address2."', `address`='".$address3."'  WHERE  `user_id`=".$uid;
			
			$result = mysql_query($query);
			return $result;
			
		}
		public function update_home_Ajax_title($hid,$value){
			$query="update home set title='".$value."' where id=$hid";
			$result=mysql_query($query);
		}
		public function update_home_Ajax_name($hid,$value){
			$query="update home set name='".$value."' where id=$hid";
			$result=mysql_query($query);
		}
		public function update_home_Ajax_work($hid,$value){
			$query="update home set work='".$value."' where id=$hid";
			$result=mysql_query($query);
		}
		public function update_home_Ajax_telephone($hid,$value){
			$query="update home set telephone='".$value."' where id=$hid";
			$result=mysql_query($query);
		}
		public function update_health($uid,$height,$weight,$bust,$vc,$vision_left,$vision_right){
			$query="UPDATE `health` SET `height` = '".$height."',
													`weight` = '".$weight."',
													`bust` = '".$bust."',
													`vc` = '".$vc."',
													`vision_left` = '".$vision_left."',
													`vision_right` = '".$vision_right."' WHERE `user_id` =$uid";
			$result = mysql_query($query);
			return $result;
		}
		
		public function del_homeByid($hid){
			$query="DELETE FROM home WHERE  id=".$hid;
			$result=mysql_query($query);
		}
		public function insert_home($uid,$title,$name,$work,$telephone){
			$query="INSERT INTO `home` (
								`user_id` ,
								`title` ,
								`name` ,
								`work` ,
								`telephone`
								)
								VALUES (
								$uid,
								'".$title."',
								'".$name."',
								'".$work."',
								'".$telephone."'
								)";
			 $result = mysql_query($query);
		}
		
				public  function select_sid_sforc_cid($sid,$cid){
			$query="select * from sforc where sid=".$sid." and cid=".$cid;
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			if($row){
				return  true;
			}
		}
		
		
		public function select_sfor_grade($sid){
			$query = "select sforc.*,grade.gname from `sforc` inner join `grade` on sforc.cid=grade.id where sforc.sid=".$sid;
			$result = mysql_query($query);
			return $result;
		
		}
		public function  add_sforc($suid,$gid){
			
			$query = "insert into sforc (sid,cid) values($suid,$gid)";
			$result = mysql_query($query);
		}
		
				public function del_sforc($uid,$gid,$id){
			//删除自己所教的班级 删除所教班级的时候，将删除与自己所教班级的所有学生评语
			$query="delete from sforc where cid=$gid and id=$id";
			if(mysql_query($query)){
				return true;
				}
				
			}
			
		
		

		
		
		
		
		
		
		
		
		
		
		
	}
?>