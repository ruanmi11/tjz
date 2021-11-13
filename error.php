<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
	    body{
			background: url(images/errorbg.jpg) no-repeat;
			background-color:#b2b2b2;
		}
		span{
			color: #f00;
		}
		div{
			width: 550px;
			/* border: 1px solid black; */
			font-size: 30px;
			margin-top: 100px;
			margin-left: 400px;
		}
	</style>
</head>
<body>
	<div class="error">发生错误,系统将在<span id="tips">3</span>秒后返回首页!</div>
</body>
<script>
	var tips=document.getElementById("tips");
	var i=2;
	var sid=setInterval(function(){
		tips.innerText=i--;
		if(i==0){
			clearInterval(sid);
			location.href="index.php";
		}
	},1000)
</script>
</html>