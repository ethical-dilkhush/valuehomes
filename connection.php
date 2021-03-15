<?php

$servername = "remotemysql.com";
$username = "Nl35OlGKTF";
$password = "2vdeaCyeGp";
$dbname = "Nl35OlGKTF";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}

?>
