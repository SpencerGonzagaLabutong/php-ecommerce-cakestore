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


<div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
                <li class="nav-item">
                    <?php
                        $SelectUserStmt = "SELECT * FROM user_tbl WHERE UserID = {$_SESSION['UserID']}";
                        $UserQuery = mysqli_query($conn, $SelectUserStmt);
                    
                        while($UserShow = mysqli_fetch_assoc($UserQuery)){
                        echo "
                            <a class='nav-link' href='admin_profile.php'>
                                <img src='./images/$UserShow[UserImage]' class='rounded-circle' width='100%'>
                            </a>
                     ";}
                    ?>
                </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="userprofile.php">
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="userorder.php">
                Orders
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./backend/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Page Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Profile</h1>
        </div>
             <!-- ORDERS -->
             <div class="container">
            <form action='' method='POST'>
              <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>Order ID</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Productname</th>
                            <th scope='col'>amount</th>
                        </tr>
                      </thead>
                      <?php
                      $SelectOrderStmt = "SELECT * 
                      FROM order_tbl 
                      INNER JOIN user_tbl ON order_tbl.CustomerID = user_tbl.UserID
                      INNER JOIN product_tbl ON order_tbl.ProductID = product_tbl.ProductID";
                      $OrderQuery = mysqli_query($conn, $SelectOrderStmt);
              
                      while($OrderShow = mysqli_fetch_assoc($OrderQuery)){
                      echo "

                          <tbody>
                              
                              <tr>
                                  <th scope='row'>$OrderShow[OrderID]</th>
                                  <td><img src='image/$OrderShow[ProductImage]' height='200px' width='100%'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[Username]' name='CustomerID'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[ProductName]' name='ProductID'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[Amount]' name='Amount'></td>
                                  <td> <input type='hidden' name='id' value='$OrderShow[OrderID]'>
                                  </td>
                              </tr>
                          </tbody>
                      ";}
                      ?>
                </table>
              </form>
            </div>
            <!-- ORDERS -->
      </main>
    </div>
  </div>
  


</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>