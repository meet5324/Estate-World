<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>

<?php
$id = $_GET['id'];
$email = $_GET['email'];
?>

<div class="container">
    <div class="page-inner">
        <!-- Card -->
        <h3 class="fw-bold mb-3">Edit Admins</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Admins</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <form method="POST" action="<?php $_PHP_SELF ?>">
                                    <?php
                                    $tableName = 'alogin';
                                    $columns = '*';
                                    $where = 'a_id = ? AND a_email = ?'; // Two placeholders
                                    $values = [$id, $email]; // Corresponding two values

                                    $data = fetchData($conn, $tableName, $columns, $where, $values);


                                    foreach ($data as $row) {

                                    ?>
                                        <input type="text" name="id" value="<?php echo $row['a_id']; ?>" hidden>

                                        <div class="form-group row align-items-center">
                                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo $row['a_name']; ?>" required />
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="email" class="col-sm-2 col-form-label">Email Address:</label>
                                            <div class="col-sm-10">
                                                <input type="email" title="Cant Change the Email !!!" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo $row['a_email']; ?>" required disabled />
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo $row['a_email']; ?>" required hidden />
                                                <small id="emailHelp" class="form-text text-muted">Can't Change Email Address. **</small>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone Number:</label>
                                            <div class="col-sm-10">
                                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" value="<?php echo $row['a_number']; ?>" required />
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="changePassword" class="col-sm-2 col-form-label">Change Password:</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" id="changePassword" name="changePassword" title="Check for the Chnaging the Password." onclick="togglePasswordFields()">
                                            </div>
                                        </div>

                                        <div id="passwordFields" style="display:none;">
                                            <div class="form-group row align-items-center">
                                                <label for="oldPassword" class="col-sm-2 col-form-label">Old Password:</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="opass" id="oldPassword" placeholder="Enter Your Old Password">
                                                </div>
                                            </div>

                                            <div class="form-group row align-items-center">
                                                <label for="newPassword" class="col-sm-2 col-form-label">New Password:</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="pass" id="newPassword" placeholder="New Password">
                                                </div>
                                            </div>

                                            <div class="form-group row align-items-center">
                                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="cpass" id="confirmPassword" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row align-item-center justify-content-center">
                                            <button type="submit" name="update" class="btn btn-primary col-sm-3">Update</button>
                                        </div>
                                    <?php } ?>
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

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $number = $_POST['phone'];
    $emailU = $_POST['email'];
    $idU = $_POST['id'];

    $result = false;
    $flag = false;
    $changePass = $_POST['changePassword'];
    if ($changePass) {
        $oldPass = $_POST['opass'];
        $newPass = $_POST['pass'];
        $confPass = $_POST['cpass'];
    }

    $tableName = "alogin";
    $where = [
        'a_id' => $idU,
        'a_email' => $emailU
    ];

    if ($changePass) {
        if ($newPass === $confPass) {
            $resultCheck = fetchData($conn, 'alogin', '*', 'a_email = ?', [$emailU]);
            $storedHash = $resultCheck[0]['a_pass'];
            if (password_verify($oldPass, $storedHash)) {
                $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
                $data = [
                    'a_name' => $name,
                    'a_number' => $number,
                    'a_pass' => $hashedPass
                ];

                $result = updateRecord($conn, $tableName, $data, $where);
                if ($result) {
                    $successMessage = "Details Updated Successfully !!!";
                    echo "<script>showSuccessAlert('$successMessage');</script>";
                } else {
                    $errorMessage =  "Failed to Update Details !!!";
                    echo "<script>showErrorAlert('$errorMessage');</script>";
                }
            } else {
                $errorMessage = "Old Password is Wrong !!!";
                echo "<script>showErrorAlert('$errorMessage');</script>";
            }
        } else {
            $warningMessage = "Password Does not Match with the Confirm Password !!!";
            echo "<script>showWarningAlert('$warningMessage');</script>";
        }
    } else {
        $data = [
            'a_name' => $name,
            'a_number' => $number
        ];

        $result = updateRecord($conn, $tableName, $data, $where);
        if ($result) {
            $successMessage = "Details Updated Successfully !!!";
            echo "<script>showSuccessAlert('$successMessage');</script>";
        } else {
            $errorMessage =  "Failed to Update Details !!!";
            echo "<script>showErrorAlert('$errorMessage');</script>";
        }
    }
}

?>

<script>
    function togglePasswordFields() {
        var checkBox = document.getElementById("changePassword");
        var passwordFields = document.getElementById("passwordFields");
        var oldPassword = document.getElementById("oldPassword");
        var newPassword = document.getElementById("newPassword");
        var confirmPassword = document.getElementById("confirmPassword");

        if (checkBox.checked == true) {
            passwordFields.style.display = "block";
            oldPassword.required = true;
            newPassword.required = true;
            confirmPassword.required = true;
        } else {
            passwordFields.style.display = "none";
            oldPassword.required = false;
            newPassword.required = false;
            confirmPassword.required = false;
        }
    }
</script>




<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>