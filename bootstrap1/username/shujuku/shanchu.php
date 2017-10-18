<?php  session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php
if(isset($_SESSION['user'])){
	$id = $_GET["id"];
	//链接数据库php
	require "ku_lj.php";
	$sql="delete from ceshi where userid=$id";
	$result = $conn->query($sql);
	if($result===true){
	   echo '<script>alert("删除成功。");location.href="index.php";</script>';
	}else{
	   echo '<script>alert("删除失败。");history.go(-1);</script>';
	}
	$conn->close();
}else{
	?>
	<script>alert("您还没有登录，请先登录。");location.href="login.php";</script>
	<?php	
}
?>
</body>
</html>