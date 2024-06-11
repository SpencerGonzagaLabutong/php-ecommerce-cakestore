<?php
    include "../connection.php";

    $id = $_POST['id'];
    
    if(isset($_POST['DELETE'])){
        $DeleteOrderStmt = "DELETE FROM order_tbl WHERE OrderID = $id";
        mysqli_query($conn, $DeleteOrderStmt);
        header("location: order_page.php");
        }

    if(isset($_POST['UPDATE'])){
    $CustomerID = $_POST['CustomerID'];
    $ProductID = $_POST['ProductID'];
    $Amount = $_POST['Amount'];
    
    $UpdateOrderStmt = "UPDATE order_tbl SET CustomerID = '$CustomerID', ProductID = '$ProductID', Amount ='$Amount'  WHERE OrderID = $id";
    mysqli_query($conn, $UpdateOrderStmt);
    header("location: order_page.php");
    }

?> 