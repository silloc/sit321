<?php
	/**
	 * teacher_fun 类用于处理教师用户的逻辑代码
	 * */
	class  teacher_fun{
		private $uid;
		private $tname;
		private $tcode;
		
		public  function  __construct(){
			include_once '../../config/conn.php';
		}
		
		public  function updata_name($uid,$name){
			$query = "UPDATE `teacher` SET `name`='".$name."' WHERE user_id=".$uid;
			if(mysql_query($query)){
				echo "<script>alert('UPDATEED！');</script>";
			}
		}
		public function upadta_tcode($uid,$code){
			$query = "UPDATE user SET username='".$code."' where id=".$uid;
			if(mysql_query($query)){
				echo "<script>alert('UPDATEED！');</script>";
			}
		}
		public function add_evalue($suid,$tuid,$evalue){
			//添加评价 三个字段分别为老师用户id，学生用户id 和评价内容
			$times = date("Y-m-d");
			$query = "INSERT INTO evaluate (`su_id`,`tu_id`,`evalue`,`times`) values (".$suid.",".$tuid.",'".$evalue."','".$times."')";
			$result = mysql_query($query);
		}
		public function  add_tforc($tuid,$gid){
			//添加自己所教的班级
			$query = "insert into tforc (tid,cid) values($tuid,$gid)";
			$result = mysql_query($query);
		}
		public function del_tforc($uid,$gid,$id){
			//删除自己所教的班级 删除所教班级的时候，将删除与自己所教班级的所有学生评语
			$query="delete from tforc where cid=$gid and id=$id";
			if(mysql_query($query)){
				$query="select * from student where grade=$gid";
				$result = mysql_query($query);
				//$v ="$gid aa";
				while ($row = mysql_fetch_array($result)){
					$query ="DELETE FROM evaluate WHERE su_id=$row[1] and tu_id=$uid";
					mysql_query($query);
					$v .=$row[1];
				}
				return true;
			}
		}
		public function del_evalue($eid,$sid,$uid){
			$query = "DELETE FROM evaluate WHERE id=$eid and su_id=$sid and tu_id=$uid";
			if(mysql_query($query)){
				echo  "<script>alert('Deleted！');</script>";
			}
		}
		public function select_user($uid){
			$query = "select * from user where id=".$uid;
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			if($row){
				return  $row;
			}
		}
		public function select_teacher($uid){
			$query = "select * from teacher where user_id=".$uid;
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			if($row){
				return  $row;
			}
		}
		public  function select_tid_tforc_cid($tid,$cid){
			$query="select * from tforc where tid=".$tid." and cid=".$cid;
			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			if($row){
				return  true;
			}
		}
		public function select_tfor_grade($tid){
			$query = "select tforc.*,grade.gname from `tforc` inner join `grade` on tforc.cid=grade.id where tforc.tid=".$tid;
			$result = mysql_query($query);
			return $result;
		}
		
		public function select_num_student_for_teacher($tid){
			$query = "select sid, sforc.cid from `sforc` inner join `tforc` on sforc.cid= tforc.cid where tforc.tid=$tid";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);
			return $num;
		}
		
		public function select_limit_student_for_teacher($first,$last,$uid){
			$query = "SELECT * FROM `student` inner join tforc on  student.grade=tforc.cid where tforc.tid=$uid limit $first,$last";
			$result = mysql_query($query);
			//$row=mysql_fetch_row($result);
			return $result;
		}
		public function select_evaluate($sid){
			$query = "select * from `evaluate` where su_id=".$sid;
			$result = mysql_query($query);
			return $result;
		}
		
		public function select_grade(){
			$query = "select * from grade";
			$result=mysql_query($query);
			return $result;
		}
		
		public function students_in_unit($first,$last,$tid){
			$query = "select sid, sforc.cid from `sforc` inner join `tforc` on sforc.cid= tforc.cid where tforc.tid=$tid limit $first,$last";
			$result = mysql_query($query);
			return $result;
		}
		
		
		
		
	}
?>