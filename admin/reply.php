<?php session_start();?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
</head>
<body>
	<?php if($_SESSION['login']=='success'){ 
	   $messageId=$_GET['messageId'];
	   if(!empty($messageId)){ ?>
		   <form action="reply_chuli.php" method="post">
			   管理员回复:
			   <textarea cols="40" rows="10" name="reply"></textarea><br>
			   <input type="hidden" name="messageId" value="<?php echo $messageId; ?>">
			   <input type="submit" name="submit" value="回复留言">
		   </form>
		   
	<?php }else{
		echo '<script>alert("回复失败,参数不正确或为空");location.href="manage.php";</script>';
	} ?>
	
	<?php }else{
		echo '<script>location.href="error.php";</script>';
	} ?>
</body>
</html>