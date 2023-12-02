<?php

include('./connect.php');
// print_r($_POST);
if(isset($_POST['submit']))
{
    
    $id = $_POST['ID'];
    $name=$_POST['user'];
    $email=$_POST['email'];
    $password=$_POST['password'];
   $sql="UPDATE `usersdata` SET `name`='{$name}',`Email`='{$email}',`Password`='{$password}' WHERE `ID` = $id";
   if(mysqli_query($con,$sql))
   {

    header('location:./table.php');
   } 
   
   }



?>
