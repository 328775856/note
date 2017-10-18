 <?php //打开到数据库服务器的连接
	   $conn = new MySQLi("localhost","root","7562880");
	   //判断连接是否有错误。
	   if($conn->connect_error){
		  die("连接失败。".$conn->connect_error);   
		  exit();
	   }
	   //选择要访问的数据库
	   $conn->select_db("ceshi");
?>