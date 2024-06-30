<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        .form-group {
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <form action="./validationAdd.php" method="POST" class="bg-white p-4 shadow rounded">
            <?php if(isset($_SESSION["errors"])) : ?>
                <?php foreach($_SESSION["errors"] as $error) : ?>
                    <div class="alert alert-danger p-1"><?php echo $error; ?></div>
                <?php endforeach; ?>
                <?php unset($_SESSION["errors"]); ?>
            <?php endif; ?>
            <?php if(isset($_COOKIE["succes"])): ?>
                <div class="alert alert-info"><?php echo $_COOKIE["succes"]; ?></div>
                <?php setcookie("succes","",time()+24*60*60);
                 header("location:loginS.php");
                ?>
                <?php 
                endif?>
            <div class="form-group">
                <label for="cin">CIN:</label>
                <input type="text" id="cin" name="cin" placeholder="Enter your CIN" class="form-control">
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="Enter your first name" class="form-control">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" placeholder="Enter your last name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" placeholder="Enter your password" class="form-control">
            </div>
            <div class="form-group">
                <label for="cpass">Confirm Password:</label>
                <input type="password" id="cpass" name="cpass" placeholder="Confirm your password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Add Student" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>


</body>
</html>
