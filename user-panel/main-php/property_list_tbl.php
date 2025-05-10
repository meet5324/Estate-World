<?php
error_reporting(0); // Turn off all error reporting
ini_set('display_errors', 0);   // Do not display errors on the frontend
ini_set('log_errors', 1);   // Enable error logging
ini_set('error_log', '../../log.log');  // Specify the path to the error log file
?>

<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $funToPan . 'function.php'; ?>

<?php
$showModal = false;
if (!isset($_SESSION['email'])) {
    $showModal = true;
} else {
    $email = $_SESSION['email'];
}
?>

<?php include  $mphpToInc . 'navbar.php'; ?>

<?php
// Safely handle undefined index
$c_id = isset($_GET['c_id']) ? $_GET['c_id'] : null;
?>

<div class="hero page-inner overlay" style="background-image: url('../images/hero_bg_4.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">List Properties</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            <a href="list_property.php">List Properties</a>
                        </li>
                        <li class="breadcrumb-item active text-white text-decoration-underline" aria-current="page">
                            <a href="#">List Properties In Tabular Form</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
$where = 'c_id = ?';
$values = [$c_id];
$data = fetchData($conn, 'tbl_property_listing', '*', $where, $values);

?>


<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-weight-bold text-primary heading">
                    Your Uploaded Property
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col" class="align-middle">#</th>
                            <th scope="col" class="align-middle">Image</th>
                            <th scope="col" class="align-middle">Pro. Type</th>
                            <th scope="col" class="align-middle">Price</th>
                            <th scope="col" class="align-middle">Status</th>
                            <th scope="col" class="align-middle">Details</th>
                            <th scope="col" class="align-middle">Update</th>
                            <th scope="col" class="align-middle">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $c = 0;
                        foreach ($data as $row) {
                            $p_id = $row['p_id'];
                            $c++;
                        ?>
                            <tr class="text-center">
                                <th scope="row" class="align-middle"><?php echo $c; ?></th>
                                <td class="align-middle">
                                    <?php
                                    $where2 = 'property_id = ?';
                                    $values2 = [$p_id];
                                    $data2 = fetchData($conn, 'tbl_property_images', '*', $where2, $values2);
                                    $count = 0;
                                    foreach ($data2 as $row2) {
                                        $count++;
                                        if ($count > 1) {
                                            break;
                                        } else {
                                            $thisImage = $propImagesToUpan . $row2['image_name'];
                                    ?>
                                            <img src="<?php echo $thisImage; ?>" alt="Image" width="100" class="img-fluid" />
                                    <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><?php echo $row['propertyType']; ?></td>
                                <td class="align-middle"><?php echo $row['price']; ?></td>
                                <td class="align-middle"><?php echo $row['req_status']; ?></td>
                                <td class="align-middle"><a href="property-single.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>" class="myBtn myBtn-outline-success py-2 px-3"><i class="fa-solid fa-eye"></i></a></td>
                                <td class="align-middle"><a href="property-single-update.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>" class="myBtn myBtn-outline-info py-2 px-3"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="align-middle"><button type="button" class="myBtn myBtn-outline-danger py-2 px-3" data-toggle="modal" data-target="#deleteProperty<?php echo $p_id; ?>"><i class="fa-solid fa-trash"></i></button></td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteProperty<?php echo $p_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center d-flex flex-column justify-content-center align-items-center position-relative" style="background-image: url('<?php echo $thisImage; ?>'); background-size: cover; background-position: center; height: 300px;">
                                            <div class="overlay position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
                                            <div class="content position-relative text-white">
                                                <h4 class="text-white rounded" style="background-color: rgba(255, 255, 255, 0.3); border: 2px solid white;">
                                                    Do You Want to Delete this Property, Which is <?php echo $row['propertyType']; ?> and the Price is <?php echo $row['price']; ?>.
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="property_list_tbl.php" method="POST">
                                                <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                                                <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
                                                <button type="submit" name="deleteProperty" class="myBtn myBtn-danger">Delete</button>
                                            </form>
                                            <button type="button" class="myBtn myBtn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                if ($c === 0) {
                ?>
                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6 text-center mx-auto">
                            <h2 class="font-weight-bold text-primary heading">
                                No Properties Found !!!
                            </h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['deleteProperty'])) {
    $p_id = $_POST['p_id'];
    $cn_id = $_POST['c_id'];
    $flag = false;
    $flag2 = false;

    if ($p_id) {
        // Conditions to delete data from tbl_property_listing
        $conditions = ['p_id' => $p_id];

        if (deleteData($conn, 'tbl_property_listing', $conditions)) {
            // Fetch the image names from tbl_property_images
            $imageNames = fetchData($conn, 'tbl_property_images', 'image_name', 'property_id = ?', [$p_id]);

            // Initialize an array to store the full image paths
            $imagePaths = [];

            foreach ($imageNames as $row) {
                $imagePaths[] = $propImagesToUpan . $row['image_name'];
            }

            // Delete each image from the folder
            foreach ($imagePaths as $image) {
                if (file_exists($image)) {
                    if (unlink($image)) {
                        $flag2 = true;
                    } else {
                        $flag2 = false;
                        echo "<script>alert('Error deleting: $image');</script>"; // Debugging alert
                    }
                } else {
                    echo "<script>alert('File does not exist: $image');</script>"; // Debugging alert
                    $flag2 = true;
                }
            }

            // Delete the data from tbl_property_images
            $condition2 = ['property_id' => $p_id];
            if (deleteData($conn, 'tbl_property_images', $condition2)) {
                $flag = true;
            }

            // Success and error handling
            if ($flag && $flag2) {
                $successMessage = "Your Property Deleted Successfully !!!";
                $url = "property_list_tbl.php?c_id=$cn_id";
                echo "<script>showSuccessAlert('$successMessage', '$url');</script>";
            } elseif ($flag && !$flag2) {
                $warningMessage = "Images deleted from the table but not from the folder.";
                echo "<script>showWarningAlert('$warningMessage');</script>";
            } elseif ($flag2 && !$flag) {
                $warningMessage = "Images deleted from the folder but not from the table.";
                echo "<script>showWarningAlert('$warningMessage');</script>";
            } else {
                $warningMessage = "Images are not deleted !!!";
                echo "<script>showWarningAlert('$warningMessage');</script>";
            }
        } else {
            $errorMessage = "Failed to delete the property !!!";
            echo "<script>alert('$errorMessage');</script>";
        }
    } else {
        $errorMessage = "The Property is Not Found; Property id is Empty !!!";
        echo "<script>alert('$errorMessage');</script>";
    }
}

?>


<!-- below code is for the showing modal to the not login page  -->

<script type="text/javascript">
    // Check if the modal should be shown
    var showModal = <?php echo json_encode($showModal); ?>;

    $(document).ready(function() {
        if (showModal) {
            // Show the login modal
            $('#login').modal('show');
        }

        // Event listener for when the login modal is closed
        $('#login').on('hidden.bs.modal', function() {
            // Check if the user chose to go back or switch to the registration modal
            if (!$('#registration').hasClass('show')) {
                window.history.back(); // Redirect to the previous page
            }
        });

        $('#registration').on('hidden.bs.modal', function() {
            // Check if the user chose to go back or switch to the registration modal
            if (!$('#login').hasClass('show')) {
                window.history.back(); // Redirect to the previous page
            }
        });

        // Event listener to open the registration modal from the login modal
        $('#openRegistrationModal').click(function() {
            $('#login').modal('hide'); // Close the login modal
            $('#registration').modal('show'); // Show the registration modal
        });
    });
</script>

<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'loader.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>