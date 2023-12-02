<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:./signin.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-container {
            margin: 20px;
        }
        #id{
           font-size:20px;
           font-weight:bolder;

        }
        #btnform{
             
             margin-left:1250px;
        }
        #btnlogout{
            margin-left:1170px;
            position:relative;
            bottom:37px;


        }
       #name{
        color:#c71610;
        font-weight:bolder;
       }
       

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .custom-table th, .custom-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .custom-table th {
            background-color: #007bff;
            color: #ffffff;
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .t{
            color:#3e65cf;
        font-weight:bolder;

        }
        #notfound{
            color:#c71610;
            text-align:center;
            margin-top:200px;
        }
    </style>
    <title>Data Show</title>
</head>
<body>

<div class="table-container">
    <table class="table custom-table">
        <?php
        include('./connect.php');
        $sql = "SELECT * FROM `usersdata` ";
        $connect = mysqli_query($con,$sql);
        if(mysqli_num_rows($connect)> 0)
        {
        ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Image</th>
                <th>Login Time</th>
                <th>Action</th>

            </tr>
        </thead>
        <?php
        }
        else{
            echo "<h1 id='notfound' >OOPS! NO DATA FOUND</h1>";
        }
        ?>
        <?php
        while($data = mysqli_fetch_assoc($connect))
        {        
        ?>
        <tbody>
            <tr>
                <td   id="id"><?php echo $data['ID'] ?>.</td>
                <td class="t" id="name"><?php echo $data['name']  ?></td>
                <td class="t" id="email"><?php echo $data['Email']   ?></td>
                <td class="t" id="password"><?php echo $data['Password']   ?></td>
                <td> <img src="<?php echo $data['image']   ?>" alt="" width="100px" height="100px"></td>
                <td class="t">  <?php echo $data['time']   ?></td>
                <td>
                    <a href="./delete.php?delid=<?php echo $data['ID']?>" class="btn btn-danger">Delete</a>
                    <a href="./update.php?updateid=<?php echo $data['ID']?>" class="btn btn-primary">Edit</a>


            </td>
            </tr>
            
        </tbody>
        <?php
        }
        ?>

    </table>
    <a href="./index.php" class="btn btn-primary " id="btnform">Form</a>
    <a href="logout.php" class="btn btn-danger" id="btnlogout">logout</a>

</div>

</body>
</html>
