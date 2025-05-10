<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $mphpToInc . 'sidebar.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>

<?php
// Prepare the SQL statement
$fetchData = $conn->prepare("SELECT tbl_property_listing.createdAt, login.c_name, tbl_property_listing.p_id, login.c_id
                            FROM tbl_property_listing 
                            JOIN login ON tbl_property_listing.c_id = login.c_id WHERE tbl_property_listing.req_status = 'panding' ");
$fetchData->execute();
$fetchData->bind_result($createdAt, $c_name, $p_id, $c_id);
if (true) {
    ?>

    <div class="container">
        <div class="page-inner">
            <!-- Card -->
            <h3 class="fw-bold mb-3">Request for the List Property</h3>
            <div class="row">
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="numbers d-flex justify-content-center">
                                    <h4 class="card-title">Sr. No.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-5">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h4 class="card-title">Name</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <h4 class="card-title">Requested_At</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-1">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <p title="Accept" class="card-title"><i
                                            class="fa-regular fa-circle-check text-success"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-1">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <p title="Reject" class="card-title"><i
                                            class="fa-regular fa-circle-xmark text-danger"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <?php
            $date = new DateTime($createdAt);
            $count = 1;
            while ($fetchData->fetch()) {
                ?>

                <div class="row">
                    <div class="col-sm-6 col-md-2">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="numbers d-flex justify-content-center">
                                        <h4 class="card-title"><?php echo $count; ?>.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <a href="prop_details.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>"
                                                title="View Details" class="card-title"><?php echo $c_name; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <h5 class=""><?php echo $date->format('Y-m-d'); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-1">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <button title="Accept" class="btn btn-outline-success btn-sm" data-toggle="modal"
                                            data-target="#acceptModalNo<?php echo $p_id; ?>"><i
                                                class="fa-regular fa-circle-check fs-5 mt-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-1">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <button title="Reject" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#rejectModalNo<?php echo $p_id; ?>"><i
                                                class="fa-regular fa-circle-xmark fs-5 mt-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="acceptModalNo<?php echo $p_id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Accept Request ???</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="<?php echo $aMphpToImg; ?>check.jpg" alt="CHECK" class="h-25 w-25">
                                    <h4 class="mt-3">Do You Really Want to Accept the Request !!!</h4>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="prop_details.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>"
                                    title="View Details" type="button" class="btn btn-info">View Details</a>
                                <div>
                                    <form action="<?php $_PHP_SELF ?>" method="POST">
                                        <input type="text" name="p_id" value="<?php echo $p_id; ?>" hidden>
                                        <button title="Accept Request" type="submit" name="accept"
                                            class="btn btn-success">Accept</button>
                                        <button title="Reject Request" type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="rejectModalNo<?php echo $p_id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Reject Request ???</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?php echo $aMphpToImg; ?>reject.jpg" alt="CHECK" class="h-25 w-25">
                                        <h4 class="mt-3">Do You Really Want to Reject the Request !!!</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <a href="prop_details.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>"
                                    title="View Details" type="button" class="btn btn-info">View Details</a>
                                <div>
                                    <form action="<?php $_PHP_SELF ?>" method="POST">
                                        <input type="text" name="p_id" value="<?php echo $p_id; ?>" hidden>
                                        <button title="Reject Request" type="submit" name="reject"
                                            class="btn btn-danger">Reject</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            }
            $fetchData->close();

            ?>
        </div>
    </div>
<?php } ?>

<?php
$flag = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accept'])) {
        $data = [
            'req_status' => 'approved'
        ];
        $flag = "approved";
    }
    if (isset($_POST['reject'])) {
        $data = [
            'req_status' => 'rejected'
        ];
        $flag = "rejected";
    }

    $pid = $_POST['p_id'];
    $where = [
        'p_id' => $pid
    ];
    $result = updateRecord($conn, 'tbl_property_listing', $data, $where);
    if ($result) {
        echo "<script>showSuccessAlert('Request $flag Successfully !!!');</script>";
    } else {
        echo "<script>showErrorAlert('Operation Failed !!!');</script>";
    }
}
?>
        
<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>