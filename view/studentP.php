<?php 
session_start();
if(isset($_SESSION["succes"]["cin"])){
    include "./header2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        .student-info {
            background-color: #f0f0f0;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .student-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .student-info p {
            font-size: 16px;
            color: #666;
        }
        .container {
            max-width: 1000px; 
        }
    </style>
</head>
<body>
   <div class="container mt-5">
       <h1>Hello, Mr. <?php echo $_SESSION["succes"]["username"]["fname"] ?></h1>
       
       <div class="student-info">
           <h2>Your Student Dashboard</h2>
           <p>Welcome to your personalized Student area. Here you can see your notes, update your information, and more.</p>
           <p>Explore the menu above to get started.</p>
       </div>
       
       <div class="mt-3">
           <a href="./logout.php" class="btn btn-danger">Logout</a>
       </div>
   </div>
</html>
<?php 
} else {
    echo "Hello dear friend, you should login first.";
}
?>
