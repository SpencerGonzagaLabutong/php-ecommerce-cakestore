<?php
    include "connection.php";
    session_start();

    $UserID = $_POST['UserID'];
    $Message = $_POST['Message'];

    echo " $UserID <br> $Message";

    $stmt = "INSERT INTO contact_tbl (UserID, Message) VALUES ('$UserID','$Message')";
    mysqli_query($conn, $stmt);
    header("location: contact.php"); 
    
?>