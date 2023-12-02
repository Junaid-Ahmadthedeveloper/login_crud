
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Form</title>
</head>
<body>
<?php
include("./connect.php");

if(isset($_GET['updateid']))
{
    $id = $_GET['updateid'];
}
$sql = "SELECT * FROM `usersdata` WHERE `ID`= $id";
$apply = mysqli_query($con,$sql);
$fetch = mysqli_fetch_assoc($apply);
// print_r($fetch);
if(mysqli_num_rows($apply) > 0)
{


?>

    <div class="container form-container col-4 mx-auto">
    <h2>Update Info:</h2>
    

    <form action="edit.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <!-- <label for="text">ID</label> -->
    <input type="hidden" name="ID" value="<?php echo $fetch['ID']  ?>">
</div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="user" id="name" placeholder="Enter your name" value="<?php echo $fetch['name'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo $fetch['Email'] ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" value="<?php echo $fetch['Password'] ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
    

</div>
<?php
}
else
{
    header("location:./table.php");
}


?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>





