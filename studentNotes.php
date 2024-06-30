<?php 
session_start();
include "../model/modelP.php";
include "./header2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <style>
        body {
            background-color: #f8f9fa; 
            padding: 20px; 
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd; 
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $rows = selectStudentN($_SESSION["succes"]["cin"]);
        if(count($rows) > 0):
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>CC1</th>
                    <th>CC2</th>
                    <th>CC3</th>
                    <th>Final Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $row["Nmodul"] ?></td>
                    <td><?php echo $row["note1"] ?></td>
                    <td><?php echo $row["note2"] ?></td>
                    <td><?php echo $row["note3"] ?></td>
                    <td><?php echo $row["notef"] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="alert alert-info mt-3" role="alert">
                No records found.
            </div>
        <?php endif ?>
    </div>
</body>
</html>
