<?php
	session_start();
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
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
.STYLE2 {color: #43860c; font-size: 12px; }

a:link {font-size:12px; text-decoration:none; color:#43860c;}
a:visited {font-size:12px; text-decoration:none; color:#43860c;}
a:hover{font-size:12px; text-decoration:none; color:#FF0000;}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/main_26_1.gif','images/main_29_1.gif','images/main_31_1.gif')">
<table width="177" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
      <tr>
        <td height="26" background="tab/images/tab_05.gif" style="text-align:center;">Navigation Bar </td>
      </tr>

      <tr>
        <td  style="line-height:4px; background:url(images/main_38.gif)">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
         <?php 
		 
            if($_SESSION["urole"]==0){
         ?>
          <table>
          	<!--tr><td><a href="./tab/grade_message.php" target="center">Units</a></td></tr-->
          	<tr><td><a href="./tab/teacher_message.php" target="center">Lectures</a></td></tr>
          	<tr><td><a href="./tab/student_message.php"" target="center">Students</a></td></tr>
          	<tr><td><a href="./tab/user_message.php" target="center">User Management</a></td></tr>
			<!--tr><td><a href="../plugin/classes/showClass.php" target="center">课表管理</a></td></tr-->
			<tr><td><a href="./tab/grade_message.php" target="center">Units</a></td></tr>
          	<tr><td><a href="./tab/modify_password.php" target="center">Change Password</a></td></tr>
          </table>
         <?php  } ?>
         <?php if($_SESSION["urole"]==1) {?>
         <table>
          	<tr><td><a href="./tab/teacher_ctrl.php" target="center">Update Information</a></td></tr>
          	<tr><td><a href="./tab/grade_set.php" target="center">Unit Management</a></td></tr>
          	<tr><td><a href="./tab/view_student.php" target="center">View Students</a></td></tr>
			<!--tr><td><a href="../plugin/classes/sclass.php" target="center">查看课表</a></td></tr-->
			<tr><td><a href="../plugin/classes/sclasses.php" target="center">View Unit</a></td></tr>
          	<tr><td><a href="./tab/modify_password.php" target="center">Change Password</a></td></tr>
          </table>
         <?php  } ?>
         <?php if($_SESSION["urole"]==2) {?>
         <table>
			<!--tr><td><a href="../plugin/classes/sclass.php" target="center">查看课表</a></td></tr-->
			<tr><td><a href="./tab/view_enrolled_unit.php" target="center">Enrolled Units</a></td></tr>
			<!--tr><td><a href="../plugin/classes/sclasses.php" target="center">Units</a></td></tr-->
         	<!--tr><td><a href="./tab/s_all.php" target="center">个人信息</a></td></tr-->
          	<tr><td><a href="./tab/update_student.php" target="center">Personal Information</a></td></tr>
          	<!--tr><td><a href="./tab/update_home.php" target="center">家庭情况</a></td></tr>
          	<tr><td><a href="./tab/update_health.php" target="center">身体情况</a></td></tr-->
          	<tr><td><a href="./tab/modify_password.php" target="center">Change Password</a></td></tr>
          </table>
         <?php  } ?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
