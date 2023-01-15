<?php 
session_start();
include 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function resend_email($name , $email , $verify_token){
 
    $mail = new PHPMailer(true);

    //  $mail->SMTPDebug = 4 ;
        $mail->isSMTP();  
        $mail->SMTPAuth   = true;         //Enable verbose debug output
                                                 //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        //Enable SMTP authentication
        $mail->Username   = 'emmanuelkusi345@gmail.com';                     //SMTP username
        $mail->Password   = 'ainilxfybhhiilio';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;  
  
        $mail->setFrom('emmanuelkusi345@gmail.com', $name);  
        $mail->addAddress($email); 
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Resend Email Verification for Tutorial';
  
        $email_template = "
             <h2>You have Registered with tut-confix</h2>
             <h5>Verify your email address to login with the beloe given link</h5><br>
             <a href='http://localhost:3000/EmialId_Verification/verify.php?token=$verify_token'>Click Here </a>";
  
        $mail->Body    = $email_template;
  
    
        $mail->send();

};


if(isset($_POST['resend_btn'])){

    if(!empty(trim($_POST['email']))){
       $email = mysqli_real_escape_string($conn , $_POST['email']);

       $check_email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";

       $check_email_query_run = mysqli_query($conn , $check_email_query);

       if(mysqli_num_rows($check_email_query_run) > 0){

               $row = mysqli_fetch_array($check_email_query_run);
               if($row['verify_status'] == '0'){

                 $name = $row['name'];
                  $email =  $row['email'];
                $verify_token =  $row['verify_token'];


                resend_email($name , $email , $verify_token);

                $_SESSION['status'] ="Verification Email link have been sent to your email addresss";
                header('Location: login.php');
                exit(0) ;


               }else{
                $_SESSION['status'] ="Email is already verified Please login";
       header("Refresh: 2 ; url= login.php");;
       exit(0) ;
               }
       }else{
        $_SESSION['status'] ="Email is not registered";
       header('Location: register.php');
       exit(0) ;
       }


    }else{
       $_SESSION['status'] ="Please enter the email field";
       header('Location: resend_verification.php');
       exit(0) ;
    }
}













?>