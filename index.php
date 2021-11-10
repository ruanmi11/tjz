<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="style.css">
	<script src="public.js"></script>
</head>
<body>
	<div class="main">
	<h1>小花留言板</h1>
	<?php 
	   include("conn.php");
	   $rs=mysql_query("select * from message where sh=1 order by addTime desc");
	   //遍历
	   while($info=mysql_fetch_assoc($rs)){
	?>
	   <ul class="message">
		   <!-- "头像" "作者"在"什么时候" -->
		   <li> 
		      <img src="images/face/<?php echo $info['face']?>" width="40">[<?php echo $info['author']; ?>]在<?php echo $info['addTime']; ?>
		   </li>
		   
		   <!-- 标题 -->
		   <li><?php echo $info['title']; ?></li>
		   
		   <!-- 内容 -->
		   <li><?php echo $info['content']; ?></li>
		   
		   <!-- 管理员回复 -->
		   <?php if(!empty($info['reply'])){ ?>
		       <li class="reply">管理员回复:<?php echo $info['reply']; ?></li>
		   <?php } ?>
	   </ul>
	   
	   <!-- 关闭 -->
	<?php } 
	   mysql_free_result($rs);
	   mysql_close($conn);
	?>
	
	
	
	   <!-- 发布留言 -->
	   <form action="leave_message.php" method="post" name="leavemessage">
		   作者:<input type="text" name="author" autocomplete="off"><br>
		   头像:
		   <select name="face" id="face">
		   <?php for($i=1;$i<=42;$i++){ ?>
		       <option value="<?php echo $i.".gif" ?>"><?php echo $i.".gif"?>
		   <?php } ?>
		   </select>
		   <img src="images/face/1.gif" id="img1" width="40"><br>
		   
		   标题:<input type="text" name="title"><br>
		   内容:<textarea name="content" rows="10" cols="40"></textarea><br>
		   <input type="submit" name="submit" value="发表留言">
		   
	   </form>
	</div>
</body>
</html>
