<?php
include('./connect.php');
if(isset($_POST['submit'])){
    print_r($_POST);

    $name = $_POST['user'];
    $password= $_POST['password'];

    $sql = "SELECT * FROM`usersdata` WHERE `name`= '{$name}' AND `Password` = '{$password}' ";

    $conect=mysqli_query($con,$sql);

    if(mysqli_num_rows($conect) > 0)
    {
        header('location:./table.php');
        session_start();
        $_SESSION['name'] = $name;
      

    }
    else{
        header('location:./signin.php');

    }
}



?>