<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	
	$modify_id=$_GET['id'];
	if(!empty($modify_id)){
		$sql="select * from plugin_classes_02 where id=".$modify_id; 
		$reslut=mysql_query($sql);
		$row=mysql_fetch_array($reslut);
	}
	
	
	if($_POST['action'] == 'modiryClass'){
		$sql="UPDATE  `plugin_classes_02` SET `weeks`=".$_POST['weeks'].",
											  `section`=".$_POST['section'].",
											  `course`='".$_POST['course']."' WHERE id=".$_POST['kcid'];
		$result=mysql_query($sql);
		if($result){
			echo "<script>window.opener.location.reload();window.close();</script>";
		}else{
			echo "<script>alert('�޸�ʧ��');window.close();</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸Ŀγ�</title>
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
<script>
var  highlightcolor='#eafcd5';
//�˴�clickcolorֻ����winϵͳ��ɫ������ܳɹ�,�����#xxxxxx�Ĵ���Ͳ���,��û�����Ϊʲô:(
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

function chack(){
	var flag=true;
	var uname=$("#uname").val();
	var upass=$("#upass").val();
	var rupass=$("#rupass").val();
   if(uname==""){
	  alert("�������û�����");
	  $("#uname").focus();
	  return(flag=false);
	}
    if(upass==""){
	  alert("�������û����룡");
	  $("#upass").focus();
	  return(flag=false);
	}else{
		if(upass != rupass){
			 alert("�������벻һ����������������");
			 return(flag=false);
		}
	}
	return flag;
 }
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
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">�޸Ŀγ�</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div  class="STYLE2 STYLE1" style="margin-left:100px;">
            	    <form action="modifyClass.php" method="post" >
            	    	<input type="hidden" name="action" value="modiryClass"/>
            	    	<input type="hidden" name="kcid" value="<?php echo $row[0];?>"/>
            	    	<label>&nbsp;&nbsp;�ܣ�<select name="weeks">
							<option value="1" <?php if($row[1]==1) echo "selected"; ?>>��һ</option>
							<option value="2" <?php if($row[1]==2) echo "selected"; ?>>�ܶ�</option>
							<option value="3" <?php if($row[1]==3) echo "selected"; ?>>����</option>
							<option value="4" <?php if($row[1]==4) echo "selected"; ?>>����</option>
							<option value="5" <?php if($row[1]==5) echo "selected"; ?>>����</option>
							<option value="6" <?php if($row[1]==6) echo "selected"; ?>>����</option>
						</select></label><br />
            	    	<label>&nbsp;&nbsp;�ڣ�<select name="section">
							<option value="1" <?php if($row[2]==1) echo "selected";?>>��һ��</option>
							<option value="2" <?php if($row[2]==2) echo "selected";?>>�ڶ���</option>
							<option value="3" <?php if($row[2]==3) echo "selected";?>>������</option>
							<option value="4" <?php if($row[2]==4) echo "selected";?>>���Ľ�</option>
						</select></label> <br />
            	    	<label>�γ�����<input type="text" name="course" id="course" value="<?php echo $row[3];?>" /></label><br />
            	    	<br />
            	    	&nbsp;&nbsp;&nbsp;&nbsp;<input  type="submit" value="�޸�"/>
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
