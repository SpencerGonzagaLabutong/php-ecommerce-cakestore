<?php
    include "connection.php";

    $id = $_POST['id'];
    


    if(isset($_POST['UPDATE'])){
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $UserLevel = $_POST['UserLevel'];
  
   
    
    $UpdateUserStmt = "UPDATE user_tbl SET FirstName = '$FirstName', LastName = '$LastName', Email = '$Email', Address = '$Address', Username ='$Username', Password ='$Password', UserLevel='$UserLevel' WHERE UserID= $id";
    mysqli_query($conn, $UpdateUserStmt);
    header("location: userprofile.php");
    }

?> 