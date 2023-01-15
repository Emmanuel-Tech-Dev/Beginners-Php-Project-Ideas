<?php 

session_start();

   $page_title = "Password Reset";
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
                        <h4>Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="password_reset_code.php" method="POST">
                            
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            
                            
                            <div class="form-group">
                                <button type="submit" name="reset_pass_btn" class="btn btn-primary">Reset Password</button>
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