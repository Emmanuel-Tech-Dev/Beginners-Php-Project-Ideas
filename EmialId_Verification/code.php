<?php
session_start();
include "conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



function email_verification($name, $email, $verify_token)
{

  $mail = new PHPMailer(true);

  //  $mail->SMTPDebug = 4 ;
  $mail->isSMTP();
  $mail->SMTPAuth = true; //Enable verbose debug output
  //Send using SMTP
  $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
  //Enable SMTP authentication
  $mail->Username = 'emmanuelkusi345@gmail.com'; //SMTP username
  $mail->Password = 'ainilxfybhhiilio'; //SMTP password
  $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
  $mail->Port = 587;

  $mail->setFrom('emmanuelkusi345@gmail.com', $name);
  $mail->addAddress($email);

  $mail->isHTML(true); //Set email format to HTML
  $mail->Subject = 'Email Verification for Tutorial';

  $email_template = "
           <h2>You have Registered with tut-confix</h2>
           <h5>Verify your email address to login with the beloe given link</h5><br>
           <a href='http://localhost/PHP_TUTORIALS/EmialId_Verification/verify.php?token=$verify_token'>Click Here </a>";

  $mail->Body = $email_template;


  $mail->send();
  // echo 'Message has been sent';

}
;


if (isset($_POST["register_btn"])) {

  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST['password'];
   $c_password =$_POST['c_password'];
  $verify_token = md5(rand());
  $terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

  
  if($terms){

  // Check if email exit or not
  if ($password == $c_password) {

    $check_email = "SELECT email FROM users WHERE email ='$email' LIMIT 1";

    $email_query_run = mysqli_query($conn, $check_email);


    if (mysqli_num_rows($email_query_run) > 0) {

      $_SESSION['status'] = "Email Already Exists";
      header("Location:  register.php");

    } else {

      // Insert user of registered data


      $query = "INSERT INTO `users`(`name`, `phone`, `email`, `password`, `verify_token`) 
         VALUES (?, ?, ?, ?, ?)";



      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $query)) {

        die(mysqli_error($conn));
      }

      mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $name,
        $phone,
        $email,
        $password,
        $verify_token,
      );
      mysqli_stmt_execute($stmt);



      if ($stmt) {
        // Declare the alert using the SESSION function

        email_verification("$name", "$email", "$verify_token");

        $_SESSION['status'] = '<div class="alert alert-success" id="alert-success2" role="alert">
                                Registration Successful! . Please verify your email address.
                                </div>';

        //  Maintain the page you are on without going to a different page

        header("Location: http://localhost/PHP_TUTORIALS/EmialId_Verification/register.php");
      } else {
        $_SESSION['status'] = '<div class="alert alert-danger" id="alert-danger" role="alert">
                               Connection to Mysql Error!
                               </div> ';
      }
      ;

    }
  } else {

    $_SESSION['status'] = '<div class="alert alert-danger" id="alert-danger" role="alert">
  Password and Confirm Password does not match!
 </div> ';

    header("Location: http://localhost/PHP_TUTORIALS/EmialId_Verification/register.php");
  }
}else{
  $_SESSION['status'] = '<div class="alert alert" id="alert-danger" role="alert">
  Terms and condition is not accepted!
 </div> ';
 header("Location: http://localhost/PHP_TUTORIALS/EmialId_Verification/register.php");

}

}

?>