<?php
    include "../connection.php";

    $id = $_POST['id'];
    
    if(isset($_POST['DELETE'])){
        $DeleteUserStmt = "DELETE FROM user_tbl WHERE userID = $id";
        mysqli_query($conn, $DeleteUserStmt);
        header("location: user_page.php");
        }

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
    header("location: user_page.php");
    }

?> 