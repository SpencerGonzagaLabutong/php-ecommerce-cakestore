<?php

    if(!isset($_SESSION['UserLevel'])){
        header("location: login.php");
    }else if($_SESSION['UserLevel'] != 1){
        header("location: login.php");
    }
?>

