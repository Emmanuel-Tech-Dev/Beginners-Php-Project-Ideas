<?php
session_start();
include 'conn.php';



if (isset($_POST['login_btn'])) {

   if (!empty(trim($email = $_POST['email'])) && !empty(trim($password = $_POST['password']))) {

      $email = mysqli_real_escape_string($conn, $email = $_POST['email']);

      $password = mysqli_real_escape_string($conn, $password = $_POST['password']);

      $login_query = "SELECT * FROM users WHERE email ='$email' AND password = '$password' LIMIT 1 ";

      $login_query_run = mysqli_query($conn, $login_query);


      if (mysqli_num_rows($login_query_run) > 0) {

         $row = mysqli_fetch_array($login_query_run);

         if ($row['verify_status'] == '1') {

            $_SESSION['authenticated'] = TRUE;

            $_SESSION['auth_user'] = [
               'username' => $row['name'],
               'phone' => $row['phone'],
               'email' => $row['email']
            ];

            $_SESSION['status'] = "You are logged in successfully";
            header("Location:  dashboard.php");
            exit(0);

         } else {

            $_SESSION['status'] = "PLease verify your email address to log in";
            header("Location:  login.php");
         }


      } else {

         $_SESSION['status'] = "Invalid email";
         header("Location:  login.php");
         exit(0);
      }

   } else {
      $_SESSION['status'] = "All form fields are required";
      header("Location:  login.php");
      exit(0);
   }

}


?>