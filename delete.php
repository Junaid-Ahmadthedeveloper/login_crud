<?php
 include('./connect.php');
 if(isset($_GET['delid']))
 {
     $id = $_GET['delid'];
     $sql="DELETE FROM `usersdata` WHERE `ID` = $id";
     if(mysqli_query($con,$sql))
     {
         header("location:./table.php");
     }
 }
?>

