<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './student_fun.php';
	include_once './teacher_fun.php';
	$obj = new student_fun();
	$obj_t = new teacher_fun();
	
	$uid = $_SESSION['uid'];
	$result = $obj->select_student($uid);
	$rvalue = mysql_fetch_row($result);
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
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">������Ϣ</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div align="center" class="STYLE2 STYLE1" style="height:500px;  overflow:scroll;">
            	 	<table border="1" style="border-color:#C0DE98; " cellspacing="0" cellpadding="0" width="527">
					  <tr>
					    <td width="45" nowrap="nowrap"><p align="center">���� </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[4];?> </p></td>
					    <td width="57" nowrap="nowrap"><p align="center">ѧ�� </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center"><?php echo $rvalue[3];?></p></td>
					    <td width="62" nowrap="nowrap"><p align="center">ѧ���� </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[2];?></p></td>
					  </tr>
					  <tr>
					    <td width="45" nowrap="nowrap"><p align="center">�༶ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center">
					    <?php 
					      if($rvalue[5]!=null ||$rvalue[5]!=0){
					    	$gname = "select * from grade where id=".$rvalue[5];
					    	$gresult = mysql_query($gname);
					    	$grow = mysql_fetch_row($gresult);
					    	if($grow){
					    		echo $grow[1];
					    	}
					      }
					    ?>
					    </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center">��ϵ�绰 </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[6];?> </p></td>
					  </tr>
					  <tr>
					    <td colspan="2" rowspan="3"><p align="center">��ַ </p></td>
					    <td nowrap="nowrap" colspan="3"><p align="center">��ͥסַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[7];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="3"><p align="center">ͨѶ��ַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[8];?> </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="3"><p align="center">��ס��ַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[9];?> </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="11"><p align="center">��ͥ״�� </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="2"><p align="center">����ϵ </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center">���� </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center">������λ�����ţ�ְ�� </p></td>
					    <td width="109" nowrap="nowrap"><p align="center">��ϵ��ʽ </p></td>
					  </tr>
					  <?php 
					  		if($uid == $rvalue[1]){
						  		$result = $obj->select_home($uid);
						  		while($row=mysql_fetch_row($result)){
						  			echo "
						  				  <tr>
										    <td nowrap='nowrap' colspan='2'><p align='center'>$row[2]</p></td>
										    <td nowrap='nowrap' colspan='4'><p align='center'>$row[3]</p></td>
										    <td nowrap='nowrap' colspan='4'><p align='center'>$row[4]</p></td>
										    <td width='109' nowrap='nowrap'><p align='center'>$row[5]</p></td>
										  </tr>
						  				";
						  		}
					  		}
					  		
					  
					  ?>
					  <tr>
					    <td nowrap="nowrap" colspan="11"><p align="center">����״�� </p></td>
					  </tr>
					  <?php 
					  		//��ѯhealth���е�����
					  		if($uid == $rvalue[1]){
						  		$result = $obj->select_health($uid);
								$row = mysql_fetch_row($result);
					  		}
					  
					  ?>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">���CM</p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[2];?> </p></td>
					    <td width="87" nowrap="nowrap"><p align="center">����KG</p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[3];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">��ΧCM</p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[4];?></p></td>
					    <td width="87" nowrap="nowrap"><p align="center">�λ���ml</p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[5];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">������ </p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[6];?></p></td>
					    <td width="87" nowrap="nowrap"><p align="center">������ </p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[7];?></p></td>
					  </tr>
					  <tr>
					    <td width="45" rowspan="6"><p align="center">��ʦ���� </p></td>
					    <td nowrap="nowrap" colspan="10" rowspan="6" >
					    	<?php 
					    	    //��ѯ����ʾ����
					    	    $result = $obj->student_e($uid);
					        	while ($row=mysql_fetch_row($result)){
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:14px;'>$row[3]</span><br>";
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:12px'>��ʦǩ����";
					        		$r=$obj_t->select_teacher($row[2]);
					        		echo $r[2];
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;���ڣ�$row[4]</span><br />";
					        	}
					    	?>
					    </td>
					  </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
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
            <a href="excel_export.php?id=<?php echo $_GET['id'];?>&uid=<?php echo $_GET['uid'];?>">����Excel</a>
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
