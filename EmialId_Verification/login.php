<?php

session_start();
if (isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = "You are already logged in";
    header("Location: dashboard.php");
    exit(0);
}


$page_title = "login Page";
include "includes/header.php";
include "includes/navbar.php";


?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                  if (isset($_SESSION["status"])) {

                  ?>
                <div class="">
                    <h5>
                        <?= $_SESSION['status']; ?>
                    </h5>
                </div>
                <?php
                      unset($_SESSION['status']);
                  }
                    ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h4>LogIn Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="youremail@gmail.com" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="125@#$%56" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-primary">logIn</button>
                                <a href="password_reset.php" class="float-end">Forgot password</a>
                            </div>

                        </form>
                        <hr>
                        <h6>
                            Did not recevied your verification code?
                            <a href="resend_verification.php">Resend</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";

?>