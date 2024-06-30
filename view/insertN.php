<?php 
session_start();
if(!isset($_SESSION["succes"]["username"])){
    header("location:loginT.php");
}
?>
<?php 
include "./header.php";
include "../model/modelP.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php if(isset($_GET["id"])){
    $id = $_GET["id"];
    $row = selectID($id);
} 
?>

<body class="bg-light">
    <div class="container my-5">
        <h1 style="font-style: italic;">Add Notes for Student <?php echo htmlspecialchars($row["cin"]); ?></h1>
        <form action="./insertValidion.php" method="POST">
            <?php if(isset($_SESSION["errors"])):?>
                <?php foreach($_SESSION["errors"] as $error):?>
                    <p class="text-danger"><?php echo $error ?></p>
                    <?php endforeach?>
                    <?php unset($_SESSION["errors"]) ?>
                    <?php endif?>
            <div class="form-group">
                <label for="cin">CIN:</label>
                <input type="text" id="cin" name="cin" class="form-control" value="<?php echo htmlspecialchars($row["cin"]); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="note1">NOTE1:</label>
                <input type="number" id="note1" name="note1" class="form-control" placeholder="Enter student CC N'1" >
            </div>
            <div class="form-group">
                <label for="note2">NOTE2:</label>
                <input type="number" id="note2" name="note2" class="form-control" placeholder="Enter student CC N'2" >
            </div>
            <div class="form-group">
                <label for="note3">NOTE3:</label>
                <input type="number" id="note3" name="note3" class="form-control" placeholder="Enter student CC N'3" >
            </div>
            <div class="form-group">
                <label for="slc">Select Course:</label>
                <select id="slc" name="slc" class="form-select" >
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="sql">SQL</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Notes</button>
            </div>
        </form>
    </div>