<?php


// specify your own database credentials
$host = "localhost";
$db_name = "cat";
$username = "root";
$password = "";
$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
    die("connection failed". mysqli_connect_error());
}
else{
    echo "connected";
}

?>

