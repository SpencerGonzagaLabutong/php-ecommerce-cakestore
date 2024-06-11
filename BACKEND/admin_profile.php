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
          <h1 class="h2">Admin Profile</h1>
        </div>
       <!-- USERS -->
            <div class="container">
                <?php
                $SelectUserStmt = "SELECT * FROM user_tbl WHERE UserID = {$_SESSION['UserID']}";
                $UserQuery = mysqli_query($conn, $SelectUserStmt);
            
                while($UserShow = mysqli_fetch_assoc($UserQuery)){
                  echo "
                  <form action='admin_profile_modify.php' method='POST' class='form-horizontal'>
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
                          <label for='Password' class='col-sm-2 control-label'>Password:</label>
                          <div class='col-sm-10'>
                              <input type='text' class='form-control' value='$UserShow[Password]' name='Password'>
                          </div>
                      </div>
              
                      <div class='form-group'>
                          <label for='UserLevel' class='col-sm-2 control-label'>User Level:</label>
                          <div class='col-sm-10'>
                              <input type='text' class='form-control' value='$UserShow[UserLevel]' name='UserLevel'>
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
      </main>
    </div>
  </div>



</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>