<?php
	
	/**
	 * 学生成绩管理类(老师端可以为学生添加各科考试成绩),学生可以查看自己某学期的成绩
	 * author liujian  lj_php@sina.com
	 * term  学期表   subject 科目表   score 成绩表
	 */
	class score_fun{
		
	   public function __construct(){
		   include_once '../../config/conn.php';
	   }
	   
	   //添加学生成绩
	   public function addScore(){
		   
	   }
	   
	   //删除学生成绩
	   public function delScore(){
		   
	   }
	   
	   //修改学生成绩
	   public function modifyScore(){
		   
	   }
	   
	   //查看学生成绩是否已经存在
	   public function  isExistScore(){
		   
	   }  
       public function  updataScore(){
		   
	   }	   
	   
	   //学生查看自己的成绩
	   public function selectScoreByStudentId($studentId){
		   
	   }
	   
	   //添加学期信息
	   public function addTerm(){
		   
	   }
	   //删除学期信息
	   public function delTerm(){
		   
	   }
	   //修改学期信息
	   public function  modifyTerm(){
		   
	   }
	   //判断学期信息是否存在
	   public function  isExistTerm(){
		   
	   }
	   //更新学期信息
	   public function updataTerm(){
		   
	   }
	   
	   //该科目是否存在
	   public function isSubject($arr){
		   $sql="select * from subject where indexs='{$arr['indexs']}' and major='{$arr['majorName']}' and subname='{$arr['subjectName']}'";
		   $result=mysql_query($sql);
		   if(mysql_fetch_array($result)){
			   return false;
		   }else{
			   return  true;
		   } 
	   }
	   //添加科目
	   public function addSubject($arr){
		   $sql="INSERT INTO  subject (indexs,major,subname) VALUES ('{$arr['indexs']}','{$arr['majorName']}','{$arr['subjectName']}')";
		   $result=	mysql_query($sql);
		   if($result){
			   return  true;
		   }else{
			   return false;
		   }
	   }
	}

?>