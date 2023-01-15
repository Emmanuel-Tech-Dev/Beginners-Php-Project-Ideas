<?php 

$server ="localhost";   // the server name

$username ="root";  //username on the server

$password ="";  //password if any for this instance i dont have any so i leave the varriable empty

$dbname ="phptut";  //the name of the database you intend to connect to

// Establish database connection

$conn = mysqli_connect($server , $username , $password , "$dbname");

?>