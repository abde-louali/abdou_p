<?php
include "../model/modelP.php";
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $error = "";
    foreach($_POST as $key=>$value){
        $$key = $value;
    }
    if(empty($username)||empty($password)){
        $error = "cin or password are empty ";
    }else{
        $selected = selectVLDT($username,$password);
        if(!$selected){
            $error = "cin or password incorect";
        }
    }

    if(empty($error)){
        

      $succes = [
        "username"=>$username,
        "password"=>$password
      ];
      
      $_SESSION["succes"] = $succes;
      header("location:teacherP.php");
    }
    else{
        setcookie("errors",$error,time()+24*60*60);
        $_COOKIE["errors"] = $error;
        header("location:loginT.php") ;
    }

}