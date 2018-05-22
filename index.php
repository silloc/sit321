<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>SARMS</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
.STYLE3 {color: #528311; font-size: 12px; }
.STYLE4 {
	color: #42870a;
	font-size: 12px;
}
-->
</style>
<script type="text/javascript" src="./js/jquery-1.9.0.js"></script>
<script type="text/javascript">
	function login(){
		var flag=true;
		var uname=$("#username").val();
		var upass=$("#password").val();
	    if(uname==""){
		  alert("Please enter username!");
		  $("#username").focus();
		  return(flag=false);
		}
	    if(upass==""){
		  alert("Please enter password!");
		  $("#password").focus();
		  return(flag=false);
		}
		return flag;
	 }
	 function reset(){
		 $("#username").val("");
		 $("#password").val("");
	 }
</script>
</head>

<body>
<form action="chacklogin.php" method="post" onSubmit="return login()">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#e5f6cf">&nbsp;</td>
  </tr>
  <tr>
    <td height="608" background="images/login_03.gif"><table width="862" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="266" background="images/login_04.gif">&nbsp;</td>
      </tr>
      <tr>
        <td height="95">
		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="424" height="95" background="images/login_06.gif">&nbsp;</td>
            <td width="183" background="images/login_07.gif">
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td  height="30"><div align="center"><span class="STYLE3">User Name</span></div></td>
					<td height="30"><input type="text" id="username" name="username"  style="height:18px; width:130px; border:solid 1px #cadcb2; font-size:12px; color:#81b432;"></td>
				  </tr>
				  <tr>
					<td height="30"><div align="center"><span class="STYLE3">Password</span></div></td>
					<td height="30"><input type="password" id="password" name="password"  style="height:18px; width:130px; border:solid 1px #cadcb2; font-size:12px; color:#81b432;"></td>
				  </tr>
				  <tr>
					<td height="30">&nbsp;</td>
					<td height="30"><input type="image" src="images/dl1.gif" width="41" height="22" border="0"><input type="image" src="images/tc.gif" width="41" height="22" border="0" onclick="reset()">
					  <!--  <img src="images/dl.gif" width="81" height="22" border="0" usemap="#Map">-->
					</td>
				  </tr>
				</table>
				
			  </td>
            <td width="255" background="images/login_08.gif">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="247" valign="top" background="images/login_09.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="22%" height="30">&nbsp;</td>
            <td width="56%">&nbsp;</td>
            <td width="22%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="44%" height="20">&nbsp;</td>
                <td width="56%" class="STYLE4">Version 2018 v1.0</td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#a2d962">&nbsp;</td>
  </tr>
</table>

<map name="Map"><area shape="rect" coords="3,3,36,19" href="#" onclick="login()"><area shape="rect" coords="40,3,78,18" href="#" onclick="alert(2)"></map>
 </form>
</body>
</html>
