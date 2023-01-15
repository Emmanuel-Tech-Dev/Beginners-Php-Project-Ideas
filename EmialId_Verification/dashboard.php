<?php 
  $page_title = "Dashboard Page";
    include "includes/header.php";
    include "includes/navbar.php";
    include "auth.php";
  
    
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
            <?php 
                      if(isset($_SESSION["status"])){
  
                    ?>
                    <div class="">
                         <h5> <?= $_SESSION['status']; ?> </h5> 
                    </div>
                    <?php
                    unset($_SESSION['status']);
                      }
                    ?>

                <div class="card">
                    <div class="card-header">
                    <h1>Dashboard</h1>
                    </div>
                    <div class="card-body">
                        <h4>Access when a user is logged in</h4>
                        
                        <h5>Username: <?= $_SESSION['auth_user']['username'] ;?></h5>
                        <h5>Phone: <?= $_SESSION['auth_user']['phone'] ;?></h5>
                        <h5>Email: <?= $_SESSION['auth_user']['email'] ;?></h5>
                        
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere hic aspernatur accusantium sint placeat deleniti aliquam, aperiam incidunt quaerat vitae qui libero, corrupti eligendi unde assumenda expedita ipsum dolores impedit?
                        </p>

                    </div>
                </div>
            
            </div>
        </div>
    </div>


   
          <li class="nav-item">
        <a class="nav-link " href="logout.php" >LogOut</a>
          </li> 
</div>









<?php 
    include "includes/footer.php";
    
?>
