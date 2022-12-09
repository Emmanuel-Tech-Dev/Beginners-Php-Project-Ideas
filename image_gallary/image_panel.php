<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style-form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   
</head>
<body>
<div class="wrapper">
<div class="head">
<div class="title back">
             <a href="index.php"><i class="fa fa-arrow-left"></i></a>
               
               <span class="tooltiptext">Go Back</span>
</div>
<div class="form-header">
       <h4>Upload your Image to Gallery</h4> 
    </div>
   
</div>
    <?php
             if (isset($_SESSION["status"])) {
                        echo "<h4>" . $_SESSION['status'] . "</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>

<form class="form" action="script.php"  method="POST" enctype="multipart/form-data" >
    

    <div class="form-field">
        <input type="file" name="image"  >
    </div>
    <div class="form-field">
        <input type="text" name="name" placeholder="Enter image name" >
    </div>
    <div class="button-area">
       <button type="submit" name='upload'> Upload </button>
    </div>
</form>
</div>
</body>
</html>