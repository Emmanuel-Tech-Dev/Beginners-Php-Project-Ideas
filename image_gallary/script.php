<?php
session_start();


$host = "localhost";
$server = "root";
$password = "";
$dbname = "img_db";

$conn = mysqli_connect($host, $server, $password, $dbname);



if(isset($_POST['upload'])){

    $filename = $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    //folder where images will be uploaded
    $folder = './upload/';
    //function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder.$filename);
    $name = $_POST['name'];

    if(empty($filename) && empty($name)){
     
        $_SESSION['status']=  "<div class = 'alert alert-danger'>
       Uplaod a valid image and input a valid name!
        </div>";

        header("Location: image_panel.php");
    }
else{


    $sql = "INSERT INTO `uploads`(`image`, `image_name`) VALUES ('$filename', '$name')";
    
    $sql_run = mysqli_query($conn, $sql);
  
    if($sql_run){
      
      $_SESSION['status']=  "<div class = 'alert alert-success'>
              Upload Successful!
              </div>";
              sleep(10);
              header('Location: http://localhost:3000/Beginner/image_gallary/index.php');
    }
    else
    {
        $_SESSION['status']=  "<div class = 'alert alert-danger'>
              Upload failed!
              </div>";
    }
    
}


}


if(isset($_POST['delete_btn'])){

    $delete_item = mysqli_real_escape_string($conn , $_POST['delete']);;

  
    $delete_query = "DELETE FROM `uploads` WHERE id = $delete_item" ; 
  
    $query_run = mysqli_query($conn , $delete_query);

    if($query_run){

        $_SESSION['status']=  "<div class = 'alert alert-success'>
        Delete item successful!
        </div>";

        header('Location: http://localhost:3000/Beginner/image_gallary/index.php');

    }else{
        $_SESSION['status']=  "<div class = 'alert alert-danger'>
        failed to delete item!
        </div>";

        header('Location: http://localhost:3000/Beginner/image_gallary/index.php');
    }

   

}







?>