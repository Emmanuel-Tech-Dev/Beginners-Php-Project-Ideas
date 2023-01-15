<?php
session_start();


if(!isset($_SESSION['authenticated'])){

     $_SESSION['status']  = "<div class='alert alert-warning'>Please log in to access user dashboard! </div>";
    header("Location: login.php");
     exit(0);
}





?>