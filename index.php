
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="./css/style.css">
		<script src="./js/addEvent.js"></script>
		<script>
			window.onload=function(){
				var publish=document.getElementById("publish");
				var s1=document.getElementById("s1");
				publish.onclick=function(){
					alert("请用户注册或登录");
				}
				s1.onclick=function(){
					location.href="yhzc.html";
				}
			}
		</script>
	</head>
	<body>
		<div class="main">
			<div class="top">
				<h1>欢迎来到秃鸡留言板</h1>
				<a href="admin/manage.php">管理员登录</a>
			</div>
			
			
			<div class="left">
				<div class="yh">
					<ul>
						<li><a href="#">浏览留言</a></li>
						<li id="publish"><a>发表留言</a></li>
					</ul>
				</div>
				<div class="yhdl">
					<form action="yhdl.php" method="post">
						<h6>请用户登录:</h6>
					用户名:<input type="text" name="yhName" autocomplete="off"><br>
					密&nbsp;&nbsp;&nbsp;码:<input type="password" name="yhpwd"><br>
					<input type="button" name="zc" id="s1" class="dl" value="注册">
					<input type="submit" name="submit" class="dl" value="登录">
					</form>  
				</div>
				
			</div>
			
			
			<div class="right">
				<?php
				   include("conn.php");
				   $page=@$_GET['page'];
				   if(empty($page)){
				   	$page=1;
				   }
				   if($page<=1){
				   	$page=1;
				   }
				   $rs=mysql_query("select * from message order by addTime desc");
				   // while($info=mysql_fetch_assoc($rs)){
				   mysql_data_seek($rs,($page-1)*6);
				   $rscount=mysql_num_rows($rs);
				   $pagecount=ceil($rscount/6);
				   if($page>=$pagecount){
				   	$page=$pagecount-1;
				   }
				?>
				<?php for($i=1;$i<=6;$i++){
					if($info=mysql_fetch_assoc($rs)){
				?>
				<ul class="message">
					<li class="floor"><?php echo $info['messageId']?>楼&nbsp;<?php echo $info['author']; ?>:[<?php echo $info['title'];?>]</li>
					<li class="content"><?php echo $info['content']; ?></li>
					<?php if(!empty($info['reply'])){ ?>
					    <li class="reply">管理员回复:<?php echo $info['reply']; ?></li>
					<?php } ?>
					<li class="time"><?php echo $info['addTime']; ?></li>
				</ul>
			   <!-- 关闭 -->
				<?php } 
				}
				   mysql_free_result($rs);
				   mysql_close($conn);
				?>

				<div class="page" id="page">
				    <a href="index.php?page=<?php echo 1;?>">首页</a>
				    <a href="index.php?page=<?php echo $page-1;?>">上一页</a> | <a href="index.php?page=<?php echo $page+1;?>">下一页</a>
				    <a href="index.php?page=<?php echo $pagecount;?>">尾页</a>
					<form action="index.php" method="get" autocomplete="off">
					    <input type="text" name="page" size="4" maxlength="4">
					    <input type="submit" name="submit" value="跳转">
				    </form>
				</div>
				
			</div>
		</div>
	</body>
</html>
