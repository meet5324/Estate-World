<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $funToPan . 'function.php'; ?>

<?php
$showModal = false;
if (!isset($_SESSION['email'])) {
    $showModal = true;
} else {
    $email = $_SESSION['email'];
}
$table = 'login';
$where1 = 'c_email = ?';
$data1 = fetchData($conn, $table, '*', $where1, [$email]);
foreach ($data1 as $row1) {
    $c_id = $row1['c_id'];
}
?>
<?php include $mphpToInc . 'navbar.php'; ?>

<div class="hero page-inner overlay" style="background-image: url('../images/hero_bg_4.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">List Properties</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-white text-decoration-underline" aria-current="page">
                            List Properties
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section" id="list">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-weight-bold text-primary heading">
                    Upload Your Properties
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="card border-0" style="width: 20rem; padding-right: 0px;">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Upload Your Property</h5>
                        <div style="height: 250px; width: 250px; border-radius: 1rem; border: 3px dashed;"
                            class="border-primary d-flex justify-content-center align-items-center mb-4">
                            <button type="button" class="myBtn-lg myBtn myBtn-sp rounded-circle" data-toggle="modal"
                                data-target="#propertyForm">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $where = 'c_id = ?';
        $values = [$c_id];
        $data = fetchData($conn, 'tbl_property_listing', '*', $where, $values);

        // Check if there are rows in the data
        if (count($data) > 0) {

            ?>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">
                        Your Uploaded Property
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h4 class="card-title">Watch your Propoerty in the <a
                            href="property_list_tbl.php?c_id=<?php echo $c_id; ?>"
                            class="myBtn myBtn-outline-primary-org">Tabular Form</a>.</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            <?php
                            foreach ($data as $row) {
                                $p_id = $row['p_id'];
                                ?>
                                <div class="property-item">
                                    <a href="property-single.php" class="img">
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
                                                ?>
                                                <img src="<?php echo $propImagesToUpan . $row2['image_name']; ?>" alt="Image"
                                                    class="img-fluid" />
                                                <?php
                                            }
                                        }
                                        ?>
                                    </a>

                                    <div class="property-content">
                                        <div class="price mb-2"><span><i class="fa-solid fa-indian-rupee-sign fa-bounce"></i>
                                                <?php echo $row['price']; ?></span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50"><?php echo $row['address']; ?></span>
                                            <span class="city d-block"><?php echo $row['propertyType']; ?></span>
                                            <span class="d-block mb-3"> Status : <?php echo $row['req_status']; ?></span>

                                            <div class="specs d-flex mb-4">
                                                <span class="d-block d-flex align-items-center me-3">
                                                    <span class="icon-bed me-2"></span>
                                                    <span class="caption"><?php echo $row['bedrooms']; ?></span>
                                                </span>
                                                <span class="d-block d-flex align-items-center">
                                                    <span class="icon-bath me-2"></span>
                                                    <span class="caption"><?php echo $row['bathrooms']; ?></span>
                                                </span>
                                            </div>

                                            <a href="property-single.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>"
                                                class="btn btn-primary py-2 px-3" title="See the Details of the Property">See
                                                details</a>
                                            <a href="property-single-update.php?p_id=<?php echo $p_id; ?>&c_id=<?php echo $c_id; ?>"
                                                class="btn btn-primary py-2 px-3"
                                                title="Update the Details of the Property">Update details</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- .item -->
                            <?php } ?>
                        </div>
                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row my-5 align-items-center">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-weight-bold text-primary heading">
                        You Didn't Upload any Property.
                    </h2>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- your listed property  -->

<!-- Modal -->
<div class="modal fade" id="propertyForm" tabindex="-1" aria-labelledby="propertyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="propertyModalLabel">Property Listing Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                    <?php
                    $where = 'c_email = ?'; // Use placeholders for parameters
                    $values = [$_SESSION['email']]; // Corresponding values
                    $data = fetchData($conn, 'login', '*', $where, $values);
                    foreach ($data as $row) {
                        $cid = $row['c_id'];
                    }
                    ?>
                    <!-- hidden input field of the property id  -->
                    <input type="hidden" name="c_id" value="<?php echo $cid; ?>">
                    <!-- Property Listing for  -->
                    <h5 class="mb-3">Property Listing For</h5>
                    <div class="form-group mb-4">
                        <label for="status">Property Listing For</label>
                        <select class="form-control" id="status" name="listingFor" required>
                            <option value="">Select Reason</option>
                            <option value="Sell">Sell</option>
                            <option value="Rent">Rent</option>
                        </select>
                    </div>

                    <!-- Property Details -->
                    <h5 class="mb-3">Property Details</h5>
                    <div class="form-group mb-3">
                        <label for="propertyType">Property Type</label>
                        <select class="form-control" id="propertyType" name="propertyType" required>
                            <option value="">Select type</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="commercial">Commercial</option>
                            <option value="land">Land</option>
                            <option value="pg">PG</option>
                        </select>
                    </div>

                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Enter address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="size">Size (sq ft)</label>
                                <input type="number" name="size" class="form-control" id="size" placeholder="Enter size"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bedrooms">Number of Bedrooms</label>
                                <input type="number" name="bedrooms" class="form-control" id="bedrooms" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bathrooms">Number of Bathrooms</label>
                                <input type="number" name="bathrooms" class="form-control" id="bathrooms" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yearBuilt">Year Built</label>
                                <input type="number" name="yearBuilt" class="form-control" id="yearBuilt"
                                    placeholder="Enter year" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="furnishing">Furnishing Status</label>
                                <select class="form-control" id="furnishing" name="furnishing" required>
                                    <option value="">Select status</option>
                                    <option value="furnished">Furnished</option>
                                    <option value="semi-furnished">Semi-furnished</option>
                                    <option value="unfurnished">Unfurnished</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="availableFrom">Available From</label>
                        <input type="date" name="availableFrom" class="form-control" id="availableFrom" required>
                    </div>

                    <!-- Pricing Details -->
                    <h5 class="mb-3">Pricing Details</h5>
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price"
                            required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="additionalCosts">Additional Costs</label>
                        <input type="text" name="additionalCosts" class="form-control" id="additionalCosts"
                            placeholder="Enter additional costs">
                    </div>

                    <!-- Property Features -->
                    <h5 class="mb-3">Property Features</h5>
                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="interiorFeatures">Interior Features</label>
                                <textarea class="form-control" name="interiorFeatures" id="interiorFeatures" rows="3"
                                    placeholder="E.g., central air conditioning, heating, appliances"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exteriorFeatures">Exterior Features</label>
                                <textarea class="form-control" name="exteriorFeatures" id="exteriorFeatures" rows="3"
                                    placeholder="E.g., garden, balcony, parking"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="specialFeatures">Special Features</label>
                        <textarea class="form-control" name="specialFeatures" id="specialFeatures" rows="3"
                            placeholder="E.g., swimming pool, gym, security systems"></textarea>
                    </div>

                    <!-- Location Details -->
                    <h5 class="mb-3">Location Details</h5>
                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nearbyAmenities">Nearby Amenities</label>
                                <textarea class="form-control" name="nearbyAmenities" id="nearbyAmenities" rows="3"
                                    placeholder="E.g., schools, hospitals, shopping centers"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="accessibility">Accessibility</label>
                                <textarea class="form-control" name="accessibility" id="accessibility" rows="3"
                                    placeholder="E.g., public transport, major roads"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Property Description -->
                    <h5 class="mb-3">Property Description</h5>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"
                            placeholder="Provide a detailed description of the property" required></textarea>
                    </div>

                    <!-- Photos -->
                    <h5 class="mb-3">Photos</h5>
                    <div class="form-group mb-3">
                        <label for="propertyImages">Upload Images</label>
                        <input type="file" name="propertyImages[]" id="propertyImages" multiple>
                        <div id="imageError" style="color: red; display: none;">You can upload a maximum of 4 images.
                        </div>
                    </div>

                    <!-- Show new Imges   -->
                    <h6 class="d-none mt-4" id="newImage">New Images</h6>
                    <div class="row" id="imagePreviewContainer">
                        <!-- Selected images will be displayed here -->
                    </div>

                    <!-- Contact Information -->
                    <h5 class="mb-3">Contact Information</h5>
                    <div class="form-row row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactName">Contact Name</label>
                                <input type="text" name="contactName" class="form-control" id="contactName"
                                    placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactNumber">Contact Number</label>
                                <input type="tel" name="contactNumber" class="form-control" id="contactNumber"
                                    placeholder="Enter your contact number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="contactEmail">Email Address</label>
                        <input type="email" name="contactEmail" class="form-control" id="contactEmail"
                            placeholder="Enter your email address" required>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="myBtn myBtn-info"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i> Submit</button>
                    <button type="reset" class="myBtn myBtn-warning"><i class="fa-solid fa-arrow-rotate-right"></i>
                        Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Retrieve form data
    $c_id = $_POST['c_id'];
    $listingFor = $_POST['listingFor'];
    $propertyType = $_POST['propertyType'];
    $address = $_POST['address'];
    $size = $_POST['size'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $yearBuilt = $_POST['yearBuilt'];
    $furnishing = $_POST['furnishing'];
    $availableFrom = $_POST['availableFrom'];
    $price = $_POST['price'];
    $additionalCosts = $_POST['additionalCosts'];
    $interiorFeatures = $_POST['interiorFeatures'];
    $exteriorFeatures = $_POST['exteriorFeatures'];
    $specialFeatures = $_POST['specialFeatures'];
    $nearbyAmenities = $_POST['nearbyAmenities'];
    $accessibility = $_POST['accessibility'];
    $description = $_POST['description'];
    $contactName = $_POST['contactName'];
    $contactNumber = $_POST['contactNumber'];
    $contactEmail = $_POST['contactEmail'];

    // File upload handling
    $targetDir = $upanToUploads . "property_images/";
    $allUploadsSuccessful = true;
    $uploadedFiles = []; // Initialize the array to store uploaded file names
    $op1 = false;
    $flag2 = false;

    // Ensure the target directory exists
    if (!is_dir($targetDir)) {
        echo "<script>showErrorAlert('Target directory does not exist.');</script>";
    }

    foreach ($_FILES["propertyImages"]["name"] as $key => $name) {
        $uploadOk = 1; // Reset $uploadOk for each file
        $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        // Generate a unique name for the file
        $uniqueName = uniqid() . '_' . time() . '.' . $imageFileType;
        $targetFile = $targetDir . $uniqueName;

        // Check if image file is a real image
        $check = getimagesize($_FILES["propertyImages"]["tmp_name"][$key]);
        if ($check === false) {
            echo "<script>showErrorAlert('File " . htmlspecialchars($name) . " is not an image.');</script>";
            $uploadOk = 0;
        }

        // Check file size (limit to 8MB)
        if ($_FILES["propertyImages"]["size"][$key] > 8388608) {
            echo "<script>showErrorAlert('File " . htmlspecialchars($name) . " is too large.');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "<script>showErrorAlert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed for " . htmlspecialchars($name) . ".');</script>";
            $uploadOk = 0;
        }

        // Move uploaded file to target directory
        if ($uploadOk && move_uploaded_file($_FILES["propertyImages"]["tmp_name"][$key], $targetFile)) {
            $uploadedFiles[] = $uniqueName; // Store only the unique file name
        } else {
            $allUploadsSuccessful = false; // Mark as unsuccessful if any file fails
        }
    }

    // Proceed if all uploads were successful and files were uploaded
    if ($allUploadsSuccessful && !empty($uploadedFiles)) {
        // Prepare SQL statement to insert data
        $tableName = 'tbl_property_listing';
        $data = [
            'c_id' => $c_id,
            'listingFor' => $listingFor,
            'propertyType' => $propertyType,
            'address' => $address,
            'size' => $size,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'yearBuilt' => $yearBuilt,
            'furnishing' => $furnishing,
            'availableFrom' => $availableFrom,
            'price' => $price,
            'additionalCosts' => $additionalCosts,
            'interiorFeatures' => $interiorFeatures,
            'exteriorFeatures' => $exteriorFeatures,
            'specialFeatures' => $specialFeatures,
            'nearbyAmenities' => $nearbyAmenities,
            'accessibility' => $accessibility,
            'description' => $description,
            'contactName' => $contactName,
            'contactNumber' => $contactNumber,
            'contactEmail' => $contactEmail
        ];
        $types = 'isssiissssddsssssssss';

        if (insertData($conn, $tableName, $data, $types)) {
            $op1 = true;
        }

        // Retrieve the last inserted property_id
        $property_id = $conn->insert_id;

        // Insert images into tbl_property_images
        if (!empty($uploadedFiles)) {
            if ($property_id) {
                $imageTableName = 'tbl_property_images';
                $stmt = $conn->prepare("INSERT INTO $imageTableName (property_id, image_name) VALUES (?, ?)");

                foreach ($uploadedFiles as $fileName) {
                    $stmt->bind_param('is', $property_id, $fileName);
                    if ($stmt->execute()) {
                        $flag2 = true;
                    }
                }
                $stmt->close();
            }
        }

        // Display success or error message
        if ($op1 && $flag2) {
            $successMessage = "Your Property Uploaded Successfully !!! Now Wait for the Accepting from the Admin Side.";
            echo "<script>showSuccessAlert('" . $successMessage . "');</script>";
            echo "<script>window.location.href=window.location.href;</script>";
        } else {
            $errorMessage = "Something went wrong !!!";
            echo "<script>showSuccessAlert('" . $errorMessage . "');</script>";
        }
    }
}
?>


<!-- for the validation of the 4 images max  -->
<script>
    document.getElementById('propertyImages').addEventListener('change', function () {
        const maxImages = 4;
        const imageInput = this;
        const errorDiv = document.getElementById('imageError');

        if (imageInput.files.length > maxImages) {
            errorDiv.style.display = 'block';
            imageInput.value = ''; // Clear the input field
        } else {
            errorDiv.style.display = 'none';
        }
    });
</script>


<!-- below code is for the showing modal to the not login page  -->

<script type="text/javascript">
    // Check if the modal should be shown
    var showModal = <?php echo json_encode($showModal); ?>;

    $(document).ready(function () {
        if (showModal) {
            // Show the login modal
            $('#login').modal('show');
        }

        // Event listener for when the login modal is closed
        $('#login').on('hidden.bs.modal', function () {
            // Check if the user chose to go back or switch to the registration modal
            if (!$('#registration').hasClass('show')) {
                window.history.back(); // Redirect to the previous page
            }
        });

        $('#registration').on('hidden.bs.modal', function () {
            // Check if the user chose to go back or switch to the registration modal
            if (!$('#login').hasClass('show')) {
                window.history.back(); // Redirect to the previous page
            }
        });

        // Event listener to open the registration modal from the login modal
        $('#openRegistrationModal').click(function () {
            $('#login').modal('hide'); // Close the login modal
            $('#registration').modal('show'); // Show the registration modal
        });
    });
</script>


<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'loader.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>