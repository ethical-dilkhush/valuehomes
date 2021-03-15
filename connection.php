<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "win_club";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}

?>
