<?php
	 header("Content-type:application/vnd.ms-excel");
	 header("Content-Disposition:filename=phpexcel.xls");
	 
	session_start();
	error_reporting(0);
	if($_SESSION["uid"]=="" ||$_SESSION["uname"]=="" || $_SESSION["upass"]=="" ||$_SESSION["urole"]==""){
		 echo "<script>window.location.href='../../index.php';</script>";
		 exit();
	}
	include_once '../../config/conn.php';
	
	$id = $_GET['id'];
	$uid = $_GET['uid'];
	$query = "select * from student where id=".$id;
	$result = mysql_query($query);
	$rvalue = mysql_fetch_row($result);
?>


<table border="1" cellspacing="0" cellpadding="0" width="527">
					  <tr>
					    <td width="45" nowrap="nowrap"><p align="center">���� </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[4];?> </p></td>
					    <td width="57" nowrap="nowrap"><p align="center">ѧ�� </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center"><?php echo $rvalue[3];?></p></td>
					    <td width="62" nowrap="nowrap"><p align="center">ѧ���� </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[2];?></p></td>
					  </tr>
					  <tr>
					    <td width="45" nowrap="nowrap"><p align="center">�༶ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center">
					    <?php 
					      if($rvalue[5]!=null ||$rvalue[5]!=0){
					    	$gname = "select * from grade where id=".$rvalue[5];
					    	$gresult = mysql_query($gname);
					    	$grow = mysql_fetch_row($gresult);
					    	if($grow){
					    		echo $grow[1];
					    	}
					      }
					    ?>
					    </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center">��ϵ�绰 </p></td>
					    <td nowrap="nowrap" colspan="2"><p align="center"><?php echo $rvalue[6];?> </p></td>
					  </tr>
					  <tr>
					    <td colspan="2" rowspan="3"><p align="center">��ַ </p></td>
					    <td nowrap="nowrap" colspan="3"><p align="center">��ͥסַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[7];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="3"><p align="center">ͨѶ��ַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[8];?> </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="3"><p align="center">��ס��ַ </p></td>
					    <td nowrap="nowrap" colspan="6"><p align="center"><?php echo $rvalue[9];?> </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="11"><p align="center">��ͥ״�� </p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="2"><p align="center">����ϵ </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center">���� </p></td>
					    <td nowrap="nowrap" colspan="4"><p align="center">������λ�����ţ�ְ�� </p></td>
					    <td width="109" nowrap="nowrap"><p align="center">��ϵ��ʽ </p></td>
					  </tr>
					  <?php 
					  		if($uid == $rvalue[1]){
						  		$query = "select * from home where user_id=".$uid;
						  		$result = mysql_query($query);
						  		while($row=mysql_fetch_row($result)){
						  			echo "
						  				  <tr>
										    <td nowrap='nowrap' colspan='2'><p align='center'>$row[2]</p></td>
										    <td nowrap='nowrap' colspan='4'><p align='center'>$row[3]</p></td>
										    <td nowrap='nowrap' colspan='4'><p align='center'>$row[4]</p></td>
										    <td width='109' nowrap='nowrap'><p align='center'>$row[5]</p></td>
										  </tr>
						  				";
						  		}
					  		}
					  		
					  
					  ?>
					  <tr>
					    <td nowrap="nowrap" colspan="11"><p align="center">����״�� </p></td>
					  </tr>
					  <?php 
					  		//��ѯhealth���е�����
					  		if($uid == $rvalue[1]){
						  		$query = "select * from health where user_id=".$uid;
								$result = mysql_query($query);
								$row = mysql_fetch_row($result);
					  		}
					  
					  ?>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">���CM</p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[2];?> </p></td>
					    <td width="87" nowrap="nowrap"><p align="center">����KG</p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[3];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">��ΧCM</p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[4];?></p></td>
					    <td width="87" nowrap="nowrap"><p align="center">�λ���ml</p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[5];?></p></td>
					  </tr>
					  <tr>
					    <td nowrap="nowrap" colspan="4"><p align="center">������ </p></td>
					    <td nowrap="nowrap" colspan="5"><p align="center"><?php echo $row[6];?></p></td>
					    <td width="87" nowrap="nowrap"><p align="center">������ </p></td>
					    <td width="109" nowrap="nowrap"><p align="center"><?php echo $row[7];?></p></td>
					  </tr>
					  <tr>
					    <td width="45" rowspan="6"><p align="center">��ʦ���� </p></td>
					    <td nowrap="nowrap" colspan="10" rowspan="6" >
					    	<?php 
					    	    //��ѯ����ʾ����
					    	?>
					    </td>
					  </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
					  <tr> </tr>
					</table>
            	</div>
            </td>
          </tr>
          
</table>