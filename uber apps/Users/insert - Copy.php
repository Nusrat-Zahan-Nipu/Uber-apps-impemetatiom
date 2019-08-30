<?php  
$connect = mysqli_connect("localhost", "root", "", "bus route");

$sql = "INSERT INTO users_info(first_name, last_name,email,dob) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["dob"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>