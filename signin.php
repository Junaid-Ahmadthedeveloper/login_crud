<?php 
session_start();
if(isset($_SESSION['name']))
{
header('location:./table.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title> Login Form</title>
</head>
<body>

<br><br><br>
<br><br><br>
    <div class="container form-container col-4 mx-auto" style="border:1px solid #007bff;height:300px;border-radius:10px; box-shadow: 5px 5px blue, 5px5px blue, 10px 10px green; ">
    <h2 style="text-align: center;
            color: #007bff;">Sign In</h2>
    

    <form  action="login.php" method="POST" enctype="multipart/form-data" class="col-12 mx-auto">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="user" id="name" placeholder="Enter your name" ">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        <p>No Account? <a href="index.php">Register</a></p>

    </form>
    

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
