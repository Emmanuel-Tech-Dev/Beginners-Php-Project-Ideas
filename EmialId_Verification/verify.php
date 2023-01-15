<?php 
 session_start();
include "conn.php";


 if(isset($_GET['token'])){

     $token = $_GET['token'];
    
     $verify_token = "SELECT verify_token, verify_status FROM `users` WHERE verify_token ='$token' LIMIT 1";
   
     $verify_token_run = mysqli_query($conn, $verify_token);

    if(mysqli_num_rows($verify_token_run) > 0){

       $row = mysqli_fetch_array($verify_token_run);
       

     if($row['verify_status'] == "0"){

        $clicked_token  = $row['verify_token'];

        $update_query  = "UPDATE `users` SET verify_status ='1' WHERE verify_token='$clicked_token' LIMIT 1";
        $update_query_run = mysqli_query($conn , $update_query);

         if($update_query_run){

            $_SESSION['status'] = "Your account has been verified successfully";
            header("Location: http://localhost:3000/EmialId_Verification/login.php");
            exit(0);

         }else{
            $_SESSION['status'] = "Verification failed";
            header("Location: http://localhost:3000/EmialId_Verification/login.php");
            exit(0);
         }

    


      }else{
        $_SESSION['status'] = "Email Already Verify";
        header("Location: login.php");
        exit(0);
    }


}else{

  $_SESSION['status'] = "This token does not exit";
  header("Location: login.php");
  exit(0);
 }
    



 }else{

     $_SESSION['status'] = "Not Allowed";
     header("Location: login.php");

}
    












?>