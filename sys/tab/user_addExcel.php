<?php
	session_start();
	//error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './user_fun.php';
	include_once './upfile.class.php';
	set_include_path(get_include_path() . PATH_SEPARATOR . '../../PHPExcel/');
	include 'IOFactory.php';
	
	$obj = new user_fun();
	$up  = new upfiles();
	if($_POST['action']=='excel'){
		header("Content-Type:text/html; charset=gb2312");
   		$filename=$up->upfile('file');
	    $inputFileName = $up->getinfo($filename);
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	    $title = iconv('utf-8','gb2312',$sheetData[1]['A']); //获取表头标题
		if($_POST['role']==1){
   			echo "管理员";
   		}
   		if($_POST['role']==1){
   			echo "教师用户";
   		}
   		if($title!="学生信息（模板）"){
   			echo "<script>alert('模板文件错误！');window.close();</script>";
   			exit();
   		}
   		if($_POST['role']==2){
   			for($i=3;$i<=count($sheetData);$i++){
   				$Number=iconv('utf-8','gb2312',$sheetData[$i]['B']);
   				if($obj->chack_user($Number) && $Number!=''){
   					//导入新用户信息
   					$returnID=$obj->dr_user($Number,$_POST['role']);
   					$obj->dr_student($returnID,$Number,$sheetData[$i]);
   					$obj->dr_home($returnID, $sheetData[$i]);
   					$obj->dr_health($returnID, $sheetData[$i]);
   					
   				}else {
   					if($Number!=''){
   						//如果用户存在，则更新用户信息
   						$uID = $obj->select_user($Number);
   						$obj->dr_Up_student($uID, $sheetData[$i]);
   						$obj->dr_Up_home($uID, $sheetData[$i]);
   						$obj->dr_Up_health($uID, $sheetData[$i]);
   					}
   					  
   				}
   			}
   			echo "<script>alert('导入成功！');window.opener.location.reload();window.close();</script>";
   		}
   		
   		$up->del($filename);
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {font-size: 12px}
.STYLE4 {
	font-size: 12px;
	color: #1F4A65;
	font-weight: bold;
}

a:link {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;

}
a:visited {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;
}
a:hover {
	font-size: 12px;
	color: #FF0000;
	text-decoration: underline;
}
a:active {
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.STYLE7 {font-size: 12}

-->
</style>
<script type="text/javascript" src="../../js/jquery-1.9.0.js"></script>
<script type="text/javascript">

</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="images/tab_03.gif" width="15" height="30" /></td>
        <td width="1101" background="images/tab_05.gif"><span class="STYLE4"></span></td>
        <td width="281" background="images/tab_05.gif"><table border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center">
                    </div></td>
                    <td class="STYLE1"><div align="center"></div></td>
                  </tr>
              </table></td>
              <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"></div></td>
                    <td class="STYLE1"><div align="center"></div></td>
                  </tr>
              </table></td>
              <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"></div></td>
                    <td class="STYLE1"><div align="center"></div></td>
                  </tr>
              </table></td>
              <td width="52"><table width="88%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"></div></td>
                    <td class="STYLE1"><div align="center"></div></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="14"><img src="images/tab_07.gif" width="14" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9" background="images/tab_12.gif">&nbsp;</td>
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">导入用户</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div  class="STYLE2 STYLE1">
            	    <form action="" method="post" enctype ="multipart/form-data">
				  		<input type="hidden" name="action" value="excel" />
				  		<label>用户权限<select name="role">
				  		    <?php 
				  		       $result=$obj->select_role();
				  		       while ($row=mysql_fetch_row($result)){
				  		       	 if($row[2]==2)echo "<option value='".$row[2]."'>$row[1]</option>";
				  		       }
				  		    ?>
				  		</select>
				  		</label><br />
				  		<input type="file" name="file"   /><br />
				  		<input type="submit" value="导入" /><br />
				  		&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;">注意：目前只支持导入学生用户，导入时请选着正确的模板！</span>
				  	</form>
            	</div>
            </td>
          </tr>
          
        </table></td>
        <td width="9" background="images/tab_16.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="29"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="29"><img src="images/tab_20.gif" width="15" height="29" /></td>
        <td background="images/tab_21.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" height="29" nowrap="nowrap"><span class="STYLE1"></span></td>
            <td width="75%" valign="top" class="STYLE1"><div align="right">
            </div></td>
          </tr>
        </table></td>
        <td width="14"><img src="images/tab_22.gif" width="14" height="29" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
