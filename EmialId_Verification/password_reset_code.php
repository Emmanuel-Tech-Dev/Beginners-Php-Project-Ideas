<?php 
session_start();
include 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function send_password_rest($get_name ,$get_email , $token){
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
  
        $mail->setFrom('emmanuelkusi345@gmail.com', $get_name);  
        $mail->addAddress($get_email); 
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Resend Email Verification for Tutorial';
  
        $email_template = "
             <h2>hello</h2>
             <h5>We recieve a password reset from your account ,verify with the link below</h5><br>
             <a href='http://localhost:3000/EmialId_Verification/password_change.php?token=$token&email=$get_email'>Click Here </a>";
  
        $mail->Body    = $email_template;
  
    
        $mail->send();

}


if(isset($_POST['reset_pass_btn'])){

    $email = mysqli_real_escape_string($conn , $_POST["email"]);

    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email ='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn , $check_email);

    if(mysqli_num_rows($check_email_run) > 0){

        $row = mysqli_fetch_array($check_email_run);
$get_name = $row['name'];
$get_email = $row['email'];

         $update_token = "UPDATE users SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
         $update_token_run = mysqli_query($conn , $update_token);

         if($update_token_run){
              
            send_password_rest($get_name , $get_email , $token);

            $_SESSION['status'] = "The resent link has been sent";
            header("Location:  password_reset.php");
            exit(0);


         }else{
            $_SESSION['status'] = "Something Went Wrong. #1";
    header("Location:  password_reset.php");
    exit(0);
         }

    }else{
        $_SESSION['status'] = "No email Found";
    header("Location:  password_reset.php");
    exit(0);
    }

}


if(isset($_POST['update_password'])){

    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $new_pass = mysqli_real_escape_string($conn , $_POST['new_password']);
    $c_pass = mysqli_real_escape_string($conn , $_POST['cpassword']);

    $pass_token = mysqli_real_escape_string($conn , $_POST['password_token']);


    if(!empty($pass_token)){

        if(!empty($email) && !empty($new_pass) && !empty($c_pass)){

           $check_token = "SELECT verify_token FROM users WHERE verify_token='$pass_token' LIMIT 1" ;
            $token_run = mysqli_query($conn , $check_token);

            if(mysqli_num_rows($token_run) > 0){
                  
                if($new_pass == $c_pass){

                    $update_pass = "UPDATE users SET password='$new_pass' WHERE verify_token='$pass_token' LIMIT 1";
                    $pass_run = mysqli_query($conn , $update_pass);

                    if($pass_run){


                        $new_token = md5(rand()) ."trial";

                        $update_new_pass = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$pass_token' LIMIT 1";
                    $pass_new_run = mysqli_query($conn , $update_new_pass);

                        $_SESSION['status'] = "New password updated successfully";
                            header("Location: login.php");
                            exit(0);

                    }else{
                            $_SESSION['status'] = "Password Update was not successful";
                            header("Location:  password_change.php?token=$pass_token&email=$email");
                            exit(0);
                    }

                }else{
                $_SESSION['status'] = "Password and Confirm Password does not match";
                header("Location:  password_change.php?token=$pass_token&email=$email");
                exit(0);
            }

            }else{
                $_SESSION['status'] = "Invalid token";
                header("Location:  password_change.php?token=$pass_token&email=$email");
                exit(0);
            }
        }else{
            $_SESSION['status'] = "All fields are required";
            header("Location:  password_change.php?token=$pass_token&email=$email");
            exit(0);
        }

    }else{
        $_SESSION['status'] = "No token Available";
        header("Location:  password_change.php");
        exit(0);
    }
}

?>