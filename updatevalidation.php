<?php 
include "../model/modelP.php";

if($_SERVER["REQUEST_METHOD"] === "POST" ){
    $errors = ""; 
    foreach($_POST as $key=>$value){
        $$key = $value;
    }
    if(empty($note1) || empty($note2)||empty($note3)){
        $errors = "required note ";
    }elseif($note1 > 20 || $note1 <0||$note2 > 20 || $note2 <0||$note3 > 20 || $note3 <0){
        $errors = "notes must be between 0 and 20";
    }
    $selected = selectID2($cin);
     $id =  $selected["id"];
    if(empty($errors)){
        $updated = updateN($note1,$note2,$note3,$mod,$cin);
        if($updated){
            
             header("location:studentsN.php?id=$id");
        }
      
    }
    else{
        $row = selectCN2($cin,$mod);
        setcookie("errors",$errors,time()+24*60*60);
        $_COOKIE["errors"] = $errors;
        header("location:editStudentN.php?Nmodul={$row["Nmodul"]}&cin={$row["cin"]}");
        
    }

}
