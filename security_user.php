<?php

    if(!isset($_SESSION['UserLevel'])){
        header("location: ./BACKEND/login.php");
    }else if($_SESSION['UserLevel'] != 0){
        header("location: ./BACKEND/login.php");
    }
?>

