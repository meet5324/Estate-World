<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>

<div class="container">
    <div class="page-inner">
        <!-- Card -->
        <h3 class="fw-bold mb-3">Add Admins</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Admins</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form method="POST" action="<?php $_PHP_SELF ?>">
                                    <div class="form-group row align-items-center">
                                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="email" class="col-sm-2 col-form-label">Email Address:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required />
                                            <small id="emailHelp" class="form-text text-danger">We'll never share your email with anyone else, and make sure that the email should be unique. **</small>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone Number:</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="pass" id="password" placeholder="Password" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="cpass" id="confirmPassword" placeholder="Confirm Password" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-item-center justify-content-center">
                                        <button type="submit" name="add" class="btn btn-primary col-sm-3">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass === $cpass) {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $tableName = 'alogin';
        $conditions = [
            'a_email' => $email
        ];

        $result_registration = checkIfDataExists($conn, $tableName, $conditions);

        if ($result_registration) {
            // Email already exists
            $warningMessage = "Email already registered!";
            echo "<script>showWarningAlert('$warningMessage');</script>";
        } else {
            $data = [
                'a_name' => $name,
                'a_email' => $email,
                'a_number' => $number,
                'a_pass' => $hashedPass
            ];
            $types = 'ssss';
            $successMessage = "Admin Added Successfully !!!";

            $registration_insert = insertData($conn, $tableName, $data, $types, $successMessage);

            if ($registration_insert) {
            } else {
                $warningMessage = "Something went Wrong !!! Admin is not Added";
                echo "<script>showWarningAlert('$warningMessage');</script>";
            }
        }
    } else {
        $warningMessage = "Password Doesn\'t Match !!!";
        echo "<script>showWarningAlert('$warningMessage');</script>";
    }
}

?>


<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>