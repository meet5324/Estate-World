<!-- include at fourth -->

<?php
$current_file = basename($_SERVER['PHP_SELF']);
?>

<!-- php code for the inserting data in the database  -->


<?php

// for the registration 
if (isset($_POST["go"])) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $pass = $_POST["password"];
  $cpass = $_POST["cpassword"];

  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

  // Define table and column names
  $tableName = 'login';
  $conditions = [
    'c_email' => $email
  ];


  $result_registration = checkIfDataExists($conn, $tableName, $conditions);
  // Check if the email already exists
  if ($result_registration) {
    // Email already exists
    $warningMessage = "Email already registered!";
    echo "<script>showWarningAlert('$warningMessage');</script>";
  } else {

    if ($cpass === $pass) {
      // $tableName = 'login';
      $data = [
        'c_name' => $name,
        'c_email' => $email,
        'c_number' => $number,
        'c_pass' => $hashedPass
      ];
      $types = 'ssss';
      $successMessage = "Registered Successfully !!!";

      $registration_insert = insertData($conn, $tableName, $data, $types, $successMessage);

      if ($registration_insert) {
        $_SESSION['email'] = $email;

        $successMessage = "Registered Successfully !!!";
        echo "<script>showSuccessAlert('$successMessage');</script>";
      } else {
        $warningMessage = "Session is not SET, Something went Wrong !!!";
        echo "<script>showWarningAlert('$warningMessage');</script>";
      }
    } else {
      $warningMessage = "Password Doesn\'t Match !!!";
      echo "<script>showWarningAlert('$warningMessage');</script>";
    }
  }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// for the logout 
if (isset($_POST['logout'])) {
  session_destroy();
  echo "<script>window.location.href=window.location.href</script>";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//for the login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $tableName = 'login';
  $conditions = [
    'c_email' => $email
  ];

  // Fetch the user record based on the email
  $user = fetchData($conn, $tableName, '*', 'c_email = ?', [$email]);

  if (count($user) > 0) {
    // User found, now verify the password
    $storedHash = $user[0]['c_pass'];

    if (password_verify($pass, $storedHash)) {
      $_SESSION['email'] = $email;
      $_SESSION['c_id'] = $user[0]['c_id'];

      $successMessage = "Login Successful! Welcome back!";
      echo "<script>showSuccessAlert('$successMessage');</script>";
    } else {
      $errorMessage = "Invalid Credentials";
      echo "<script>showErrorAlert('$errorMessage');</script>";
    }
  } else {
    $errorMessage = "Invalid Credentials";
    echo "<script>showErrorAlert('$errorMessage');</script>";
  }
}

?>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="index.php" class="logo m-0 float-start"><img src="../images/E2.png" alt="" height="35"
                        width="35">
                    Estate World</a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="<?php echo ($current_file == 'index.php') ? 'active' : ''; ?>"><a
                            href="index.php">Home</a></li>
                    <li class="has-children <?php echo ($current_file == 'properties.php') ? 'active' : ''; ?>">
                    <li class="has-children <?php if ($current_file == 'properties.php') {
            echo "active";
          } elseif ($current_file == 'list_property.php') {
            echo "active";
          } elseif ($current_file == 'search_property.php') {
            echo "active";
          }
          ?>">
                        <a href="properties.php">Properties</a>
                        <ul class="dropdown">
                            <!-- <li><a href="properties.php">All Property</a></li> -->
                            <li><a href="list_property.php#list">List Property</a></li>
                            <li><a href="search_property.php">Search Property</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo ($current_file == 'compare.php') ? 'active' : ''; ?>"><a
                            href="compare.php">Compare</a>
                    </li>
                    <li class="<?php echo ($current_file == 'plans.php') ? 'active' : ''; ?>"><a
                            href="plans.php#plans">Plans</a>
                    </li>
                    <li class="<?php echo ($current_file == 'services.php') ? 'active' : ''; ?>"><a
                            href="services.php">Services</a></li>
                    <li class="<?php echo ($current_file == 'about.php') ? 'active' : ''; ?>"><a
                            href="about.php">About</a>
                    </li>
                    <li class="<?php echo ($current_file == 'contact.php') ? 'active' : ''; ?>"><a
                            href="contact.php">Contact
                            Us</a></li>

                    <li>
                        <?php
            if (isset($_SESSION['email'])) {
              ?>
                        <button type="button" class="myBtn myBtn-primary myBtn-spehov" data-bs-toggle="modal"
                            data-bs-target="#logout">
                            logout <i class="fa-solid fa-right-from-bracket text-white bg-outline-white ml-3"></i>
                        </button>
                        <?php
            } else {
              ?>
                        <button type="button" class="myBtn myBtn-primary myBtn-spehov" data-bs-toggle="modal"
                            data-bs-target="#login">
                            login <i class="fa-solid fa-right-to-bracket text-white bg-outline-white ml-2"></i>
                        </button>
                        <?php } ?>
                    </li>
                </ul>

                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>


<!-- the Modal Section starts ... -->

<!-- Modal for the login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login
                    <?php echo $showModal ? "- Firstly login to access the Page." : ""; ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="m-3">
                    <form method="POST" action="<?php $_PHP_SELF ?>">

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4 ">
                            <label class="form-label text-dark" for="form3Example3">Email address</label>
                            <input type="email" name="email" id="form3Example3"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter a valid email address" autocomplete="email" required />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label text-dark" for="form6Example6">Password</label>
                            <input type="password" name="password" id="form6Example6"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter password" required />
                        </div>

                        <button type="submit" name="login" class="myBtn myBtn-primary">Login</button>

                </div>
            </div>
            <div class="modal-footer">
                <p class="small fw-bold mt-2 pt-1 mb-0">Do not have an account?
                    <button type="button" class="myBtn myBtn-primary" data-bs-toggle="modal"
                        data-bs-target="#registration">
                        Register
                    </button>
                    <button type="button" class="myBtn myBtn-dark" data-bs-dismiss="modal">Close</button>
                </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal for the registration  -->
<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration
                    <?php echo $showModal ? "- Firstly Register to access the Page." : ""; ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="m-3">
                    <form method="POST" action="<?php $_PHP_SELF ?>">

                        <!-- Name input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label text-dark" for="form3Example1">Your Name</label>
                            <input type="text" id="form3Example1"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter your name" name="name" autocomplete="name" required />
                        </div>

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4 ">
                            <label class="form-label text-dark" for="form7Example7">Email address</label>
                            <input type="email" id="form7Example7"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter a valid email address" name="email" autocomplete="email" required />
                        </div>

                        <!-- phone number -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label text-dark" for="formPhoneNumber">Phone number</label>
                            <input type="tel" id="formPhoneNumber"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter a valid phone number" name="number" required />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label text-dark" for="form8Example8">Password</label>
                            <input type="password" id="form8Example8"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Enter password" name="password" required />
                        </div>

                        <!-- confirm-password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label text-dark" for="formConfirmPassword">Confirm Password</label>
                            <input type="password" id="formConfirmPassword"
                                class="form-control form-control-lg border-2 myBorder-primary"
                                placeholder="Confirm password" name="cpassword" required />
                        </div>

                        <button type="submit" name="go" class="myBtn myBtn-primary">Register</button>

                </div>
            </div>
            <div class="modal-footer">
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
                    <button type="button" class="myBtn myBtn-primary" data-bs-toggle="modal" data-bs-target="#login">
                        Login
                    </button>
                    <button type="button" class="myBtn myBtn-dark" data-bs-dismiss="modal">Close</button>
                </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- below modal is for the logout  -->

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Logout ??</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex">
                <img src="../images/alert.jpg" alt="Logout" width="100" height="100">
                <h4 class="text-center d-flex align-items-center">
                    Do You Want To Logout ???
                </h4>
            </div>
            <div class="modal-footer">
                <form action="<?php $_PHP_SELF ?>" method="POST">
                    <button type="submit" name="logout" class="myBtn myBtn-danger">Logout</button>
                </form>
                <button type="button" class="myBtn myBtn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>