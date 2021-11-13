<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$jwt=$_SERVER['HTTP_TOKEN'];
	include("validate.php");
	if(validate($jwt)=="success"){
		   @$messageId=$_POST['messageId'];
		   @$reply=$_POST['reply'];
		    include("../conn.php");
		    $flag=mysql_query("update message set reply='$reply' where messageId='$messageId'");
		  if($flag){
		    echo '{"status":"10001","msg":"success"}';	
		   }else{
		     echo '{"status":"20001","msg":"回复失败，请联系管理员"';
		   }
		}
	}else{
	  echo 'header("error.php");';
	}
?>