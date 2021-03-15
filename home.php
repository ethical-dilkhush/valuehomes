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


$query = "SELECT * from client where user_id= $id && status='0' ";
$run = mysqli_query($conn,$query);
$total_rows_found = mysqli_num_rows($run);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

<?php

 $s=1;
 if($total_rows_found<=0)
 {
     echo "<center>NO Data Found!!</center>";
 }

 else
 {
        ?>
        <div style="overflow-x:auto;">

        <table style='margin:%;color:black;' border='1px'>
        <tr>

        <th>
        S.No
        </th>

        <th>
        Name
        </th>

        <th>
        Contact
        </th>

        <th>
        Unit
        </th>

        <th>
        Size 
        </th>

        <th>
        Block
        </th>

        <th>
        Project
        </th>

        <th>
        Demand
        </th>

        <th>
        Existing list
        </th>

        <th>
        Floor Plan
        </th>

        <th>
        Status
        </th>

        <th colspan=2>
        Edit
        </th>

        

      
        </tr>

<?php
      while($row = mysqli_fetch_array($run))
      {

        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".$s;  
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['name']);  
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['contact_no']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['unit_number']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['size']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['block']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['project']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['demand']); 
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['existing_flat']); 
        echo "</td>";
      
        echo "<td>";
        echo "&emsp;".($row['floor_plan']); 
        echo "</td>";

        echo "<td>";
        if($row['type']==0)
        {
            echo "For Rent"; 

        }   
        
        else
        {
            echo "For Sale"; 
        }

        echo "</td>";

        echo "<td>";
        echo "<a href='status.php?ph=$row[contact_no]'>Deactivate</a>"; 
        echo "</td>";


        echo "<td>";
        echo "<a href='edit.php?id=$row[client_id]&nm=$row[name]&cn=$row[contact_no]&un=$row[unit_number]&s=$row[size]&b=$row[block]&p=$row[project]&d=$row[demand]&e=$row[existing_flat]&f=$row[floor_plan]'>Edit</a>"; 
        echo "</td>";

        echo "</tr>";
        $s++;
      }
      echo "</table>";  
      echo "</div>";
      
    }
?>

<p style="text-align:center;margin-top:30px;">
<button onclick="location.href='details.php';" style="width:auto;outline:none;" >Enter Data</button>
</p>

<p style="text-align:center;margin-top:30px;">
<a href="logout.php" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" >Logout</a>
</p>




    


</body>
</html>