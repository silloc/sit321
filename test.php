<?php
   
if($_POST['name']=="admin" && $_POST['pass']=="admin")
{
    echo "1:登录成功";
    
}else{
   echo "0:登录失败";
   
}


?>