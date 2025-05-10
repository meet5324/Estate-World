<?php
include '../globalvar/globalvariable.php';
include  $aLoginToConn . 'config.php';
include $aLoginToFun . 'function.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="assets/img/E2.png" type="image/x-icon" />

    <!-- my font awesome kit link  -->
    <script src="https://kit.fontawesome.com/ed83cd24d3.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Admin Login</title>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .myCard {
            transition: .4s ease-in-out;
            border-radius: 15px;
        }

        .myCard:hover {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        #togglePassword {
            cursor: pointer;
            position: absolute;
            right: 5px;
            top: 70%;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
        }

        .form-control-lg {
            padding-right: 40px;
            /* Adjust this value to make space for the icon */
        }
    </style>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo $saToLogin; ?>sweet_alert.js"></script>
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="<?php echo $aLoginToImg; ?>draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 myCard p-5" style="box-sizing: border-box;">
                    <h1 class="my-3">Admin Sign in ...</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input name="email" type="email" id="form1Example13" placeholder="Enter Your Email Address..." class="form-control form-control-lg" required autocomplete="on" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4" style="position: relative;">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input name="pass" type="password" id="form1Example23" placeholder="Don't Lie Here..." class="form-control form-control-lg" required />
                            <span class="input-group-text" id="togglePassword" style="position: absolute; right: 5px; top: 70%; transform: translateY(-50%); cursor: pointer; background-color: transparent; display: none;">
                                <i class="fa-solid fa-eye text-primary"></i>
                            </span>
                        </div>


                        <!-- Submit button -->
                        <button type="submit" name="sign_in" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>

                    <!-- <button onclick="showSuccessAlert('This is a success message with redirect!','main-php/index.php')">Test Redirect Alert</button> -->

                </div>
            </div>
        </div>
    </section>

    <?php

    if (isset($_POST['sign_in'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $tableName = 'alogin';

        // Check if the connection and fetchData are working
        if ($conn) {
            $admin = fetchData($conn, $tableName, '*', 'a_email = ?', [$email]);

            if (count($admin) > 0) {
                $storedHash = $admin[0]['a_pass'];
                if (password_verify($pass, $storedHash)) {

                    $_SESSION['aemail'] = $email;

                    if (isset($_SESSION['aemail'])) {
                        // After successful login or some action
                        $successMessage = "Login Successful! Welcome back!";
                        $redirectUrl = "main-php/index.php";
                        echo "<script>showSuccessAlert('$successMessage', '$redirectUrl');</script>";
                    } else {
                        $errorMessage = "Session is not Setting.";
                        echo "<script>showErrorAlert('$errorMessage');</script>";
                    }
                } else {
                    // Debugging: Print failure message
                    echo "Password verification failed.";
                    $errorMessage = "Invalid Credentials";
                    echo "<script>showErrorAlert('$errorMessage');</script>";
                }
            } else {
                $errorMessage = "Invalid Credentials";
                echo "<script>showErrorAlert('$errorMessage');</script>";
            }
        } else {
            echo "Database connection failed."; // Debug: Check if the connection is the issue
        }
    }

    ?>

    <script>
        const passwordField = document.getElementById('form1Example23');
        const togglePassword = document.getElementById('togglePassword');

        // Function to toggle the visibility of the eye icon
        function toggleEyeIcon() {
            if (passwordField.value.length > 0) {
                togglePassword.style.display = 'block';
            } else {
                togglePassword.style.display = 'none';
            }
        }

        // Listen for input events on the password field
        passwordField.addEventListener('input', toggleEyeIcon);

        // Listen for click events on the eye icon
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');

        });

        // Initial call to set the correct state of the eye icon
        toggleEyeIcon();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>