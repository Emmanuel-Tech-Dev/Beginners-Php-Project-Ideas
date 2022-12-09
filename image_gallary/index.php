<?php

include '../image_gallary/script.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>

<body>


<?php 

$sql = "SELECT * FROM uploads";

$results = mysqli_query($conn, $sql);

?>


    <div class="wrapper">
        <header>
            Image GALLERY with PHP
        </header>
        <?php
    if (isset($_SESSION["status"])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }
    ?>

        <div class="card">
            <div class="card-title">
                <div class="icons">
                    <i class="fa fa-list"></i>
                </div>
                <div class="search">
                    <form>

                        <div class="form-field">

                            <input type="text" name="search" placeholder="search for image" id="live_search">

                            <i class="fa fa-search"></i>
                        </div>

                        <div class="button-area">
                            <button type="submit" name="search_btn">Search</button>
                        </div>

                    </form>
                </div>
                <div class="title">
                    <a href="image_panel.php"><i class="fa fa-upload"></i></a>

                    <span class="tooltiptext">Upload image</span>
                </div>
            </div>
        </div>

        <div class="card-body" id = "results">
            <?php foreach ( $results as $row) { ?>
            <div class="card-content" >
                <div class="card-img">
                    <img src='./upload/<?php echo $row['image']; ?>'>
                </div>
                <div class="card-details">
                    <h3>
                        <?php echo $row['image_name']; ?>
                    </h3>
                    <div class="status">
                        <p>
                            <?php echo $row['time_upload']; ?>
                        </p>
                        <div class="delete-form">
                            <form action="script.php" method="POST">
                                <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">

                                <button type="submit" name="delete_btn"><i class="fa fa-trash"></i></fa-regular>
                                    </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


        

    </div>
    </div>


    <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script> 

    <script>
    
      $(document).ready(function(){
         $("#live_search").keyup(function(){
            search_table($(this).val());
         });

         function search_table(value){
            $("#results .card-content ").each(function(){

                var found = "false";
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                        found = "true"
                    }

                });

                if(found == 'true'){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
         }

      });


    </script>

</body>

</html>