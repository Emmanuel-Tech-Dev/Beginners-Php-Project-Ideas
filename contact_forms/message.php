<?php


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

 if(!empty($email) && !empty($message)){
if(filter_var($email , FILTER_VALIDATE_EMAIL)){
    $reciever = "emmanuelkusi345@gmail.com";
    $subject = "From: $name <$email>";
    $body = "Message: $message\n
             Name: $name \n Thanks for contacting me , I look forward to working with you and making your experience better \n
             Email: $email\n We will contact you to address your concern \n
             Phone: $phone \n";
    $sender = "From: $email";
    
    if(mail($reciever, $subject , $body, $sender )){
       
        echo "Message sent successfully";

    }else{
        echo "Sorry , failed to send message";
    }

}else{
        echo 'Enter a valid email address';
}
 }else{
    echo 'Email and message field is required!';
 }

?>