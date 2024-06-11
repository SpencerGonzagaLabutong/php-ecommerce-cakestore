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
    
    <?php
    echo "
    <div class='container mt-5 mb-5 border bg-warning'>
    <h2 class='m-2'>Message Form</h2>
    <form action='contactgetter.php' method='POST'>
    <label for='UserID'>UserID</label>
    <input type='text' name='UserID' class='form-control' value='{$_SESSION['UserID']}'><br>
    <label for='Username'>Username</label>
    <input type='text' name='Username' class='form-control' value='{$_SESSION['Username']}'><br>
    <label for='Email'>Email</label>
    <input type='text' name='Email' class='form-control' value='{$_SESSION['Email']}'><br>
    <label for='Message'>Message</label><br>
    <textarea name='Message' class='form-control'></textarea>
    <input class='btn btn-dark m-1' type='submit'>
    </form>
    </div>
    ";
   
    ?>
    <!-- footer -->
    <?php   
        include "footer.php"; 
    ?>
    <!-- footer -->
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</html>