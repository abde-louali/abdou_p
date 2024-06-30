<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
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
   
    <form action="./validationT.php" method="POST" class="bg-light p-4">
    <h1>Teachers Page</h1>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="log">Login</button>
        <?php if(isset($_COOKIE["errors"])) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $_COOKIE["errors"]; ?>
            </div>
            <?php setcookie("errors", "", time() + 24*60*60); ?>
        <?php endif; ?>
    </form>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
