<?php session_start();?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>留言发表测试</title>
	<style>
	.main{
		width: 1200px;
		height: 704px;
		/* border: 3px solid red ; */
		margin: 0px auto;
		background-image:url(images/bg.jpg);
		opacity: 0.6;
		font-size: 25px;
		position: relative;
	}
	h3{
		/* background-color: #FFFF00; */
		width: 180px;
		position: relative;
		left: 39%;
	}
	span{
		color: #f00;
	}
	.main .top{
		/* background-color: #008000; */
		font-size: 16px;
		position: relative;
		top: -70px;
		display: inline;
		left: 950px;
	}
	.publish{
		/* border: 2px solid black; */
		width: 400px;
		height: 300px;
		position: absolute;
		top: 80px;
		left: 28%;
		background-color: antiquewhite;
		text-align: left;
		padding: 20px;
	}
	.login input{
		height: 30px;
	}
	</style>
</head>
<body>
	<div class="main">
		<h3>用户发表留言</h3>
		<div class="top">
			欢迎用户[<span><?php echo $_SESSION['yhName'];?></span>]登录&nbsp;&nbsp;|&nbsp;&nbsp;
		    <a href="yhmmxg.html">修改密码</a>
		</div>
	    <form name="leavemessage" action="yhfb2.php" method="post">
		   <div class="publish">
	           作者:<input type="text" name="author" autocomplete="off"><br>
	           标题:<input type="text" name="title" autocomplete="off"><br>
	           内容:<textarea name="content" cols="40" rows="10"></textarea><br>
	           <input type="submit" name="submit" value="发布留言">
			</div>
	    </form>
	 </div>
</body>
</html>