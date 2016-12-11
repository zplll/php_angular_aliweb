<?php
$servername = "rm-bp1hdphxcbppg623u.mysql.rds.aliyuncs.com";
$username = "rxp92zte48";
$password = "Zplll123";
$dbname = "rxp92zte48";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO movie_love(movie_name, movie_detail, create_user,create_time) VALUES(?, ?, ?,now())");
$stmt->bind_param("sss", $movie_name, $movie_detail, $create_user);

// 设置参数并执行
$movie_name = $_POST["movie_name"];
$movie_detail = $_POST["movie_detail"];
$create_user = $_POST["create_user"];
//$create_time = date("Y-m-d H:i:s")];
$exeStat=$stmt->execute();

if($exeStat){
	echo "新记录插入成功";
}else{
	die("操作失败".$mysqli_sta->error);
}
echo $_POST["movie_name"];

$stmt->close();
$conn->close();
?>