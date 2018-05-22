<?php
	/**
	 * 
	 * 
	 * */
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './user_fun.php';
	$obj = new user_fun();
	$result=$obj->select_uname($_SESSION['uid']);
	$row = mysql_fetch_row($result);
	
	if($_POST['action']=='change'){
		$flag = $obj->chack_pass(md5($_POST['oldpass']), $_SESSION['uid']);
		if($flag){
			$obj->update_pass($_SESSION['uid'],md5($_POST['newpass']));
		}else{
			echo "<script>alert('Old password worng！');</script>";
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
<script type="text/javascript" src="../../js/jquery-1.9.0.js"></script>
<script type="text/javascript">
	 function CheckForm(){
		var flag=true;
		var oldpass=$("#oldpass").val();
		var newpass=$("#newpass").val();
		var npass=$("#npass").val();
	    if(oldpass==""){
		  alert("Old pasword can not be null！");
		  $("#oldpass").focus();
		  return(flag=false);
		}
	    if(newpass==""){
			  alert("New pasword can not be null！");
			  $("#newpass").focus();
			  return(flag=false);
		}
	    if(npass==""){
			  alert("Pasword can not be null！");
			  $("#npass").focus();
			  return(flag=false);
		}
		if(newpass!=npass){
			 alert("Password not match！");
			 return(flag=false);
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
        <td width="75%" background="images/tab_05.gif"><img src="images/311.gif" width="16" height="16" /> <span class="STYLE4">Change Password</span></td>
        <td width="25%" background="images/tab_05.gif"><table border="0" align="right" cellpadding="0" cellspacing="0">
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
       		<div style="height: 200px; padding-left: 100px; font-size: 14px;">
       			<form action="" method="post" onsubmit="return CheckForm();" style="color: #43860C; font-size: 14px;">
       				<input type="hidden" name="action" value="change" />
       				<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>"  />
       				<label>User Name:<strong style="color: red;"><?php echo $row[1];?></strong></label><br />
       				<label>Old Password:<input type="password" id="oldpass" name="oldpass"/></label>&nbsp;&nbsp;<span style="font-size: 12px;color: red;">Please contact admin if you forgot password</span><br />
       				<label>New Password:<input type="password" id="newpass" name="newpass"/></label><br />
       				<label>Confirm Password:<input type="password" id="npass" name="npass" /></label><br />
       				<label><input type="submit" value="Submit" /></label><br />
       			</form>
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
