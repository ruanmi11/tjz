<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
		span{
			color: #f00;
		}
	</style>
</head>
<body>
	发生错误,系统将在<span id="tips">3</span>秒后返回登录界面!
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