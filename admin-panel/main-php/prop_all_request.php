<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $mphpToInc . 'sidebar.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>



<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="statusSelect">Filter by Status : </label>
                                <div class="d-flex">
                                    <select class="form-control" id="statusSelect" name="status" required>
                                        <option value="">Select Here</option>
                                        <option value="all">All</option>
                                        <option value="approved">Accepted</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="panding">Pending</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-primary mx-3">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="row mt-4">
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

            <div class="col-sm-6 col-md-2">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <p class="card-title">Status</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-0">

        <?php

        if (isset($_POST['submit'])) {
            $request = $_POST['status'];

            $fetchData;

            if ($request == "all") {
                $fetchData = $conn->prepare("SELECT tbl_property_listing.createdAt, login.c_name, tbl_property_listing.p_id, login.c_id, tbl_property_listing.req_status
                FROM tbl_property_listing 
                JOIN login ON tbl_property_listing.c_id = login.c_id");
            } elseif ($request == "approved") {
                $fetchData = $conn->prepare("SELECT tbl_property_listing.createdAt, login.c_name, tbl_property_listing.p_id, login.c_id, tbl_property_listing.req_status
                FROM tbl_property_listing 
                JOIN login ON tbl_property_listing.c_id = login.c_id WHERE tbl_property_listing.req_status = 'approved' ");
            } elseif ($request == "rejected") {
                $fetchData = $conn->prepare("SELECT tbl_property_listing.createdAt, login.c_name, tbl_property_listing.p_id, login.c_id, tbl_property_listing.req_status
                FROM tbl_property_listing 
                JOIN login ON tbl_property_listing.c_id = login.c_id WHERE tbl_property_listing.req_status = 'rejected' ");
            } elseif ($request == "panding") {
                $fetchData = $conn->prepare("SELECT tbl_property_listing.createdAt, login.c_name, tbl_property_listing.p_id, login.c_id, tbl_property_listing.req_status
                FROM tbl_property_listing 
                JOIN login ON tbl_property_listing.c_id = login.c_id WHERE tbl_property_listing.req_status = 'panding' ");
            }


            $fetchData->execute();
            $fetchData->bind_result($createdAt, $c_name, $p_id, $c_id, $status);
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

                    <div class="col-sm-6 col-md-2">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <?php if ($status == "pending") { ?>
                                            <a href="prop_request.php" class="card-title"><?php echo $status; ?></a>
                                        <?php } else { ?>
                                            <p class="card-title"><?php echo $status; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }
            $fetchData->close();
            $count++;
        }
        ?>
    </div>
</div>

<script>
    // Check if the page is loaded due to a back navigation
    if (window.performance && window.performance.navigation.type === 1) {
        // Trigger form resubmission
        document.getElementById('myForm').submit();
    }
</script>

<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>