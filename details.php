<?php
session_start();
include("connection.php");
error_reporting(0);

$id = $_SESSION['id'];
if($id==true)
{

}

else
{
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" >
<input  type="text" name="name" required placeholder="name" autocomplete="off"><br><br>
<input  onfocus="this.value='+91'" maxlength="13" type="text" name="contact" required placeholder="contact number" autocomplete="off"><br><br>
<input type="text" name="unit" required placeholder="unit number" autocomplete="off"><br><br>

<input type="text" name="size" required placeholder="size" autocomplete="off"><br><br>

<input type="text" name="block" required placeholder="block" autocomplete="off"><br><br>

<input type="text" name="project" required placeholder="project" autocomplete="off"><br><br>

<input type="text" name="demand" required placeholder="demand" autocomplete="off"><br><br>

<input type="text" name="exist" required placeholder="existing flat" autocomplete="off"><br><br>

<input type="text" name="f_plan" required placeholder="floor plan" autocomplete="off"><br><br>

<select name="myselect">
<option selected  hidden>STATUS
</option>

<option value="0">
For Rent
</option>
<option value="1">
For Sale
</option>

</select>
<br><br>

<input type="submit" name="submit" value="submit Details">

</form><br><br>
<button onclick="location.href='home.php';" >Go to Home</button>
<?php
 


if(isset($_POST['submit']))
{
   $name = $_POST['name'];
    $contact = $_POST['contact'];
    $unit = $_POST['unit'];
    $size = $_POST['size'];
    $block = $_POST['block'];
    $project = $_POST['project'];
    $demand = $_POST['demand'];
    $exist = $_POST['exist'];
    $plan = $_POST['f_plan'];
    $id= $_SESSION['id'];
    $status=$_POST['myselect'];

    //checking if number already exist or not
    $check_query = "SELECT * from client where contact_no ='$contact'";
    $checking = mysqli_query($conn,$check_query);
    $rows_found = mysqli_num_rows($checking);

    if($rows_found>0)
    {
    //if 1 row found,means user exist.So show error message
    echo '<script>alert("User already exist!")</script>';
    }

    //if user not registered, add new user to database
    else
    {
        //to find the id of the new user here we find the total records.
        $q= "SELECT * from client";
        $d = mysqli_query($conn,$q);
        $getid= mysqli_num_rows($d);
        $getid = $getid+1; //total records + 1 will be the new id of the new user.

        $sql = "INSERT INTO client VALUES ('$getid','$name','$contact','$unit','$size','$block','$project','$demand','$exist','$plan','$status','$id','0')";
        $data = mysqli_query($conn,$sql);

        //if data entered to the database goto login page
        if($data)
        {
            echo '<script>alert("Enrty submitted successfuly")</script>'; 
            echo "<script>window.location.href='details.php'</script>";
        }

        else
        {
            
            echo '<script>alert("User already exist!")</script>'; 
        }


    }

}




?>

    


</body>
</html>