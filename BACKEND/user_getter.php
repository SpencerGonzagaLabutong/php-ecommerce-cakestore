<?php
    include "../connection.php";
    
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $UserLevel = $_POST['UserLevel'];
    
    $directory = "../images/";
    $UserImage = $directory . basename($_FILES['UserImage']['name']);
    move_uploaded_file($_FILES['UserImage']['tmp_name'], $UserImage);

    $CreateUserStmt = "INSERT INTO user_tbl (FirstName, LastName, Email, Address, Username, Password, UserLevel, UserImage) VALUES ('$FirstName',' $LastName','$Email','$Address','$Username', '$Password','$UserLevel', '$UserImage')";
    mysqli_query($conn, $CreateUserStmt);
    header("location: user_page.php"); 
?>