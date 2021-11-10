<?php 
session_start();
if($_SESSION['login']=='success'){
	$messageId=$_GET['messageId'];
	if(!empty($messageId)){
		include("./conn.php");
		$flag=mysql_query("updare message set sh=1 where messageId='$messageId'");
		if($flag){
			echo '<script>alert("审核成功!");location.href="manage.php";</script>';
		}else{
			echo '<script>alert("审核失败,请联系管理员!");location.href="manage.php";</script>';
		}
	}else{
		echo '<script>alert("审核失败,参数不正确或参数为空!");</script>';
	}
	
	mysql_close($conn);
}else{
	header("location:error.php");
}
?>