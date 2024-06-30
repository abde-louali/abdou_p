<?php 

include "../model/modelP.php";
if(isset($_GET["Nmodul"]) && isset($_GET["cin"])){
    $id = selectID2($_GET["cin"]);
    if(isset($_POST["sub"])) {
        delete($_GET["cin"], $_GET["Nmodul"]);
        header("location: studentsN.php?id={$id['id']}");
    } elseif(isset($_POST["back"])) {
        header("location: studentsN.php?id={$id['id']}");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        h1 {
            font-size: 1.5rem; 
            margin-bottom: 20px; 
        }
        .btn {
            margin-right: 10px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post" class="text-center">
            <h1 class="mb-4">Are you sure you want to delete this student's record from this module?</h1>
            <button type="submit" name="sub" class="btn btn-danger">Delete</button>
            <button type="submit" name="back" class="btn btn-secondary">Back</button>
        </form>
    </div>
</body>
</html>
