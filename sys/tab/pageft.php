<?php

//Ϊ�˱����ظ������ļ�����ɴ��󣬼����жϺ����Ƿ���ڵ�������
if(!function_exists(pageft)){
	//���庯��pageft(),���������ĺ���Ϊ��
	//$totle����Ϣ������
	//$displaypg��ÿҳ��ʾ��Ϣ������������ΪĬ����20��
	//$url����ҳ�����е����ӣ����˼��벻ͬ�Ĳ�ѯ��Ϣ��page����Ĳ��ֶ������URL��ͬ��
	//������Ĭ��ֵ������Ϊ��ҳURL����$_SERVER["REQUEST_URI"]����������Ĭ��ֵ���ұ�ֻ��Ϊ���������Ը�Ĭ��ֵ��Ϊ���ַ������ں����ڲ�������Ϊ��ҳURL��
	function pageft($totle,$displaypg=20,$url=''){

		//���弸��ȫ�ֱ�����
		//$page����ǰҳ�룻
		//$firstcount�������ݿ⣩��ѯ����ʼ�
		//$pagenav��ҳ�浼�������룬�����ڲ���û�н��������
		//$_SERVER����ȡ��ҳURL��$_SERVER["REQUEST_URI"]�������롣
		global $page,$firstcount,$pagenav,$_SERVER,$page_nav,$page_first,$page_up,$page_next,$page_last;
		
		//Ϊʹ�����ⲿ���Է�������ġ�$displaypg��������Ҳ��Ϊȫ�ֱ�����ע��һ���������¶���Ϊȫ�ֱ�����ԭֵ�����ǣ���������������¸�ֵ��
		$GLOBALS["displaypg"]=$displaypg;
		if(!$page) $page=1;
		//���$urlʹ��Ĭ�ϣ�����ֵ����ֵΪ��ҳURL��
		if(!$url){ 
			$url=$_SERVER["REQUEST_URI"];
		}
		//URL������
		$parse_url=parse_url($url);
		$url_query=$parse_url["query"]; //����ȡ��URL�Ĳ�ѯ�ִ�
		if($url_query){
			//��ΪURL�п��ܰ�����ҳ����Ϣ������Ҫ����ȥ�����Ա�����µ�ҳ����Ϣ��
			//�����õ���������ʽ����ο���PHP�е�������ʽ��
			$url_query=ereg_replace("(^|&)page=$page","",$url_query);
			//��������URL�Ĳ�ѯ�ִ��滻ԭ����URL�Ĳ�ѯ�ִ���
			$url=str_replace($parse_url["query"],$url_query,$url);
			//��URL���page��ѯ��Ϣ��������ֵ��
			if($url_query) {
				$url.="&page"; 
			}else {
				$url.="page";
			}
		}else {
			$url.="?page";
		}
		
		//ҳ����㣺
		
		$lastpg=ceil($totle/$displaypg); //���ҳ��Ҳ����ҳ��
		$page=min($lastpg,$page);
		$prepg=$page-1; //��һҳ
		$nextpg=($page==$lastpg ? 0 : $page+1); //��һҳ
		if($page==0){
			$firstcount=$page*$displaypg;
		}else {
			$firstcount=($page-1)*$displaypg;
		}
		
		//��ʼ��ҳ���������룺
		$page_nav = "Total {$totle} Records,You Are In Page ".$page."/{$lastpg}, {$displaypg} Records Every Page ";
		$pagenav="��ʾ�� <B>".($totle?($firstcount+1):0)."</B>-<B>".min($firstcount+$displaypg,$totle)."</B> ����¼���� $totle ����¼";
		$page_first = " <a href='$url=1'><img src='images/first.gif' width='37' height='15' /></a>";
		if($prepg && $prepg>=0) {
			$page_up="<a href='$url=$prepg'><img src='images/back1.gif' width='43' height='15' /></a> "; 
		}else {
			$page_up="<img src='images/back1.gif' width='43' height='15' />";
		}
		if($nextpg){
			$page_next="<a href='$url=$nextpg'><img src='images/next1.gif' width='43' height='15' /></a>";
		}else{
			$page_next="<img src='images/next1.gif' width='43' height='15' />";
		}
		$page_last="<a href='$url=$lastpg'><img src='images/last.gif' width='37' height='15' /></a>";
		//���ֻ��һҳ������������
		if($lastpg<0) {
			return false;
		}
		
		$pagenav.=" <a href='$url=1'>��ҳ</a> ";
		
		
		if($prepg) $pagenav.=" <a href='$url=$prepg'>ǰҳ</a> "; else $pagenav.=" ǰҳ ";
		if($nextpg) $pagenav.=" <a href='$url=$nextpg'>��ҳ</a> "; else $pagenav.=" ��ҳ ";
		$pagenav.=" <a href='$url=$lastpg'>βҳ</a> ";
		
		//������ת�б�ѭ���г�����ҳ�룺
		$pagenav.="������ <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
		for($i=1;$i<=$lastpg;$i++){
			if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n";
			else $pagenav.="<option value='$i'>$i</option>\n";
		}
		$pagenav.="</select> ҳ���� $lastpg ҳ";
		
		
	}
}
?>


<?
/*
//��ǰ������ԣ�
$page=$_GET[page];
include("pageft.php"); //������pageft.php���ļ�
//ȡ������Ϣ��
$result=mysql_query("select * from mytable");
$total=mysql_num_rows($result);
//����pageft()��ÿҳ��ʾ10����Ϣ��ʹ��Ĭ�ϵ�20ʱ������ʡ�Դ˲�������ʹ�ñ�ҳURL��Ĭ�ϣ�����ʡ�Ե�����
pageft($total,10);
//���ڲ�����ȫ�ֱ����������ó��ˣ�
$result=mysql_query("select * from mytable limit $firstcount,$displaypg ");
while($row=mysql_fetch_array($result)){
//���б������ԣ�
}

//�����ҳ���������룺
echo $pagenav;

//����������ԣ�
*/
?>