<?php
 /**
  * 检测用户登录
  * */
session_start();
error_reporting(0);
class chacklogin{
	 private $username;
	 private $userpwd;
	 
	public function __construct($usernc,$userpwd){
		   $this->usernc=$usernc;
		   $this->userpwd=$userpwd;
	}
	
	public  function login() {
		include_once './config/conn.php';
		$sql=mysql_query("select * from user where username='".$this->usernc."' and password='".$this->userpwd."'",$conn);  
		$info=mysql_fetch_row($sql);
		//print_r($info);
	    if($info==false){
		    echo "<script>alert('用户名或密码输入错误！');history.back();</script>";
		    exit;
	    }else{
		     if($_SESSION["uid"]!="" || $_SESSION["uname"]!="" || $_SESSION["upass"]!="" ||$_SESSION["urole"]!=""){
			   $_SESSION["uid"]='';
			   $_SESSION["uname"]='';
			   $_SESSION["upass"]='';
			   $_SESSION["urole"]='';
			 } 
			
			 $_SESSION["uname"]=$this->usernc; 
			 $_SESSION["upass"]=$this->userpwd; 
			 $_SESSION["urole"]=$info[3]; 
			 $_SESSION["uid"]=$info[0]; 
			 //echo $info[3];
			 //echo $_SESSION["uname"],"===========",$_SESSION["upass"];
		    echo "<script>window.location.href='sys/main.php';</script>"; 
	    }
	}
}
  $obj=new chacklogin($_POST["username"],md5($_POST["password"]));
  $obj->login();
?>