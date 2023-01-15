<?php

session_start();
if (isset($_SESSION['authenticated'])) {


    $_SESSION['status'] = "You are already logged In";
    header("Location: dashboard.php");
    exit(0);
}

$page_title = "Registration Page";
include "includes/header.php";
include "includes/navbar.php";

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                    <?php
                    if (isset($_SESSION["status"])) {
                        echo "<h4>" . $_SESSION['status'] . "</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="+2335546464">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="name@yourmail.com"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="125@#$%56"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="c_password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>
                                    <input type="checkbox" name="terms">
                                    I agree to the terms and conditions.
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
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