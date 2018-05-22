<?php
	session_start();
	error_reporting(0);
	
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './student_fun.php';
	include_once './teacher_fun.php';
    $comment= new teacher_fun();
	
	$studentID=$_GET['studentID'];
	$obj = new student_fun();
	$result = $obj->select_student($studentID);

	$rvalue = mysql_fetch_row($result);
	
	
	
	if($_POST['action']=='update'){
		$result=$obj->update_student($studentID, $_POST['snumber'],$_POST['scode'],$_POST['sname'],$_POST['telephon'], $_POST['address1'], $_POST['address2'], $_POST['address3']);
							
		if($result){
			
			$result = $obj->select_student($studentID);
			$rvalue = mysql_fetch_row($result);
			echo "<script>alert('Updated');</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Student Information</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div align="center" class="STYLE2 STYLE1">
            	<form action="" method="post">
            	    <input type="hidden" name="action" value="update"/>
            		<table border="1" style="border-color:#C0DE98; " cellspacing="0" cellpadding="0" width="655">
					  <tr align="center" >
					    <td width="36" nowrap="nowrap">Full Name</td>
					    <td nowrap="nowrap" colspan="2" width="100%" height="100%"> <input type="text" name="sname" value="<?php echo $rvalue[4];?>" /></td>
					    <!--td width="104" nowrap="nowrap">Student ID </td>
					    <td nowrap="nowrap" colspan="3"><input type="text" name="scode" value="<?php echo $rvalue[2];?>" /></td-->
					    <td nowrap="nowrap" colspan="2">Student ID</td>
					    <td width="100%" nowrap="nowrap"><input type="text" name="snumber" value="<?php echo $rvalue[2];?>" 
						style="width: 350px;"/></td>
					  </tr>
					  <tr align="center" >
						<td nowrap="nowrap" colspan="2">Email</td>
					    <td width="100%" nowrap="nowrap"><input type="text" name="email" value="<?php echo $rvalue[6];?>" width="100%"/></td>
					   
					   <td nowrap="nowrap" colspan="2">Contact Number</td>

						 <td nowrap="nowrap" colspan="4" align="left"><input type="text" name="telephon" value="<?php echo $rvalue[6];?>" size="50"/></td>
					  </tr>
					  <tr align="center" >
					    <td colspan="2" rowspan="3">Address</td>
					    <td nowrap="nowrap" colspan="3">Home Address</td>
					    <td nowrap="nowrap" colspan="4" align="left"><input type="text" name="address1" value="<?php echo $rvalue[7];?>" size="50"/></td>
					  </tr>
					  <tr align="center">
					    <td nowrap="nowrap" colspan="3">Contact Address</td>
					    <td nowrap="nowrap" colspan="4" align="left"><input type="text" name="address2" value="<?php echo $rvalue[8];?>" size="50" /></td>
					  </tr>
					  <tr align="center">
					    <td nowrap="nowrap" colspan="3">Current Address </td>
					    <td nowrap="nowrap" colspan="4" align="left"><input type="text" name="address3" value="<?php echo $rvalue[9];?>" size="50" /></td>
					  </tr>
					   <tr>
					    <td width="45" rowspan="6"><p align="center">Lecturer Comment </p></td>
					    <td nowrap="nowrap" colspan="10" rowspan="6" >
					    	<?php 
					    	    
					    	    $result = $comment->select_evaluate($_GET['studentID']);
					        	while ($row=mysql_fetch_row($result)){
					        		$No++;
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:14px;'>$row[3]</span><br/>";
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:12px'>Lecturer:";
					        		$r=$comment->select_teacher($row[2]);
					        		echo $r[2];
					        		echo "&nbsp;&nbsp;&nbsp;&nbsp;Date:$row[4]</span><br/>";
					        	}
					    	?>
					    </td>
					  </tr>
					</table>
					<input type="submit" value="Update" />
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
