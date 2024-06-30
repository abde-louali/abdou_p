<?php 
session_start();
if(!isset($_SESSION["succes"]["username"])){
    header("location:loginT.php");
    exit; 
}


include "../model/modelP.php";
include "./header.php";
$rows = selectAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Notes</title>
    <style>
       
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            display: block;
            text-decoration: none;
            color: #007bff;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["succes"]["username"]); ?></h1>
        
        <?php if(count($rows) > 0): ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>CIN</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Add Notes</th>
                        <th>See Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["cin"]); ?></td>
                            <td><?php echo htmlspecialchars($row["fname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["lname"]); ?></td>
                            <td><a href="./insertN.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add Notes</a></td>
                            <td><a href="./studentsN.php?id=<?php echo $row["id"]; ?>" class="btn btn-info">See Notes</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>No student records found.</h3>
        <?php endif; ?>
    </div>

    
</body>
</html>
