<?php 
session_start();
if(!isset($_SESSION["succes"]["username"])){
    header("location: loginT.php");
   
}
include "../model/modelP.php";
include "./header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Notes</title>
   
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
<body class="bg-light">
    <div class="container">
        <h1>Student Notes</h1>
        
        <?php if(isset($_GET["id"])): ?>
            <?php 
            $nmodule = $_GET["id"];
            $rows = allNotes($nmodule);
            if(count($rows) > 0):
            ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Note 1</th>
                        <th>Note 2</th>
                        <th>Note 3</th>
                        <th>Final Note</th>
                        <th>Module Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["fname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["lname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["note1"]); ?></td>
                            <td><?php echo htmlspecialchars($row["note2"]); ?></td>
                            <td><?php echo htmlspecialchars($row["note3"]); ?></td>
                            <td><?php echo htmlspecialchars($row["notef"]); ?></td>
                            <td><?php echo htmlspecialchars($row["Nmodul"]); ?></td>
                            <td><a href="./editStudentN.php?Nmodul=<?php echo htmlspecialchars($row["Nmodul"]); ?>&cin=<?php echo htmlspecialchars($row["cin"]); ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="./delete.php?cin=<?php echo htmlspecialchars($row["cin"]); ?>&Nmodul=<?php echo htmlspecialchars($row["Nmodul"]); ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <h3>No student records found for this module.</h3>
            <?php endif; ?>
        <?php else: ?>
            <h3>No module ID provided.</h3>
        <?php endif; ?>
    </div>


</body>
</html>
