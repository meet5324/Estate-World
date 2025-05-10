<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>


<div class="hero page-inner overlay" style="background-image: url('../images/hero_bg_1.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Purchase Plans</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            Plans
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="pricing8 py-5" id="plans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h6 class="subtitle font-weight-normal text-dark">PRICING PLAN</h6>
                <h1 class="mb-3 text-dark">Pricing Table</h1>
            </div>
        </div>
        <!-- row  -->
        <div class="row mt-5">
            <!-- column  -->
            <div class="col-md-4 ml-auto pricing-box align-self-center">
                <div class="card mb-4 myShadow myScale border-0 rounded-lg">
                    <div class="card-body p-4 text-center">
                        <h2 class="font-weight-normal my-4"><i class="fa-solid fa-cube" style="color: #fe397a;"></i>
                        </h2>
                        <h5 class="font-weight-normal my-4">Baisc</h5>
                        <!-- <h1 class="fa-solid fa-indian-rupee-sign fa-xs" style="font-weight: 700;">299</h1> -->
                        <h1 class="font-weight-normal my-4" style="font-weight: 700;"><i
                                class="fa-solid fa-indian-rupee-sign fa-xs"></i>&nbsp;299</h1>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See all the Property</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See the Owner's Details</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the Points</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Contact the Owner</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the 10 Points</p>
                        <p class="mt-3"><i class="fa-solid fa-x"></i> Get the Extra 10 Points</p>
                        <button type="button" class="btn btn-sm rounded-pill text-white my-4" data-toggle="modal"
                            data-target="#modal299" style="background-color: #fe397a;">
                            CHOOSE PLAN
                        </button>
                    </div>
                </div>
            </div>
            <!-- column  -->
            <!-- column  -->
            <div class="col-md-4 ml-auto pricing-box align-self-center">
                <div class="card mb-4 myShadow myScale border-0 rounded-lg"
                    style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                    <div class="card-body p-4 text-center">
                        <h2 class="font-weight-normal my-4"><i class="fa-solid fa-trophy" style="color: #10bb87;"></i>
                        </h2>
                        <h5 class="font-weight-normal my-4">Pro</h5>
                        <h1 class="font-weight-normal my-4" style="font-weight: 700;"><i
                                class="fa-solid fa-indian-rupee-sign fa-xs"></i>&nbsp;499</h1>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See all the Property</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See the Owner's Details</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the Points</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Contact the Owner</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the 20 Points</p>
                        <p class="mt-3"><i class="fa-solid fa-x"></i> Get the Extra 10 Points</p>
                        <a class="btn btn-sm rounded-pill text-white my-4" href="#" data-toggle="modal"
                            data-target="#modal499" style="background-color: #10bb87;">CHOOSE PLAN
                        </a>
                    </div>
                </div>
            </div>
            <!-- column  -->
            <!-- column  -->
            <div class="col-md-4 ml-auto pricing-box align-self-center">
                <div class="card mb-4 myShadow myScale border-0 rounded-lg">
                    <div class="card-body p-4 text-center">
                        <h2 class="font-weight-normal my-4"><i class="fa-solid fa-gift" style="color: #5d78ff;"></i>
                        </h2>
                        <h5 class="font-weight-normal my-4">Ultra</h5>
                        <h1 class="font-weight-normal my-4" style="font-weight: 700;"><i
                                class="fa-solid fa-indian-rupee-sign fa-xs"></i>&nbsp;699</h1>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See all the Property</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> See the Owner's Details</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the Points</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Contact the Owner</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the 20 Points</p>
                        <p class="mt-3"><i class="fa-solid fa-check"></i> Get the Extra 10 Points</p>
                        <a class="btn btn-sm rounded-pill text-white my-4" href="#" data-toggle="modal"
                            data-target="#modal699" style="background-color: #5d78ff;">CHOOSE PLAN
                        </a>
                        <!-- <h1 class="font-weight-normal my-4" style="font-weight: 700;">$69</h1>
            <p class="mt-3">Unlimited conferences</p>
            <p class="mt-3">100 participants max</p>
            <p class="mt-3">Custom Hold Music</p>
            <p class="mt-3">10 participants max</p>
            <a class="btn btn-sm rounded-pill text-white my-4" href="#" style="background-color: #5d78ff;">CHOOSE PLAN
            </a> -->
                    </div>
                </div>
            </div>
            <!-- column  -->
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal299">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="modal299" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Payment Gateway</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="number" name="points" value="10" hidden>
                    <!-- <input type="number" name="amount" value="299" hidden> -->
                    <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" name="cardNumber" id="cardNumber"
                            placeholder="Enter card number">
                    </div>
                    <div class="form-row row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="date" class="form-control" name="expiryDate" id="expiryDate"
                                placeholder="MM/YY">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardHolderName">Card Holder Name</label>
                        <input type="text" class="form-control" name="cardHolderName" id="cardHolderName"
                            placeholder="Enter card holder name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="299" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="myBtn rounded-pill myBtn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="pay" class="myBtn rounded-pill myBtn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="modal499" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Payment Gateway</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="number" name="points" value="20" hidden>
                    <!-- <input type="number" name="amount" value="499" hidden> -->
                    <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" name="cardNumber" id="cardNumber"
                            placeholder="Enter card number">
                    </div>
                    <div class="form-row row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="date" class="form-control" name="expiryDate" id="expiryDate"
                                placeholder="MM/YY">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardHolderName">Card Holder Name</label>
                        <input type="text" class="form-control" name="cardHolderName" id="cardHolderName"
                            placeholder="Enter card holder name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="499" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="myBtn rounded-pill myBtn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="pay" class="myBtn rounded-pill myBtn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="modal699" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Payment Gateway</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="number" name="points" value="30" hidden>
                    <!-- <input type="number" name="amount" value="699" hidden> -->
                    <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" name="cardNumber" id="cardNumber"
                            placeholder="Enter card number">
                    </div>
                    <div class="form-row row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="date" class="form-control" name="expiryDate" id="expiryDate"
                                placeholder="MM/YY">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardHolderName">Card Holder Name</label>
                        <input type="text" class="form-control" name="cardHolderName" id="cardHolderName"
                            placeholder="Enter card holder name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="699" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="myBtn rounded-pill myBtn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="pay" class="myBtn rounded-pill myBtn-primary">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'loader.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>

<?php
if (isset($_POST['pay'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();

    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $cardHolderName = $_POST['cardHolderName'];
    $amount = $_POST['amount'];
    $emailInSession = $_POST['email'];
    $point = $_POST['points'];
    $amount = $_POST['amount'];

    // fetch the c_id from the db 

    $data = fetchData($conn, 'login', '*', 'c_email = ?', [$emailInSession]);
    if (!$data) {
        die("Error: No data found for email: " . $emailInSession);
    }
    foreach ($data as $row) {
        // echo '<script>alert("Hello")</script>';
        $c_id = $row['c_id'];
    }

    // check if the data is already present in the db 
    $conditions = [
        'c_id' => $c_id
    ];
    $result = checkIfDataExists($conn, 'tbl_plans_details', $conditions);

    if ($result) {
        // echo 'Data exists';
        // Fetch existing points
        $existingData = fetchData($conn, 'tbl_plans_details', 'points', 'c_id = ?', [$c_id]);
        $existingPoints = $existingData[0]['points'];

        // Update points with the existing points
        $newPoints = $existingPoints + $point;

        $updateData = [
            'o_name' => $cardHolderName,
            'card_num' => $cardNumber,
            'exp_date' => $expiryDate,
            'cvv' => $cvv,
            'amount' => $amount,
            'points' => $newPoints,
        ];
        $checkupdaterecord = updateRecord($conn, 'tbl_plans_details', $updateData, ['c_id' => $c_id]);
        if ($checkupdaterecord) {
            $successMessage = "Payment successful !!!";
            echo "<script>showSuccessAlert('$successMessage');</script>";
        } else {
            $errorMessage = "Data not updated !!!";
            echo "<script>showErrorAlert('$errorMessage');</script>";
        }
    } else {
        // insert the data to the table 
        $dataInsert = [
            'c_id' => $c_id,
            'o_name' => $cardHolderName,
            'card_num' => $cardNumber,
            'exp_date' => date('Y-m-d', strtotime($expiryDate)), // Convert to date format
            'cvv' => $cvv,
            'amount' => $amount,
            'points' => $point,
        ];
        $types = 'issssii';

        $checkInsert = insertData($conn, 'tbl_plans_details', $dataInsert, $types);
        if ($checkInsert) {
            $successMessage = "Payment successful !!!";
            echo "<script>showSuccessAlert('$successMessage');</script>";
        } else {
            $errorMessage = "Data not inserted !!!";
            echo "<script>showErrorAlert('$errorMessage');</script>";
        }
    }
}
?>