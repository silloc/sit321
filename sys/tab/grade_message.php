<?php
    session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	include_once './user_fun.php';
	$obj = new user_fun();
	if($_GET['action']=='del'){
		$obj->del_gradeById($_GET['id']);
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
<script type="text/JavaScript" src="../../js/jquery-1.9.0.js"></script>
<script type="text/JavaScript" >
	var  highlightcolor='#eafcd5';
	//&#27492;&#22788;clickcolor&#21482;&#33021;&#29992;win&#31995;&#32479;&#39068;&#33394;&#20195;&#30721;&#25165;&#33021;&#25104;&#21151;,&#22914;&#26524;&#29992;#xxxxxx&#30340;&#20195;&#30721;&#23601;&#19981;&#34892;,&#36824;&#27809;&#25630;&#28165;&#26970;&#20026;&#20160;&#20040;:(
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

	function add_grade(){
		var h = ($(window).height()-80)/2;
		var w = ($(window).width()-360)/2;
		//alert(11111);
		//window.open('./grade_add.php','','height=500,width=600,scrollbars=yes,status =yes');
		window.open('./grade_add.php','newwindow','height=100,width=400,top='+h+',left='+w+',toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
	}

	function modify_grade(id){
		var h = ($(window).height()-80)/2;
		var w = ($(window).width()-360)/2;
		//alert(11111);
		//window.open('./grade_add.php','','height=500,width=600,scrollbars=yes,status =yes');
		window.open('./grade_modify.php?id='+id+'','newwindow','height=100,width=400,top='+h+',left='+w+',toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no'); 
	}
	
</script>
<script type="text/JavaScript">
	$(document).ready(function(){
		
	});
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30">
    <!-- &#26631;&#39064; START -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              <td width="60">
              <table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="images/001.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center"><a href="#" onclick="add_grade()">Add</a></div></td>
                  </tr>
              </table>
              </td>
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
    </table>
    <!-- &#26631;&#39064; END -->
    </td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9" background="images/tab_12.gif">&nbsp;</td>
        <td bgcolor="#f3ffe3">
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="8%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">No.</div></td>
            <td width="24%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2 STYLE1">Unit Name</div></td>
     
            <td width="7%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">Edit</div></td>
            <td width="7%" height="18" background="images/tab_14.gif" class="STYLE1"><div align="center" class="STYLE2">Delete</div></td>
          </tr>
          
          <?php 
            $page=$_GET['page'];
			include_once 'pageft.php';//&#21253;&#21547;“pageft.php”&#25991;&#20214;
			//&#21462;&#24471;&#24635;&#20449;&#24687;&#25968;
			$result=mysql_query("select * from grade");
			$total=mysql_num_rows($result);
			//&#35843;&#29992;pageft()&#65292;&#27599;&#39029;&#26174;&#31034;10&#26465;&#20449;&#24687;&#65288;&#20351;&#29992;&#40664;&#35748;&#30340;20&#26102;&#65292;&#21487;&#20197;&#30465;&#30053;&#27492;&#21442;&#25968;&#65289;&#65292;&#20351;&#29992;&#26412;&#39029;URL&#65288;&#40664;&#35748;&#65292;&#25152;&#20197;&#30465;&#30053;&#25481;&#65289;&#12290;
			$cont=$total;
			pageft($cont,25);
			//&#29616;&#22312;&#20135;&#29983;&#30340;&#20840;&#23616;&#21464;&#37327;&#23601;&#27966;&#19978;&#29992;&#22330;&#20102;&#65306;
			$result=mysql_query("select * from grade limit $firstcount,$displaypg" );
			$Number=0;
			while($row=mysql_fetch_row($result)){
			//&#65288;&#21015;&#34920;&#20869;&#23481;&#30053;&#65289;
			$Number++;
			 echo "
			  	<tr>
	            <td height='18' bgcolor='#FFFFFF' class='STYLE2'><div align='center' class='STYLE2 STYLE1'>$Number</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center' class='STYLE2 STYLE1'>$row[1]</div></td>
	            <td height='18' bgcolor='#FFFFFF'><div align='center'>
	            	<img src='images/037.gif' width='9' height='9' /><span class='STYLE1'> [</span><a href='javascript:void(0);' onclick=\"modify_grade(".$row[0].")\" >Edit</a><span class='STYLE1'>]</span></div></td>
	           <td height='18' bgcolor='#FFFFFF'><div align='center'>
	           			<span class='STYLE2'><img src='images/010.gif' width='9' height='9' /></span><span class='STYLE1'>[</span><a href=\"javascript:if(confirm('Confirm Detele?'))location ='./grade_message.php?id=$row[0]&action=del'; \">Delete</a><span class='STYLE1'>]</span></div></td>
	            
	             </tr>
	          ";
			}
			
			//&#36755;&#20986;&#20998;&#39029;&#23548;&#33322;&#26465;&#20195;&#30721;&#65306;
			
          
          ?>
          
        </table></td>
        <td width="9"  background="images/tab_16.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="29">
    <!-- &#24213;&#36793; S -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="29"><img src="images/tab_20.gif" width="15" height="29" /></td>
        <td background="images/tab_21.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" height="29" nowrap="nowrap"><span class="STYLE1"><?php echo $page_nav;?></span></td>
            <td width="75%" valign="top" class="STYLE1">
	            <div align="right">
	            
	              <table width="352" height="20" border="0" cellpadding="0" cellspacing="0">
	                <tr>
	                  <td width="62" height="22" valign="middle"><div align="right"><?php echo $page_first;?></div></td>
	                  <td width="50" height="22" valign="middle"><div align="right"><?php echo $page_up;?></div></td>
	                  <td width="54" height="22" valign="middle"><div align="right"><?php echo $page_next;?></div></td>
	                  <td width="49" height="22" valign="middle"><div align="right"><?php echo $page_last;?></div></td>
	                  <td width="59" height="22" valign="middle"><div align="right"></div></td>
	                  <td width="25" height="22" valign="middle"><span class="STYLE7">
	                   <!--  <input name="textfield" type="text" class="STYLE1" style="height:10px; width:25px;" size="5" /> -->
	                  </span></td>
	                  <td width="23" height="22" valign="middle"></td>
	                  <td width="30" height="22" valign="middle"><!--  <img src="images/go.gif" width="37" height="15" />--></td>
	                </tr>
	              </table>
	           
	            </div>
	         </td>
          </tr>
        </table></td>
        <td width="14"><img src="images/tab_22.gif" width="14" height="29" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

