<?php
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	
	$id = $_GET['id'];
	$query = "select * from health where user_id=".$id;
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
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
            <td width="6%" height="26" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">身体状况</div></td>
           
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF" class="STYLE2">
            	<div align="center" class="STYLE2 STYLE1">
            	 <table border="1" style="border-color:#C0DE98; " cellspacing="0" cellpadding="0" width="483">
				  <tr>
				    <td width="114" nowrap="nowrap"><p align="center">身高CM</p></td>
				    <td width="113" nowrap="nowrap"><p align="center"><?php echo $row[2];?></p></td>
				    <td width="113" nowrap="nowrap"><p align="center">体重KG</p></td>
				    <td width="142" nowrap="nowrap"><p align="center"><?php echo $row[3];?></p></td>
				  </tr>
				  <tr>
				    <td width="114" nowrap="nowrap"><p align="center">胸围CM</p></td>
				    <td width="113" nowrap="nowrap"><p align="center"><?php echo $row[4];?></p></td>
				    <td width="113" nowrap="nowrap"><p align="center">肺活量ml</p></td>
				    <td width="142" nowrap="nowrap"><p align="center"><?php echo $row[5];?></p></td>
				  </tr>
				  <tr>
				    <td width="114" nowrap="nowrap"><p align="center">视力左 </p></td>
				    <td width="113" nowrap="nowrap"><p align="center"><?php echo $row[6];?></p></td>
				    <td width="113" nowrap="nowrap"><p align="center">视力右 </p></td>
				    <td width="142" nowrap="nowrap"><p align="center"><?php echo $row[7];?></p></td>
				  </tr>
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
