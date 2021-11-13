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
		.login{
			/* border: 2px solid black; */
			width: 360px;
			height: 150px;
			position: absolute;
			top: 200px;
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
			width: 180px;
			position: relative;
			left: 39%;
		}
		.dl{
			width: 80px;
			height: 30px;
			font-size: 18px;
			margin-top: 20px;
			margin-left: 30px;
		}
	</style>
</head>
<body>
<?php 
$userName=@$_COOKIE['userName'];
$pwd=@$_COOKIE['pwd'];
if(!empty($userName) and !empty($pwd)){
	include("../conn.php");
	$rs=mysql_query("select * from users where userName='$userName' and pwd='$pwd'");
	$num=mysql_num_rows($rs);
	if($num>0){
	   $_SESSION['login']='success';
	   $_SESSION['userName']=$userName;
	   echo '<script>location.href="user.php";</script>';
    }
}
?>
	<div class="main">
		<h3>请管理员登录</h3>
	    <form action="check.php" method="post">
			<div class="login" id="login">
		        用户名:<input type="text" name="userName" autocomplete="off"><br>
		        密&nbsp;&nbsp;&nbsp;码:<input type="password" name="pwd"><br>
				<input type="checkbox" name="info" value="yes">是否保存十天信息<br>
		        <input type="submit" name="submit" value="登录" class="dl">
			</div>
	    </form>
	</div>
</body>
</html>