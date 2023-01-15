<?php 

session_start();

   $page_title = "Change Password Page";
    include "includes/header.php";
    include "includes/navbar.php";
?>

 <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                  <?php 
                      if(isset($_SESSION["status"])){
  
                    ?>
                    <div class="alert alert-success">
                         <h5> <?= $_SESSION['status']; ?> </h5> 
                    </div>
                    <?php
                    unset($_SESSION['status']);
                      }
                    ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="password_reset_code.php" method="POST">
                            <input type="hidden" name="password_token" value ="<?php  if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" value ="<?php  if(isset($_GET['email'])){echo $_GET['email'];} ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">New Password</label>
                                <input type="text" name="new_password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="text" name="cpassword" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="update_password" class="btn btn-success w-100">Update Password</button>
                            
                            </div>

                        </form>
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

<?php 
    include "includes/footer.php";
    
?>