<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
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

	function chack_jbxx(id){
		//alert(11111);
		//window.open('./grade_add.php','','height=500,width=600,scrollbars=yes,status =yes');
		window.open('./student_jbxx.php?id='+id+'','newwindow','height=305,width=700,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
	}

	function chack_jtqk(id){
		window.open('./student_jtqk.php?id='+id+'','newwindow','height=380,width=640,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
	}

	function chack_stqk(id){
		window.open('./student_stqk.php?id='+id+'','newwindow','height=220,width=520,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
	}

	function chack_all(id,user_id){
		window.open('./student_all.php?id='+id+'&uid='+user_id+'','newwindow','height=600,width=600,top=50,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
	}
	
	function user_add(){
	  window.open('./subject.php?action=addShow','newwindow','height=300,width=500,top=200,left=300,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
	}
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="images/tab_03.gif" width="15" height="30" /></td>
        <td width="1101" background="images/tab_05.gif"><img src="images/311.gif" width="16" height="16" /> <span class="STYLE4">ѧ�ƹ���</span></td>
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
                    <td class="STYLE1"><div align="center"><img src="images/001.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center"><a href="javascript:void(0);" onclick="user_add()">����</a></div></td>
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
            <td width="8%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">���</div></td>
            <td width="24%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">רҵ/�꼶</div></td>
            <td width="10%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">��Ŀ</div></td>
            <td width="14%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">�꼶</div></td>
            <td width="7%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">����</div></td>
          </tr>
           <?php 
            $page=$_GET['page'];
			include_once 'pageft.php';//������pageft.php���ļ�
			//ȡ������Ϣ��
			$result=mysql_query("select * from student");
			$total=mysql_num_rows($result);
			//����pageft()��ÿҳ��ʾ10����Ϣ��ʹ��Ĭ�ϵ�20ʱ������ʡ�Դ˲�������ʹ�ñ�ҳURL��Ĭ�ϣ�����ʡ�Ե�����
			$cont=$total;
			pageft($cont,25);
			//���ڲ�����ȫ�ֱ����������ó��ˣ�
			$result=mysql_query("select * from student limit $firstcount,$displaypg" );
			while($row=mysql_fetch_row($result)){
			//���б������ԣ�
			$gname = "select * from grade where id=".$row[5];
	    	$gresult = mysql_query($gname);
	    	$grow = mysql_fetch_row($gresult);
	    	
			 echo "
			 	<tr>
			  	<td height='18' bgcolor='#FFFFFF' class='STYLE2'><div align='center' class='STYLE2 STYLE1'>$row[2]</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[3]</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[4]</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1' >$grow[1]</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center' ><a href='javascript:void(0);' onclick='chack_jbxx(".$row[0].")' >[�鿴]</a></div></td>
	            </tr>
	          ";
			}
			
			//�����ҳ���������룺
			
          
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
