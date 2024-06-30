<?php 
session_start();
include "../model/modelP.php";
include "./header.php";
$row = null;
if(isset($_GET["Nmodul"]) && isset($_GET["cin"])){
    $mod = $_GET["Nmodul"];
    $cin = $_GET["cin"];
    $row = selectCin($mod, $cin);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Notes</title>
</head>
<body class="bg-light">
    <div class="container my-5">
        <?php if($row): ?>
            <h1><?php echo htmlspecialchars($row["Nmodul"]); ?> Module</h1>
            <form action="./updateValidation.php" method="post">
                <?php if(isset($_COOKIE["errors"])):?>
                    <p class="text-danger"><?php echo $_COOKIE["errors"]?></p>
                    <?php setcookie("errors","",time()+24*60*60)?>
                    <?php endif?>
                <div class="form-group">
                    <label for="cin">CIN:</label>
                    <input type="text" id="cin" name="cin" class="form-control" value="<?php echo htmlspecialchars($row["cin"]); ?>" readonly>
                </div>
                <input type="hidden" name="mod" value="<?php echo htmlspecialchars($row["Nmodul"]); ?>">
                <div class="form-group">
                    <label for="note1">Note 1:</label>
                    <input type="number" id="note1" name="note1" class="form-control" value="<?php echo htmlspecialchars($row["note1"]); ?>">
                </div>
                <div class="form-group">
                    <label for="note2">Note 2:</label>
                    <input type="number" id="note2" name="note2" class="form-control" value="<?php echo htmlspecialchars($row["note2"]); ?>">
                </div>
                <div class="form-group">
                    <label for="note3">Note 3:</label>
                    <input type="number" id="note3" name="note3" class="form-control" value="<?php echo htmlspecialchars($row["note3"]); ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="sub" value="Update" class="btn btn-primary">
                </div>
            </form>
        <?php else: ?>
            <h2>No student found for the specified module and CIN.</h2>
        <?php endif; ?>
    </div>
</body>
</html>
