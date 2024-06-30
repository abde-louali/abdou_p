<?php
session_start();
include "../model/modelP.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $errors = []; 
    foreach($_POST as $key=>$value){
        $$key = $value;
    }
    $selected = selectID2($cin);
    $id =  $selected["id"]; 
    if(empty($cin)){
        $errors[] = "required cin";
    }
    else if(empty($note1)||empty($note2)||empty($note3)){
        $errors[] = "required note ";
    }
   
    elseif(!isset($slc)){
        $errors[] = "add a module";
    }
    elseif(($note1 > 20 || $note1 <0)||($note2 > 20 || $note2 <0)||($note3 > 20 || $note3 <0)){
        $errors[] = "note must be beteewn 0 and 20 ";
    }
    else{
        $exist = selectVIR($cin,$slc);
        if($exist){
            $errors[] =  " Student notes for this module already exist. You can view them <a href='./studentsN.php?id=$id'>here</a>.";
        } 
    }   
    if(empty($errors)){
        $insert = insertNote($cin,$note1,$note2,$note3,$slc);
        header("location:studentsN.php?id=$id"); 
    }
    else{
        $_SESSION["errors"] = $errors;
        header("location:insertN.php?id=$id");
    }

}