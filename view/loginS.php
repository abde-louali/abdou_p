<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container mt-5">
   
    <form action="./validationloginS.php" method="POST" class="bg-light p-4">
    <h1>Student Page</h1>
        <div class="form-group">
            <label for="user">Username</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Enter a username">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter a password">
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="log">Login</button>
        <?php if(isset($_COOKIE["errors"])) :?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $_COOKIE["errors"] ?>
            </div>
            <?php setcookie("errors", "", time() + 24*60*60) ?>
        <?php endif ?>
        <div class="ml-5">
        <a href="./addS.php">Register Here</a><br>
        <a href="./loginT.php">Login as Teacher</a>
        </div>
    </form>

    
</div>

</body>
</html>
