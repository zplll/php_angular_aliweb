<?php
header("Content-type: text/html; charset=utf-8");
$servername = "rm-bp1hdphxcbppg623u.mysql.rds.aliyuncs.com";
$username = "rxp92zte48";
$password = "Zplll123";
$dbname = "rxp92zte48";





/**
* 
*/
class movieLove 
{
	public $id="";
	public $movieName="";
	public $movieDetail="";
	public $createUser="";
	public $createTime="";
	

	}
$moviesLove=array();
 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("lll: " . $conn->connect_error);
} 

$sql = "SELECT * FROM movie_love order by create_time desc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
    for($i=1;$row = $result->fetch_assoc();$i++) {
    	
        $$i=new movieLove();
        $$i->id=$i;
        $$i->movieName=$row["movie_name"];
        $$i->movieName=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->movieName);
        $$i->movieDetail=$row["movie_detail"];
        $$i->movieDetail=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->movieDetail);
        $$i->createUser=$row["create_user"];
        $$i->createTime=$row["create_time"];
        
        array_push($moviesLove, $$i);
        
    }
} 

$resultVar =array('moviesLove' => $moviesLove,'result' =>"0");
echo json_encode($resultVar);

$conn->close();
?>