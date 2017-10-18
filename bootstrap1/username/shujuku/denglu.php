<?php session_start(); ?>

<?php 
  // phpinfo();
    if(isset($_POST['username'])){
	   $username=$_POST['username'];
	   $userpwd= $_POST['userpwd'];
	    //打开到数据库服务器的连接
	   $conn = new MySQLi("localhost","root","123456");
	   //判断连接是否有错误。
	   if($conn->connect_error){
		  die("连接失败。".$conn->connect_error);   
		  exit();
	   }
	   //选择要访问的数据库
	   $conn->select_db("bookdb");
	   //查询语句，条件是用户名
	   $sql="select * from userinfo where username='$username'";
	   //执行查询操作，返回结果
	   $result = $conn->query($sql);
	   //判断结果中的行数是否大于0
	   if($result->num_rows>0){
		   //判断数据读取是否成功。
		   if($row=$result->fetch_assoc()){
			   //判断密码是否和数据库读取的密码一致
			   if($userpwd==$row['userpwd']){
				   //用户名和密码正确，存储登录信息。
				  $_SESSION['username']=$username;
				
				 echo true;
				 
			   }else{
				 echo false;  
			   }
		   }
	   }else{
		   echo false;
	   }
	   $conn->close();
	}
?>

