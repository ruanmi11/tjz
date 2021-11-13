<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$jwt=$_SERVER['HTTP_TOKEN'];
		include("validate.php");
		if(validate($jwt)=="success"){
		   @$messageId=$_POST['messageId'];
		    include("../conn.php");
		    $flag=mysql_query("delete from message where messageId='$messageId'");
		  if($flag){
		    echo '{"status":"10001","msg":"success"}';	
		   }else{
		     echo '{"status":"20001","msg":"删除失败，请联系管理员"';
		   }
		}
	}else{
	  echo 'header("error.php");';
	}	
?>