<?php
session_start();
include("connection.php");
error_reporting();

$id = $_SESSION['id'];
if($id==true)
{

}

else
{
    header("location:login.php");
}

$phone = $_GET['ph'];
 

$sql=mysqli_query($conn,"UPDATE client set status='1' where contact_no='$phone'");

if($sql)
{
    echo "<script>window.location.href='home.php'</script>";
}

else
{
    echo '<script>alert("Unable to Delete!!")</script>'; 

}


?>