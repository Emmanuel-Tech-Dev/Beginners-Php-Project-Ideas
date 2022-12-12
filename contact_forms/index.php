<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="../contact_forms/style.css">
</head>
<body>
    
<div class="wrapper">
    <header>Send Us A Message</header>

    <form action="#">
        <div class="status">
    <span>Sending Your Message....</span>
    </div>
       <div class="form-field">
        <div class="field">
            <input type="text" name="name" placeholder="Enter your name">
            <i class="fas fa-user"></i>
        </div>

        <div class="field">
            <input type="text" name="email" placeholder="Enter your email">
            <i class="fas fa-envelope"></i>
</div>
       </div> 
       

        <div class="form-field">
        <div class="field">
            <input type="text" name="phone" placeholder="Enter your phone">
            <i class="fas fa-phone"></i>
        </div>

        <div class="field">
            <input type="text" name="website" placeholder="Enter your website">
            <i class="fas fa-globe"></i>
        </div>
       </div> 
     
    <div class="message">
        <textarea name="message" placeholder="Write your message"></textarea>
        <i class="material-icons">message</i>
    </div>
<div class="button-area">
    <button type="submit" name="submit">Send Message</button>
</div>
    </form>
</div>


<script src="../contact_forms/app.js"></script>
</body>
</html>