<?php 
include "../model/modelP.php";
include "./header.php";

if(isset($_POST["sub"])){ 
    $module = $_POST["slc"];
    $rows = allstudentsNote($module);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Note</title>
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-style: italic;">Students' Notes in <?php echo $module ?></h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>CIN</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Module Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td><?php echo $row["cin"] ?></td>
                    <td><?php echo $row["fname"] ?></td>
                    <td><?php echo $row["lname"] ?></td>
                    <td><?php echo $row["notef"] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php 
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Module</title>

    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-style: italic;">Select a Module to View Students' Notes</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="slc" class="form-label">Select Module:</label>
                <select id="slc" name="slc" class="form-select">
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="sql">SQL</option>
                </select>
            </div>
            <button type="submit" name="sub" class="btn btn-primary">See Students' Notes</button>
        </form>
    </div>

</body>
</html>

<?php } ?>
