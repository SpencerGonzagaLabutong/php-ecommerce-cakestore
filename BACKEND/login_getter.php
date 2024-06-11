    <?php
    include "../connection.php";
    session_start();

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];


    $CheckUserStmt = "SELECT * FROM user_tbl WHERE Username = '$Username' AND Password = '$Password' AND UserLevel = 0";
    $CheckUserQuery = mysqli_query($conn, $CheckUserStmt);

    $CheckAdminStmt = "SELECT * FROM user_tbl WHERE Username = '$Username' AND Password = '$Password' AND UserLevel = 1";
    $CheckAdminQuery = mysqli_query($conn, $CheckAdminStmt);



    // $Usershow = mysqli_fetch_assoc($CheckUserQuery);
    // echo "$Usershow[UserID] <br> $Usershow[Username] <br> $Usershow[UserLevel]";
    // header("location: ../index.php");

    // $Adminshow = mysqli_fetch_assoc($CheckAdminQuery);
    // echo "$Adminshow[UserID] <br> $Adminshow[Username] <br> $Adminshow[UserLevel]";
    // header("location: admin.php");

    if(mysqli_num_rows($CheckUserQuery)){
        $Usershow = mysqli_fetch_assoc($CheckUserQuery);
        // echo "$Usershow[UserID] <br> $Usershow[Username] <br> $Usershow[UserLevel]";

        $_SESSION['UserID'] = $Usershow['UserID'];
        $_SESSION['FirstName'] = $Usershow['FirstName'];
        $_SESSION['LastName'] = $Usershow['LastName'];
        $_SESSION['Email'] = $Usershow['Email'];
        $_SESSION['Address'] = $Usershow['Address'];
        $_SESSION['UserLevel'] = $Usershow['UserLevel'];
        $_SESSION['Username'] = $Usershow['Username'];


        header("location: ../index.php");

    }else if(mysqli_num_rows($CheckAdminQuery)){
        $Adminshow = mysqli_fetch_assoc($CheckAdminQuery);
        // echo "$Adminshow[UserID] <br> $Adminshow[Username] <br> $Adminshow[UserLevel]";

        $_SESSION['UserID'] = $Adminshow['UserID'];
        $_SESSION['FirstName'] = $Adminshow['FirstName'];
        $_SESSION['LastName'] = $Adminshow['LastName'];
        $_SESSION['Email'] = $Adminshow['Email'];
        $_SESSION['Address'] = $Adminshow['Address'];
        $_SESSION['UserLevel'] = $Adminshow['UserLevel'];
        $_SESSION['Username'] = $Adminshow['Username'];

        header("location: admin.php");
    }else{
        echo "incorrect PASSWORD OR USERNAME";
    }

    
?>