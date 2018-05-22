<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	if($_GET['action']=='del'){
		$delete_id=$_GET['id'];
		$sql="DELETE FROM plugin_classes_01 WHERE id=".$delete_id;
		mysql_query($sql);
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

<script>
var  highlightcolor='#eafcd5';
//此处clickcolor只能用win系统颜色代码才能成功,如果用#xxxxxx的代码就不行,还没搞清楚为什么:(
var  clickcolor='#51b2f6';
function  changeto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=highlightcolor&&source.id!="nc"&&cs[1].style.backgroundColor!=clickcolor)
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=highlightcolor;
}
}

function  changeback(){
if  (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="nc")
return
if  (event.toElement!=source&&cs[1].style.backgroundColor!=clickcolor)
//source.style.backgroundColor=originalcolor
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

function  clickto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=clickcolor&&source.id!="nc")
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=clickcolor;
}
else
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

function user_add(){
	//alert(11111);
	//window.open('./grade_add.php','','height=500,width=600,scrollbars=yes,status =yes');
	window.open('./addClasses.php','newwindow','height=300,width=500,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
}
function modify_classes(id){
	window.open('./modifyClasses.php?id='+id+'','newwindow','height=300,width=500,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
}
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="images/tab_03.gif" width="15" height="30" /></td>
        <td width="1101" background="images/tab_05.gif"><img src="images/311.gif" width="16" height="16" /> <span class="STYLE4">Unit Management</span></td>
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
                    <td class="STYLE1"><div align="center"><img src="images/001.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center"><a href="javascript:void(0);" onclick="user_add()">Add</a></div></td>
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
            <td width="8%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Unit Code</div></td>
            <td width="10%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Unit Code</div></td>
            <td width="15%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Unit Name</div></td>

            <td width="10%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Credit</div></td>

            <td width="7%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">Edit</div></td>
            <td width="7%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">Detele</div></td>
          </tr>
          <?php 
          	$page=$_GET['page'];
			include_once 'pageft.php';//包含“pageft.php”文件
			//取得总信息数
			//	$sql="select * from plugin_classes_01";
			$result=mysql_query("select * from plugin_classes_01");
			$total=mysql_num_rows($result);
			//调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
			$cont=$total;
			pageft($cont,25);
			$value=0;
			//现在产生的全局变量就派上用mysql_fetch_row场了：
			$result=mysql_query("select * from plugin_classes_01 limit $firstcount,$displaypg" );
			while($row=mysql_fetch_row($result)){
			//（列表内容略）
			
	    	
			 echo "
			  	<tr>
		           <td height='18' bgcolor='#FFFFFF' class='STYLE2'><div align='center' class='STYLE2 STYLE1'>$row[1]</div></td>
		           <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[2]</div></td>
		           <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[3]</div></td>
		          
		           <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[5]</div></td>

		           <td height='18' bgcolor='#FFFFFF'><div align='center'><img src='images/037.gif' width='9' height='9' /><span class='STYLE1'>[</span><a href='javascript:void(0);' onclick='modify_classes(".$row[0].")'>Edit</a><span class='STYLE1'>]</span></div></td>
		           <td height='18' bgcolor='#FFFFFF'><div align='center'><span class='STYLE2'><img src='images/010.gif' width='9' height='9' /> </span><span class='STYLE1'>[</span><a href='showClasses.php?id=".$row[0]."&action=del'>Detele</a><span class='STYLE1'>]</span></div></td>
		        </tr>
	          ";
			}
          
          ?>
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
            <td width="25%" height="29" nowrap="nowrap"><span class="STYLE1"><?php echo $page_nav;?></span></td>
            <td width="75%" valign="top" class="STYLE1"><div align="right">
              <table width="352" height="20" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="62" height="22" valign="middle"><div align="right"><?php echo $page_first;?></div></td>
                  <td width="50" height="22" valign="middle"><div align="right"><?php echo $page_up;?></div></td>
                  <td width="54" height="22" valign="middle"><div align="right"><?php echo $page_next;?></div></td>
                  <td width="49" height="22" valign="middle"><div align="right"><?php echo $page_last;?></div></td>
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
