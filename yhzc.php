<?php
//用户注册
if($_SERVER['REQUEST_METHOD']=="POST"){		
	$jwt=$_SERVER['HTTP_TOKEN'];
	include("admin/validate.php");
	if(validate($jwt)=="success"){
	    @$yhName=$_POST['yhName'];
        @$yhpwd=md5($_POST['yhpwd']);
	    @$yhpwd2=md5($_POST['yhpwd2']);
	    include("conn.php");
		if($yhpwd == $yhpwd2){
			$flag=mysql_query("insert into yhxxs(yhName,yhpwd) values('$yhName','$yhpwd')");
	        if($flag){
	            echo '{"status":"10001","msg":"success"}';	
	        }else{
	            echo '{"status":"20001","msg":"用户注册失败，请联系管理员"';
	        }   
	    }else{
			echo '<script>alert("两次密码不一致");location.href="yhzc.html";</script>';
		}
	}
}else{
  echo 'header("error.php");';
}
?>