<?php 
include("conn.php");
$author=$_POST['author'];
$face=$_POST['face'];
$title=$_POST['title'];
$content=$_POST['content'];
$flag=mysql_query("insert into message(author,face,title,content,addTime) values('$author','$face','$title','$content',now())");
if($flag){
	echo '<script>alert("恭喜你,发布成功!");location.href="index.php";</script>';
}else{
	echo '<script>alert("很抱歉,发布失败!");location.href="index.php";</script>';
}

mysql_close($conn);
?>