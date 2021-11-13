<?php
//用户留言发布

if($_SERVER['REQUEST_METHOD']=='POST'){
	$jwt=$_SERVER['HTTP_TOKEN'];
	include("admin/validate.php");
	if(validate($jwt)=="success"){
		@$author=$_POST['author'];
		@$title=$_POST['title'];
		@$content=$_POST['content'];
		include("../conn.php");
		$flag=mysql_query("insert into message(author,title,content,addTime) values('$author','$title','$content',now())");
		if($flag){
			echo '{"status":"10001","msg":"success"}';
		}else{
			echo '{"status":"20001","msg":"发布留言失败，请联系管理员"';
		}
	}
}else{
	echo 'header("error.php");';
}
?>

