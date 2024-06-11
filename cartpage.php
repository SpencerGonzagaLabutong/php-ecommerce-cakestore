<?php   
include "connection.php";
session_start();
include "security_user.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<!-- navbar -->
<?php   
    include "nav.php"; 
?>
<!-- navbar -->



 <h1>Your Cart Here</h1>
<?php

if(isset($SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if (isset($_POST['ADDTOCART'])) {
    $_SESSION['UserID'] = $_POST['UserID'];
    $_SESSION['ProductID'] = $_POST['ProductID'];
    $stmt = "SELECT * FROM product_tbl WHERE ProductID = {$_SESSION['ProductID']}";
    $query = mysqli_query($conn, $stmt);
    $product = mysqli_fetch_assoc($query);
    $_SESSION['cart'][] = $product;
    header("location: index.php?");  

}


if (isset($_POST['REMOVEFROMCART'])) {
    if (isset($_POST['index'])) {
        $indexToRemove = $_POST['index'];
        array_splice($_SESSION['cart'], $indexToRemove, 1);
    }
}

$totalAmount = 0;
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
echo "<div class='container'>";
echo "<table class='table table-border table-hover'>";
echo "  <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
         </tr>";

        
    foreach ($_SESSION['cart'] as $index => $item) {
    $totalAmount += $item['ProductPrice'];
    echo "
    <tr>
        <td><img src='./images/{$item['ProductImage']}' height='150px' width='100%'> </td>  
        <td>{$item['ProductName']}</td>
        <td >{$item['ProductDescription']}</td>
        <td><strong>{$item['ProductPrice']}</strong></td>
        <td>
            <form action='' method='post'>
                <input type='hidden' name='index' value='{$index}'>
                <input type='submit' name='REMOVEFROMCART' value='Remove'>
            </form>
        </td>
    </tr>
    ";
} 
echo "</table>";
echo "<h4>Total Amount: <strong>$totalAmount</strong></h4>";
echo "
<form action='orderdetailsgetter.php' method='POST'>
    <input type='hidden' name='CustomerID' value='{$_SESSION['UserID']}'>
    <input type='hidden' name='ProductID' value='{$_SESSION['ProductID']}'>
    <input onclick='success();' class='btn btn-warning' type='submit' name='BUY' value='Buy'>
</form>
";
echo "</div>";
}else {
    echo "<p>Your cart is empty.</p>";
}
?>


<!-- USERS -->
<div class="container">
    <h3 class='text-center'>Shipping information</h3>
            <?php
            $SelectUserStmt = "SELECT * FROM user_tbl WHERE UserID = {$_SESSION['UserID']}";
            $UserQuery = mysqli_query($conn, $SelectUserStmt);
        
            while($UserShow = mysqli_fetch_assoc($UserQuery)){
                echo "
                <form action='userprofile_modify.php' method='POST' class='form-horizontal'>
                    <div class='form-group'>
                        <label for='FirstName' class='col-sm-2 control-label'>First Name:</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' value='$UserShow[FirstName]' name='FirstName'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <label for='LastName' class='col-sm-2 control-label'>Last Name:</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' value='$UserShow[LastName]' name='LastName'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <label for='Email' class='col-sm-2 control-label'>Email:</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' value='$UserShow[Email]' name='Email'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <label for='Address' class='col-sm-2 control-label'>Address:</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' value='$UserShow[Address]' name='Address'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <label for='Username' class='col-sm-2 control-label'>Username:</label>
                        <div class='col-sm-10'>
                            <input type='text' class='form-control' value='$UserShow[Username]' name='Username'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <div class='col-sm-10'>
                            <input type='hidden' class='form-control' value='$UserShow[Password]' name='Password'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <div class='col-sm-10'>
                            <input type='hidden' class='form-control' value='$UserShow[UserLevel]' name='UserLevel'>
                        </div>
                    </div>
            
                    <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <input type='hidden' name='id' value='$UserShow[UserID]'>
                            <button type='submit' name='UPDATE' class='btn btn-primary'>UPDATE</button>
                        </div>
                    </div>
                </form>
            ";
            
            }                      
            ?>
        </div>
    <!-- USERS -->      




















    <!-- footer -->
    <?php   
        include "footer.php"; 
    ?>
    <!-- footer -->
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='main.js'> </script>
</html>