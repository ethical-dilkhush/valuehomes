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

$d=$_GET['id'];
$nm = $_GET['nm'];
$cn= $_GET['cn'];
$un = $_GET['un'];
$s = $_GET['s'];
$b = $_GET['b'];
$p = $_GET['p'];
$d = $_GET['d'];
$e = $_GET['e'];
$f = $_GET['f'];
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
<input  type="text" name="name" value="<?php echo $nm; ?>" required placeholder="name" autocomplete="off"><br><br>
<input value="<?php echo $cn; ?>"  onfocus="this.value='+91'" maxlength="13" type="text" name="contact" required placeholder="contact number" autocomplete="off"><br><br>
<input value="<?php echo $un; ?>" type="text" name="unit" required placeholder="unit number" autocomplete="off"><br><br>

<input value="<?php echo $s; ?>" type="text" name="size" required placeholder="size" autocomplete="off"><br><br>

<input value="<?php echo $b; ?>" type="text" name="block" required placeholder="block" autocomplete="off"><br><br>

<input value="<?php echo $p; ?>" type="text" name="project" required placeholder="project" autocomplete="off"><br><br>

<input value="<?php echo $d; ?>" type="text" name="demand" required placeholder="demand" autocomplete="off"><br><br>

<input value="<?php echo $e; ?>" type="text" name="exist" required placeholder="existing flat" autocomplete="off"><br><br>

<input value="<?php echo $f; ?>" type="text" name="f_plan" required placeholder="floor plan" autocomplete="off"><br><br>

<input  type="submit" name="submit" value="Save">

</form><br><br>
<button onclick="location.href='home.php';" >Go to Home</button>
<?php
 


if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $unit = $_POST['unit'];
    $size = $_POST['size'];
    $bl = $_POST['block'];
    $project = $_POST['project'];
    $demand = $_POST['demand'];
    $exist = $_POST['exist'];
    $plan = $_POST['f_plan'];


   

     $sql= "UPDATE `client` SET `name`='$name',`contact_no`='$contact',`unit_number`='$unit',`size`='$size',`block`='$bl',`project`='$project',`demand`='$demand',`existing_flat`='$exist',`floor_plan`='$plan',WHERE  'client_id='$d'";
      
        $data = mysqli_query($conn,$sql);

        if($data)
        {
            echo '<script>alert("Enrty submitted successfuly!")</script>'; 
            echo "<script>window.location.href='home.php'</script>";
        }

        else
        {
            
            echo '<script>alert("User already exist!")</script>'; 
        }


    

}




?>

    


</body>
</html>