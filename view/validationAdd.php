<?php
session_start();
include "../model/modelP.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $errors = []; 
    foreach($_POST as $key=>$value){
        $$key = $value;
    }
    if(empty($cin)){
        $errors[] = "required cin";
    }
    if(empty($fname)){
        $errors[] = "required first name ";
    }
    else if(strlen($fname)<4){
        $errors[] = " first name must be grather than 4 ";
    }
    if(empty($lname)){
        $errors[] = "required last name ";
    }
    else if(strlen($lname)<4){
        $errors[] = " last name must be grather than 4 ";
    }
    if(empty($email)){
        $errors[] = "required email";
    }
    // else if(!filter_var(FILTER_VALIDATE_EMAIL,$email)){
    //     $errors[] = " email incorect ";
    // }
    if(empty($pass)){
        $errors[] = "required password ";
    }
    else if(strlen($pass)<6){
        $errors[] = " password must be grather than 4 ";
    }
    if(empty($cpass)){
        $errors[] = "required confirmation password ";
    }
    else if($pass!=$cpass){
        $errors[] = " incorect confirmation password ";
    }

    if(empty($errors)){
        $insert = insertS($cin,$fname,$lname,$email,$pass);
        $succes = " you are add seccufuly!";
        setcookie("succes",$succes,time()+24*60*60);
        $_COOKIE["succes"] = $succes;
        header("location:addS.php");
    }
    else{
        $_SESSION["errors"] = $errors;
        header("location:addS.php");
    }

}