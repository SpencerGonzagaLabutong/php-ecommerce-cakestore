
<?php
    include "../connection.php";
    session_start();
    include "security_admin.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<!-- order -->

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
                                <img src='$UserShow[UserImage]' class='rounded-circle' width='100%'>
                            </a>
                     ";}
                    ?>
                </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.php">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin_profile.php">
                Administrator
                </a>  
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order_page.php">
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product_page.php">
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_page.php">
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Message_admin.php">
                Message
              </a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Page Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Orders Information</h1>
        </div>
            <!-- ORDERS -->
          <div class="container">
              <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>Order ID</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>CostumerID</th>
                            <th scope='col'>ProductID</th>
                            <th scope='col'>Address</th>
                            <th scope='col'>Amount</th>
                            <th scope='col'>Action</th>
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
                      <form action='order_modify.php' method='POST'>
                          <tbody>
                              
                              <tr>
                                  <th scope='row'>$OrderShow[OrderID]</th>
                                  <td><img src='../image/$OrderShow[ProductImage]' height='150px' width='100%'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[CustomerID]' name='CustomerID'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[ProductID]' name='ProductID'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[Address]' name='Address'></td>
                                  <td><input class='form-control' type='text' value='$OrderShow[Amount]' name='Amount'></td>
                                  <td> <input type='hidden' name='id' value='$OrderShow[OrderID]'>
                                  <input class='btn btn-danger' type='submit' name='DELETE' value='DELETE'>
                                  <input class='btn btn-info' type='submit' name='UPDATE' value='UPDATE'>
                                  </td>
                              </tr>
                          </tbody>
                        </form>
                      ";}
                      ?>
                </table>
             
            </div>
            <!-- ORDERS -->
      </main>
    </div>
  </div>
  



</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>