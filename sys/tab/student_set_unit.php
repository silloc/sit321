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
	
	
	$studentID=$_GET['studentID'];
	$obj = new student_fun();

				
	

	if($_POST['action']=='add'){
		
		$flag=$obj->select_sid_sforc_cid($studentID, $_POST['gid']);
		if(!$flag){
			
			$obj->add_sforc($studentID, $_POST['gid']);
		}else{
			echo "<script>alert('Unit exited!');</script>";
		}
	}
	if($_GET['action']=='del'){
		
		$a = $obj->del_sforc($studentID,$_GET['gid'],$_GET['id']);
		if($a){
			echo "<script>alert('Unit Deleted!');</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
        <td width="1101" background="images/tab_05.gif"><img src="images/311.gif" width="16" height="16" /> <span class="STYLE4">Unit Mangement</span></td>
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
        <td bgcolor="#f3ffe3">
        <div style="padding-left: 30px; width: 100%; margin-right: 30px;" >
        	<form action="" method="post" style="font-size: 14px; color: #43860C;">
        	<input type="hidden" name="action" value="add" />
        	<label>Add Unit:<select name="gid">
        			<?php
					   $grade_obj = new teacher_fun();
						$gresult=$grade_obj->select_grade(); 
						

						while ($row=mysql_fetch_row($gresult)){
							echo "<option value=$row[0]>$row[1]</option>";
						}
        			?>
        			
        	</select></label>
        	<label><input type="submit" value="Add" /></label>
        	</form>
        	<hr style="" />
        	<table border=1 style="border-color:#9AD452;" cellpadding="0" cellspacing="0">
        		<tr style="font-size: 14px; color: #1F4A65;"><th width="10%" >No.</th><th width="20%">Uint Code</th><th width="20%">Detele</th><th width="10%">No.</th><th width="20%">Unit Code</th><th width="20%">Delete</th></tr>
        		<tbody style="font-size: 12px; " align="center">
        		<?php 
				  
					$result = $obj->select_sfor_grade($studentID);
              
        		   $No=0;
        		   $str="<tr>";
        		   while ($row=mysql_fetch_row($result)){
					   
        		   		$No++;
        		   		$str .="<td>$No</td><td>$row[3]</td><td><a href='./student_set_unit.php?id=$row[0]&gid=$row[2]&action=del&studentID=$studentID'>Detele</a></td>";
        		   		if(($No%2)==0){
        		   			$str .="</tr>";
        		   			echo $str;
        		   			$str = "<tr>";
        		   		}
        		   	
        		   }
        		   if($No%2!=0){
        		   	 echo  $str."<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
        		   }
        		
        		?>
        		</tbody>
        	</table>
        </div>
        </td>
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
