<?php
    include "connection.php";
    session_start();
    include "security_user.php"
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

    <!-- video banner -->
     <!-- <div class="position-relative d-flex justify-content-start align-items-end">
        <video autoplay loop muted class="video-banner img-fluid">
            <source src="video/videobanner.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="position-absolute m-5">
            <h1 class="text-dark">Delicious Cakes!</h1>
            <p class="text-dark">Order now and satisfy your sweet cravings!</p>
            <button class="btn btn-warning">Order Now</button>
        </div>
    </div>    -->
    <!-- video banner -->
    
    <div class="row m-2 d-flex justify-content-end ">
        <div class="col-md-3">
            <form id="searchForm">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for products...">
                    <button class="btn btn-warning" type="submit" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>

 <!-- CARDS -->

 <div class='container-fluid m-2'>
 <h2 >Products</h2>

    <div class='row g-2'>
        <?php
        $SelectProductStmt = "SELECT * FROM product_tbl";
        $ProductQuery = mysqli_query($conn, $SelectProductStmt);
       
        while($ProductShow = mysqli_fetch_assoc($ProductQuery)){
        echo "
            <div class='col-md-3 product'>
                <div class='card'>
                    <img src='./images/$ProductShow[ProductImage]' class='card-img-top'  style='height: 200px; width: 100%; object-fit: cover;'>
                    <div class='card-body'>
                        <h5 class='card-title'>$ProductShow[ProductName]</h5>
                        <p class='card-text'>$ProductShow[ProductDescription]</p>
                        <p class='card-text'>PHP $ProductShow[ProductPrice]</p>
                        <form action='cartpage.php' method='post'>
                        <input type='hidden' name='ProductID' value='$ProductShow[ProductID]'><br>
                        <input type='hidden' name='UserID' value='$_SESSION[UserID]'><br>
                        <input class='btn btn-warning' type='submit' onclick='added();' name='ADDTOCART' value='ADDTOCART'>
                        </form>
                    </div>
                </div>
            </div>
        ";}
        ?>
    </div>  
 </div> 
 <!-- CARDS -->


    <!-- footer -->
    <?php   
        include "footer.php"; 
    ?>
    <!-- footer -->

</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script>
</script>


</html>