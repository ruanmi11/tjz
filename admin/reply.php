<?php session_start();?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
		.main{
			width: 1200px;
			height: 704px;
			/* border: 3px solid red ; */
			margin: 0px auto;
			background-image:url(../images/bg.jpg);
			opacity: 0.6;
			font-size: 25px;
			position: relative;
		}
		.publish{
			/* border: 2px solid black; */
			width: 360px;
			height: 230px;
			position: absolute;
			top: 150px;
			left: 32%;
			background-color: antiquewhite;
			text-align: center;
			padding: 20px;
		}
		.login input{
			height: 30px;
		}
		h3{
			/* background-color: #FFFF00; */
			width: 210px;
			position: relative;
			left: 39%;
		}
	</style>
</head>
<body>
	<div class="main">
		<h3>管理员回复留言</h3>
	<?php if($_SESSION['login']=='success'){ 
	   $messageId=$_GET['messageId'];
	   if(!empty($messageId)){ ?>
		   <div class="publish">
		      <form action="reply_chuli.php" method="post">
			      管理员回复:
			      <textarea cols="40" rows="10" name="reply"></textarea><br>
			      <input type="hidden" name="messageId" value="<?php echo $messageId; ?>">
			      <input type="submit" name="submit" value="回复留言">
		      </form>
		   </div>
	<?php }else{
		echo '<script>alert("回复失败,参数不正确或为空");location.href="user.php";</script>';
	} ?>
	
	<?php }else{
		echo '<script>location.href="../error.php";</script>';
	} ?>
	</div>
</body>
</html>