
<?php
    include "../connection.php";
  
    
    $id = $_POST['id'];
    
    
    if(isset($_POST['DELETE'])){
        $DeleteProductStmt = "DELETE FROM product_tbl WHERE ProductID = $id";
        mysqli_query($conn, $DeleteProductStmt);
        header("location: product_page.php");
        }

    if(isset($_POST['UPDATE'])){
        $ProductName = $_POST['ProductName'];
        $ProductDescription = $_POST['ProductDescription'];
        $ProductPrice = $_POST['ProductPrice'];
   
    
    //  echo " name: $ProductName desc: $ProductDescription proce: $ProductPrice id: $id";
    
    $UpdateProductStmt = "UPDATE product_tbl SET ProductName = '$ProductName', ProductDescription = '$ProductDescription', ProductPrice = '$ProductPrice' WHERE ProductID = $id";
    mysqli_query($conn, $UpdateProductStmt);
    header("location: product_page.php");
    }

?> 