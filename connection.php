<?php

$username ="root";
$password = "";
$servername = "localhost";
$db = "cakes_db";

$conn = mysqli_connect($servername, $username, $password, $db);

if($conn){
    echo "";
}else{
    die(mysqli_connect_error());
}

?>