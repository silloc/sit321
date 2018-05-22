<?php
/*
 * Created on 2007-6-8
 * Programmer : Alan , Msn - haowubai@hotmail.com
 * KeBeKe.com Develop a project PHP - MySQL - Apache
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//为了避免重复包含文件而造成错误，加了判断函数是否存在的条件：
if(!function_exists(pageft)){
	//定义函数pageft(),三个参数的含义为：
	//$totle：信息总数；
	//$displaypg：每页显示信息数，这里设置为默认是20；
	//$url：分页导航中的链接，除了加入不同的查询信息“page”外的部分都与这个URL相同。
	//　　　默认值本该设为本页URL（即$_SERVER["REQUEST_URI"]），但设置默认值的右边只能为常量，所以该默认值设为空字符串，在函数内部再设置为本页URL。
	function pageft($totle,$displaypg=20,$url=''){

		//定义几个全局变量：
		//$page：当前页码；
		//$firstcount：（数据库）查询的起始项；
		//$pagenav：页面导航条代码，函数内部并没有将它输出；
		//$_SERVER：读取本页URL“$_SERVER["REQUEST_URI"]”所必须。
		global $page,$firstcount,$pagenav,$_SERVER,$page_nav,$page_first,$page_up,$page_next,$page_last;
		
		//为使函数外部可以访问这里的“$displaypg”，将它也设为全局变量。注意一个变量重新定义为全局变量后，原值被覆盖，所以这里给它重新赋值。
		$GLOBALS["displaypg"]=$displaypg;
		if(!$page) $page=1;
		//如果$url使用默认，即空值，则赋值为本页URL：
		if(!$url){ 
			$url=$_SERVER["REQUEST_URI"];
		}
		//URL分析：
		$parse_url=parse_url($url);
		$url_query=$parse_url["query"]; //单独取出URL的查询字串
		if($url_query){
			//因为URL中可能包含了页码信息，我们要把它去掉，以便加入新的页码信息。
			//这里用到了正则表达式，请参考“PHP中的正规表达式”
			$url_query=ereg_replace("(^|&)page=$page","",$url_query);
			//将处理后的URL的查询字串替换原来的URL的查询字串：
			$url=str_replace($parse_url["query"],$url_query,$url);
			//在URL后加page查询信息，但待赋值：
			if($url_query) {
				$url.="&page"; 
			}else {
				$url.="page";
			}
		}else {
			$url.="?page";
		}
		
		//页码计算：
		
		$lastpg=ceil($totle/$displaypg); //最后页，也是总页数
		$page=min($lastpg,$page);
		$prepg=$page-1; //上一页
		$nextpg=($page==$lastpg ? 0 : $page+1); //下一页
		if($page==0){
			$firstcount=$page*$displaypg;
		}else {
			$firstcount=($page-1)*$displaypg;
		}
		
	//开始分页导航条代码：
		$page_nav = "Total {$totle} Records,You Are In Page ".$page."/{$lastpg}, {$displaypg} Records Every Page ";
		$pagenav="显示第 <B>".($totle?($firstcount+1):0)."</B>-<B>".min($firstcount+$displaypg,$totle)."</B> 条记录，共 $totle 条记录";
		$page_first = " <a href='$url=1'><img src='images/first.gif' width='37' height='15' /></a>";
		if($prepg && $prepg>=0) {
			$page_up="<a href='$url=$prepg'><img src='images/back.gif' width='43' height='15' /></a> "; 
		}else {
			$page_up="<img src='images/back1.gif' width='43' height='15' />";
		}
		if($nextpg){
			$page_next="<a href='$url=$nextpg'><img src='images/next.gif' width='43' height='15' /></a>";
		}else{
			$page_next="<img src='images/next1.gif' width='43' height='15' />";
		}
		$page_last="<a href='$url=$lastpg'><img src='images/last.gif' width='37' height='15' /></a>";
		//如果只有一页则跳出函数：
		if($lastpg<0) {
			return false;
		}
		
		$pagenav.=" <a href='$url=1'>首页</a> ";
		
		
		if($prepg) $pagenav.=" <a href='$url=$prepg'>前页</a> "; else $pagenav.=" 前页 ";
		if($nextpg) $pagenav.=" <a href='$url=$nextpg'>后页</a> "; else $pagenav.=" 后页 ";
		$pagenav.=" <a href='$url=$lastpg'>尾页</a> ";
		
		//下拉跳转列表，循环列出所有页码：
		$pagenav.="　到第 <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
		for($i=1;$i<=$lastpg;$i++){
			if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n";
			else $pagenav.="<option value='$i'>$i</option>\n";
		}
		$pagenav.="</select> 页，共 $lastpg 页";
		
		
	}
}
?>


<?
/*
//（前面程序略）
$page=$_GET[page];
include("pageft.php"); //包含“pageft.php”文件
//取得总信息数
$result=mysql_query("select * from mytable");
$total=mysql_num_rows($result);
//调用pageft()，每页显示10条信息（使用默认的20时，可以省略此参数），使用本页URL（默认，所以省略掉）。
pageft($total,10);
//现在产生的全局变量就派上用场了：
$result=mysql_query("select * from mytable limit $firstcount,$displaypg ");
while($row=mysql_fetch_array($result)){
//（列表内容略）
}

//输出分页导航条代码：
echo $pagenav;

//（后面程序略）
*/
?>