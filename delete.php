<?php
include "connection.php";
$id=$_REQUEST['id'];
$query = "DELETE FROM details WHERE id='$id';"; 
$result = mysqli_query($conn,$query);
header("Location: showadmin.php"); 

?>