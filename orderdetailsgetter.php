<?php
include "connection.php";
session_start();

if (isset($_POST['BUY'])) {
    $customerID = $_POST['CustomerID'];


    foreach ($_SESSION['cart'] as $item) {
        $productID = $item['ProductID'];
        $Amount = $item['ProductPrice'];
        $stmt = "INSERT INTO order_tbl (CustomerID, ProductID, Amount) VALUES ('$customerID', '$productID', '$Amount')";
        $query = mysqli_query($conn, $stmt);
    }

    // Clear the cart after the order is processed
    $_SESSION['cart'] = array();
    
    header("location: cartpage.php"); 
}
?>