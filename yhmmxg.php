<?php
//用户密码修改
if($_SERVER['REQUEST_METHOD']=="POST"){		
	$jwt=$_SERVER['HTTP_TOKEN'];
	include("admin/validate.php");
	if(validate($jwt)=="success"){
	    @$yhName=$_POST['yhName'];
	    @$yhpwd=md5($_POST['yhpwd']);
	    @$yhpwd1=md5($_POST['yhpwd1']);
	    include("conn.php");
		if(!empty($yhName)){
		    if($yhpwd==$yhpwd1){
	            $flag=mysql_query("update yhxxs set yhpwd='$yhpwd' where yhName='$yhName'");
	            if($flag){
	               echo '{"status":"10001","msg":"success"}';	
	            }else{
	               echo '{"status":"20001","msg":"修改失败，请联系管理员"';
	            }
		    }else{
		    	echo '<script>alert("两次输入密码不一致");location.href="yhmmxg.html";</script>';
		    }
		}
	}
}else{
  echo 'header("error.php");';
}	
?>

