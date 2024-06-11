<?php
    include "../connection.php";

    $id = $_POST['ContactID'];
    
    if(isset($_POST['DELETE'])){
        $DeleteMessageStmt = "DELETE FROM contact_tbl WHERE ContactID = $id";
        mysqli_query($conn, $DeleteMessageStmt);
        header("location: message_admin.php");
        }

    // if(isset($_POST['UPDATE'])){
    // $UserID = $_POST['UserID'];
    // $Message = $_POST['Message'];
    
    // $UpdateMessageStmt = "UPDATE contact_tbl SET UserID = '$UserID', Message = '$Message'  WHERE ContactID = $id";
    // mysqli_query($conn, $UpdateMessageStmt);
    // header("location: message_admin.php");
    // }

?> 