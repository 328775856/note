<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
 <?php
      if(isset($_SESSION['user'])){

       //打开到数据库服务器的连接
	   $conn = new MySQLi("localhost","root","7562880");
	   //判断连接是否有错误。
	   if($conn->connect_error){
		  die("连接失败。".$conn->connect_error);   
		  exit();
	   }
	   //选择要访问的数据库
	   $conn->select_db("ceshi");
 
	  //数据库文件名
	   $sql="select * from user";
	   $result = $conn->query($sql);
	   
	   echo "当前用户：".$_SESSION['user'];
	   echo "  <a href='index.php'>退出登录</a>"
	   ?>
		<table border='1'>
		<tr>
		   <th>编号</th>
		   <th>用户名</th>
		   <th>密码</th>
		   <th>操作</th>
		</tr>
	   
	   <?php
	   //显示数据库的所以内容
	   while($row=$result->fetch_assoc()){
		  echo "<tr>";
		  echo "<td>";
		  echo $row["userID"];
		  echo "</td>";
		  echo "<td>".$row["username"]."</td>";
		  echo "<td>".$row["password"]."</td>";
		  echo "<td><a href='xiugai.php?id=".$row["userID"]."'>修改</a>&nbsp;<a href='shanchu.php?id=".$row["userID"]."'>删除</a></td>";
		  echo "</tr>";
	   }
	   echo "</table>";
	   $conn->close();
}else{
		 ?>
		<script>alert("您还没有登录，请先登录。");location.href="denglu.php";</script>
		<?php
	}
  
?>
</body>
</html>