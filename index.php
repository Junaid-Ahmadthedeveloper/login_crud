<?php
include('./connect.php');
$nameerror = "";
$emailerror = "";
$passworderror = "";
$imageerror = "";
$success = "";

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['user']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($name)) {
        $nameerror = "Please enter your name.";
    } elseif (empty($email)) {
        $emailerror = "Please enter your email.";
    } elseif (empty($password)) {
        $passworderror = "Please enter your password.";
    } elseif ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        $imageerror = "Please select a valid image.";
    } else {
        $imagename = $_FILES['file']['name'];
        $temporaryname = $_FILES['file']['tmp_name'];
        $separate = explode(".", $imagename);
        $extension = strtolower(end($separate));
        $allowed_extensions = ["jpg", "png", "jpeg"];

        if (in_array($extension, $allowed_extensions)) {
            $picname = rand(33333, 93387282872872) . "Aci_Programmer" . microtime() . $imagename;
            $upload_pic = './images/' . $picname;

            if (move_uploaded_file($temporaryname, $upload_pic)) 
            {
                $sql = "INSERT INTO `usersdata`(`name`, `Email`, `Password`, `image`) VALUES ('{$name}','{$email}','{$password}', '{$upload_pic}')";
                // $stmt = mysqli_prepare($con, $sql);

                if (mysqli_query($con,$sql));
                {
                    // $stmt, "ssss",

                    // if (mysqli_stmt_execute($con)) {
                        header('location:./table.php');
                        $success = "Submitted form details.";
                    } 
                    // else 
                    // {
                    //     $success = "Sorry, try again...";
                    // }

                    // mysqli_stmt_close($stmt);
                } 
                // else {
                //     $success = "Sorry, there was an error preparing the SQL statement.";
                // }
            } 
            // else {
            //     $success = "Sorry, there was an error uploading your file.";
            // }
        
        else {
            $imageerror = "Please select a valid image.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        #btntable{
            margin-left:1250px;
            margin-top:10px;
        }
        #background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #007bff;
        }

        .form-container form {
            margin-top: 20px;
        }
        
    </style>
</head>
<body>
<a href="./table.php" class="btn btn-primary " id="btntable">Table</a>

    <div class="container form-container">
    <h2>Registration Form</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="user" id="name" placeholder="Enter your name">
            <p class="text-danger"><?php echo $nameerror ?></p>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
            <p class="text-danger"><?php echo $emailerror ?></p>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            <p class="text-danger"><?php echo $passworderror ?></p>
        </div>
        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" class="form-control-file" name="file" id="image">
            <p class="text-danger"><?php echo $imageerror ?></p>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        <p class="text-success"><?php echo $success ?></p>
    </form>

</div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
