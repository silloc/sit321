<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './student_fun.php';
	$obj = new student_fun();
	if($_GET['action']=='del'){
		$obj->del_homeByid($_GET['id']);
	}
	if($_POST['action']=='add'){
		$obj->insert_home($_SESSION['uid'], $_POST['title'], $_POST['hname'],  $_POST['work'],  $_POST['telephone']);
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
	$(document).ready(function(){
	  // 在这里写你的代码...
		 $("tr > td >span").dblclick(function(){
			 var inval = $(this).html();
			 var name = $(this).attr('name');
			 var hid=$(this).parents('tr').attr('hid');
			 $(this).html("<input id='edit' value='"+inval+"'> ");
			  
			 $("#edit").focus().bind("blur",function(){
				  var editval = $(this).val();
				  var flag=true;
				  if(name=='title'&& editval==''){
					  alert('关系不能为空！');
					  flag=false;
				  }
				if(flag){
				  $(this).parents("span").html(editval);
				  $.post("./teacher_up.php",{action:name,val:editval,homeId:hid});
				}
			  });
		 });
	});

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
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98"  >
          <tr>
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">家庭情况</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div align="center" class="STYLE2 STYLE1">
            	  <form action="./update_home.php" method="post">
            	    <input type="hidden" name="action"  value="add"/>
            	    <table width="90%">
            	       <tr>
					    <td width="49" nowrap="nowrap"><label>关系：<input type='text' name='title' value="" /></label></td>
					    <td width="91" nowrap="nowrap"><label>姓名：<input type='text' name='hname' value="" /></label></td>
					    <td width="200" nowrap="nowrap"><label>单位：<input type='text' name='work' value="" /></label></td>
					    <td width="75" nowrap="nowrap"><label>电话：<input type='text' name='telephone' value="" /></label></td>
					    <td width="75" nowrap="nowrap"><label><input type="submit" value="添加" /></label></td>
					   </tr>
            	    </table>
            	    </form>
            		<table border="1" style="border-color:#C0DE98; "  cellspacing="0" cellpadding="0" width="597">
					  <tr>
					    <td width="49" nowrap="nowrap"><p align="center">关系 </p></td>
					    <td width="91" nowrap="nowrap"><p align="center">姓名 </p></td>
					    <td width="200" nowrap="nowrap"><p align="center">工作单位（部门）职务 </p></td>
					    <td width="75" nowrap="nowrap"><p align="center">联系电话 </p></td>
					    <td width="75" nowrap="nowrap"><p align="center">删除 </p></td>
					  </tr>
					  
					  <?php 
					  		$id = $_SESSION['uid'];
					  		$query = "select * from home where user_id=".$id;
					  		$result = mysql_query($query);
					  		while($row=mysql_fetch_row($result)){
					  			echo "
					  				  <tr hid=$row[0]>
									    <td width='49' nowrap='nowrap'><span name='title'>$row[2]</span></td>
									    <td width='91' nowrap='nowrap'><span name='hname'>$row[3] </span></td>
									    <td width='200' nowrap='nowrap'><span name='work'>$row[4] </span></td>
									    <td width='75' nowrap='nowrap'><span name='telephone'>$row[5] </span></td>
									    <td width='75' nowrap='nowrap' align='center'><a href='./update_home.php?action=del&id=$row[0]' > [删除]</a></td>
									  </tr>
					  				";
					  		}
					  		
					  
					  ?>
					</table>
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
              <table width="352" height="20" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="62" height="22" valign="middle"><div align="right"></div></td>
                  <td width="50" height="22" valign="middle"><div align="right"></div></td>
                  <td width="54" height="22" valign="middle"><div align="right"></div></td>
                  <td width="49" height="22" valign="middle"><div align="right"></div></td>
                  <td width="59" height="22" valign="middle"><div align="right"></div></td>
                  <td width="25" height="22" valign="middle"><span class="STYLE7">
                  </span></td>
                  <td width="23" height="22" valign="middle"></td>
                  <td width="30" height="22" valign="middle"></td>
                </tr>
              </table>
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
