<?php 
session_start();
if($_SESSION['login']=='success'){
	$messageId=$_POST['messageId'];
	$reply=$_POST['reply'];
	if(!empty($messageId) and !empty($reply)){
		include("../conn.php");
		$flag=mysql_query("update message set reply='$reply' where messageId='$messageId'"); 
		if($flag){ 
			echo '<script>alert("回复成功!");location.href="manage.php";</script>';
		}else{
			echo '<script>alert("回复失败,请联系管理员!");location.href="manage.php";</script>';
		}
	}else{
		echo '<script>alert("回复失败,参数不正确或参数为空!");</script>';
	}
	
	mysql_close($conn);
}else{
	header("location:error.php");
}
?>