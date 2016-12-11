<?php
header("Content-type: text/html; charset=utf-8");
$servername = "rm-bp1hdphxcbppg623u.mysql.rds.aliyuncs.com";
$username = "rxp92zte48";
$password = "Zplll123";
$dbname = "rxp92zte48";





/**
* 
*/
class doubanMovie
{
	public $id="";
	public $movie_name="";
	public $actors="";
	public $region="";
	public $release="";
    public $duration="";
    public $director="";
    public $rate="";
    public $imgsrc="";
    public $insert_time="";

	

	}
$doubanMovies=array();
 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("lll: " . $conn->connect_error);
} 

$sql = "SELECT * FROM doubanMovie order by id limit 6";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
    for($i=1;$row = $result->fetch_assoc();$i++) {
    	
        $$i=new doubanMovie();
        $$i->id=$i;
        $$i->movie_name=$row["movie_name"];
        $$i->movie_name=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->movie_name);
        $$i->actors=$row["actors"];
        $$i->actors=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->actors);
        $$i->region=$row["region"];
        $$i->region=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->region);
        $$i->release=$row["release"];
        $$i->release=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->release);
        $$i->duration=$row["duration"];
        $$i->duration=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->duration);
        $$i->director=$row["director"];
        $$i->director=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->director);
        $$i->rate=$row["rate"];
        $$i->rate=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->rate);
        $$i->imgsrc=$row["imgsrc"];
        $$i->insert_time=$row["insert_time"];
        $$i->movie_name_cn=$row["movie_name_cn"];
        $$i->movie_name_cn=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $$i->movie_name_cn);
        
        array_push($doubanMovies, $$i);
        
    }
} 

$resultVar =array('doubanMovies' => $doubanMovies,'result' =>"0");
echo json_encode($resultVar);

$conn->close();
?>