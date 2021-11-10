<?php session_start();?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="../style.css">
</head>
<body> 
	 <?php if($_SESSION['login']=='success'){ ?>
	 <div class="main">
	欢迎<span class="admin">[<?php echo $_SESSION['userName'];?>]</span>管理员进入!
	 <h1>小花留言板</h1>
	 <?php 
	    include("../conn.php");
	    $rs=mysql_query("select * from message order by addTime desc");
	    //遍历
	    while($info=mysql_fetch_assoc($rs)){
	 ?>
	    <ul class="message">
	 	   <!-- "头像" "作者"在"什么时候" -->
	 	   <li> 
	 	      <img src="../images/face/<?php echo $info['face']?>" width="40">[<?php echo $info['author']; ?>]在<?php echo $info['addTime']; ?>
	 		  
	 	   </li>
	 	   
	 	   <!-- 标题 -->
	 	   <li><?php echo $info['title']; ?></li>
	 	   
	 	   <!-- 内容 -->
	 	   <li><?php echo $info['content']; ?></li>
	 	   
	 	   <!-- 管理员回复 -->
	 	   <?php if(!empty($info['reply'])){ ?>
	 	       <li class="reply">管理员回复:<?php echo $info['reply']; ?></li>  
	 	   <?php }else{ ?>
		       <li><a href="reply.php?messageId=<?php echo $info['messageId']?>">管理员回复:</a>
			   </li>
		   <?php } ?>
		   
		   <!-- 删除留言 -->
			<li class="delete">
				<a href="delete.php?messageId=<?php echo $info['messageId']?>">删除留言</a>
			</li>
			   
			<!-- 审核留言 -->
			<?php if($info['sh']==0){?>
				<li>
				 <a href="review.php?messageId=<?php echo $info['messageId'] ?>">审核</a>
				</li>
			<?php }else{
				echo "已审核"; ?>
			<?php }?>
	    </ul>
	    
	    <!-- 关闭 -->
	 <?php } 
	    mysql_free_result($rs);
	    mysql_close($conn);
	 ?>
	 </div>
	 <?php }else{
		 echo '<script>location.href="error.php";</script>';
	 }?>
</body>
</html>