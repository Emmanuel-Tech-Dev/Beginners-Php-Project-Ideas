

<div class="bg-dark">
<div class="container">


    <div class="row">
        <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tutorial</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto mb-2 mb-lg-0">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        
       

        
        <?php  if(!isset($_SESSION['authenticated'])):?>
 
         <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
        <a class="nav-link" href="login.php">logIn</a>
          </li> 
         


        <?php  elseif(isset($_SESSION['authenticated'])):?>
          <li class="nav-item">
        <a class="nav-link" href="login.out">log Out</a>
          </li> 
          <a class="nav-link" href="dashboard.php" >Dashboard</a>' ; 
        <?php  endif;?>
      </div>
    </div>
  </div>
</nav>
        </div>
    </div>
</div>
</div>