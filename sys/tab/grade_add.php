<?php
	include_once '../../config/testSession.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Add Unit</title>
</head>
<body>
	<form action="grade_fun.php" method="post">
		<input type="hidden" name="action_add" value="grade_add" />
		<label>Unit Name&#65306;<input type="text" value="" name="gname" /></label>
		<label><input type="submit" value="Add"/></label>
	</form>

</body>
</html>