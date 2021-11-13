<?php session_start();?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="../css/user.css">
	<style>
		span{color: #f00;}
	</style>
	<script src="../js/addEvent.js"></script>
</head>
<body> 
	 <?php if($_SESSION['login']=='success'){ ?>
	 <div class="main">
	    <div class="top">
		    <h1>欢迎来到秃鸡留言板</h1>
		    <div class="up"><b>欢迎<span class="admin">[<?php echo $_SESSION['userName'];?>]</span>管理员进入!&nbsp;&nbsp;|&nbsp;&nbsp;<a href="loginout.php">注销</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="safeout.php">安全退出</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../index.php">返回首页</a></b></div>
	    </div>
	 <?php 
	    include("../conn.php");
	    $rs=mysql_query("select * from message order by addTime desc");
		// while($info=mysql_fetch_assoc($rs)){
	 ?>
	    <div class="right">
	    	<?php
	    	   include("../conn.php");
	    	   $page=@$_GET['page'];
	    	   if(empty($page)){
	    	   	$page=1;
	    	   }
	    	   if($page<=1){
	    	   	$page=1;
	    	   }
	    	   $rs=mysql_query("select * from message order by addTime desc");
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
	    		<li class="floor"><?php echo $info['messageId'];?>楼: <?php echo $info['author']; ?></li>
	    		<li class="content"><?php echo $info['content']; ?></li>
				<?php if(!empty($info['reply'])){ ?>
				    <li class="reply">管理员回复:<?php echo $info['reply']; ?>
					</li>  
				<?php }else{ ?>
				    <li><a href="reply.php?messageId=<?php echo $info['messageId'];?>">管理员回复:</a>
					</li>
				<?php } ?><div class="list">
					<li class="delete">
						<a href="delete.php?messageId=<?php echo $info['messageId'];?>">删除留言</a>
					</li>
				</div>
	    		<li class="time"><?php echo $info['addTime']; ?></li>
	    	</ul>
	    	  
			  
	    	<?php  }
	    	}
	    	   mysql_free_result($rs);
	    	   mysql_close($conn);
	    	?>
	    
	    	<div class="page" id="page">
	    	    <a href="user.php?page=<?php echo 1;?>">首页</a>
	    	    <a href="user.php?page=<?php echo $page-1;?>">上一页</a> | <a href="user.php?page=<?php echo $page+1;?>">下一页</a>
	    	    <a href="user.php?page=<?php echo $pagecount;?>">尾页</a>
	    		<form action="user.php" method="get" autocomplete="off">
	    		    <input type="text" name="page" size="4" maxlength="4">
	    		    <input type="submit" name="submit" value="跳转">
	    	    </form>
	    	</div>
	    </div>
		
	 </div>
	 <?php }else{
		 echo '<script>location.href="../error.php";history.go(-1);</script>';
	 }?>
</body>
</html>
