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
          <h1 class="h2">Add Users</h1>
        </div>
       <!-- USERS -->
              <div class="container">
                <!-- Form for adding a new customer -->
                <form action="user_getter.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" name="FirstName">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control"  name="LastName">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control"  name="Address">
                    </div>
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control" name="Username">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="UserLevel">UserLevel</label>
                        <input type="number" class="form-control" name="UserLevel">
                    </div>
                    <div class="form-group">
                            <label for="UserImage">User Image</label>
                            <input type="file" name="UserImage">
                     </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



                
                    <table class='table table-striped'>
                      <thead>
                          <tr>
                              <th scope='col'>User ID</th>
                              <th scope='col'>FirstName</th>
                              <th scope='col'>LastName</th>
                              <th scope='col'>Email</th>
                              <th scope='col'>Address</th>
                              <th scope='col'>Username</th>
                              <th scope='col'>Password</th>
                              <th scope='col'>UserLevel</th>
                              <th scope='col'>UserImage</th>
                              <th scope='col'>UserAction</th>
                          </tr>
                      </thead>
                          <h2 class="mt-5">User List</h2>
                          <?php
                          $SelectUserStmt = "SELECT * FROM user_tbl";
                          $UserQuery = mysqli_query($conn, $SelectUserStmt);
                      
                          while($UserShow = mysqli_fetch_assoc($UserQuery)){
                          echo "
                          <form action='user_modify.php' method='POST'>
                              <tbody>
                                  <tr>
                                      <th scope='row'>$UserShow[UserID]</th>
                                      <td><input type='text' class='form-control' value='$UserShow[FirstName]' name='FirstName'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[LastName]' name='LastName'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[Email]' name='Email'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[Address]' name='Address'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[Username]' name='Username'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[Password]' name='Password'></td>
                                      <td><input type='text' class='form-control' value='$UserShow[UserLevel]' name='UserLevel'></td>
                                      <td><img src='$UserShow[UserImage]'  width='100%'></td>
                                    
                                      <td> <input type='hidden' name='id' value='$UserShow[UserID]'>
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
        <!-- USERS -->
      </main>
    </div>
  </div>



</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>