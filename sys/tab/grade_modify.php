<?php
	include_once '../../config/conn.php';
	include_once '../../config/testSession.php';
	$id = $_GET['id'];
	$sql = "select * from grade where id=".$id;
	$rs = mysql_query($sql);
	$result = mysql_fetch_array($rs);
	if($result){
		$gid = $result[0];
		$value = $result[1];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modify Unit</title>
</head>
<body>
	<form action="grade_fun.php" method="post">
		<input type="hidden" name="action_modify" value="grade_modify" />
		<input type="hidden" name="gid" value=" <?php echo $gid;?> " />
		<label>Unit Name:<input type="text" value="<?php echo $value;?>" name="gname" /></label>
		<label><input type="submit" value="Update"/></label>
	</form>

</body>
</html>