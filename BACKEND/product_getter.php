<?php
    include "../connection.php";
    
    $ProductName = $_POST['ProductName'];
    $ProductDescription = $_POST['ProductDescription'];
    $ProductPrice = $_POST['ProductPrice'];
    
    $directory = "../images/";
    $ProductImage = $directory . basename($_FILES['ProductImage']['name']);
    move_uploaded_file($_FILES['ProductImage']['tmp_name'], $ProductImage);


    $createProductStmt = "INSERT INTO product_tbl (ProductName, ProductDescription, ProductPrice, ProductImage) VALUES ('$ProductName','$ProductDescription',' $ProductPrice','$ProductImage')";
    mysqli_query($conn, $createProductStmt);
    header("location: product_page.php"); 
?> 