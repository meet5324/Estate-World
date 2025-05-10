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
$c_id = $_GET['c_id'];
$p_id = $_GET['p_id'];
?>

<?php include  $mphpToInc . 'navbar.php'; ?>

<div class="hero page-inner overlay" style="background-image: url('../images/hero_bg_4.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Update Property</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="list_property.php">List Property</a>
                        </li>
                        <li class="breadcrumb-item active text-white text-decoration-underline" aria-current="page">
                            Update Property
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-weight-bold text-primary heading">
                    Update Your Properties
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="card shadow">
                <div class="card-body">

                    <?php
                    // $where = 'p_id = ? AND c_id = ?'; 
                    // $values = [$p_id, $c_id];

                    $data = fetchData($conn, 'tbl_property_listing', '*', 'p_id = ? AND c_id = ?', [$p_id, $c_id]);

                    foreach ($data as $row) {

                    ?>

                        <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
                            <!-- hidden input field of the property id  -->
                            <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">
                            <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                            <!-- Property Listing for  -->
                            <h5 class="mb-3">Property Listing For</h5>
                            <div class="form-group mb-4">
                                <label for="status">Property Listing For</label>
                                <select class="form-control" id="status" name="listingFor" required>
                                    <option value="<?php echo $row['listingFor']; ?>"><?php echo $row['listingFor']; ?></option>
                                    <option value="Sell">Sell</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>

                            <!-- Property Details -->
                            <h5 class="mb-3">Property Details</h5>
                            <div class="form-group mb-3">
                                <label for="propertyType">Property Type</label>
                                <select class="form-control" id="propertyType" name="propertyType" required>
                                    <option value="<?php echo $row['propertyType']; ?>"><?php echo $row['propertyType']; ?></option>
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
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required value="<?php echo $row['address']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Size (sq ft)</label>
                                        <input type="number" name="size" class="form-control" id="size" placeholder="Enter size" required value="<?php echo $row['size']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bedrooms">Number of Bedrooms</label>
                                        <input type="number" name="bedrooms" class="form-control" id="bedrooms" required value="<?php echo $row['bedrooms']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bathrooms">Number of Bathrooms</label>
                                        <input type="number" name="bathrooms" class="form-control" id="bathrooms" required value="<?php echo $row['bathrooms']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearBuilt">Year Built</label>
                                        <input type="number" name="yearBuilt" class="form-control" id="yearBuilt" placeholder="Enter year" required value="<?php echo $row['yearBuilt']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="furnishing">Furnishing Status</label>
                                        <select class="form-control" id="furnishing" name="furnishing" required>
                                            <option value="<?php echo $row['furnishing']; ?>"><?php echo $row['furnishing']; ?></option>
                                            <option value="furnished">Furnished</option>
                                            <option value="semi-furnished">Semi-furnished</option>
                                            <option value="unfurnished">Unfurnished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="availableFrom">Available From</label>
                                <input type="date" name="availableFrom" class="form-control" id="availableFrom" required value="<?php echo $row['availableFrom']; ?>">
                            </div>

                            <!-- Pricing Details -->
                            <h5 class="mb-3">Pricing Details</h5>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" required value="<?php echo $row['price']; ?>">
                            </div>
                            <div class="form-group mb-4">
                                <label for="additionalCosts">Additional Costs</label>
                                <input type="text" name="additionalCosts" class="form-control" id="additionalCosts" placeholder="Enter additional costs" value="<?php echo $row['additionalCosts']; ?>">
                            </div>

                            <!-- Property Features -->
                            <h5 class="mb-3">Property Features</h5>
                            <div class="form-row row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="interiorFeatures">Interior Features</label>
                                        <textarea class="form-control" name="interiorFeatures" id="interiorFeatures" rows="3" placeholder="E.g., central air conditioning, heating, appliances"><?php echo $row['interiorFeatures']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exteriorFeatures">Exterior Features</label>
                                        <textarea class="form-control" name="exteriorFeatures" id="exteriorFeatures" rows="3" placeholder="E.g., garden, balcony, parking"><?php echo $row['exteriorFeatures']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="specialFeatures">Special Features</label>
                                <textarea class="form-control" name="specialFeatures" id="specialFeatures" rows="3" placeholder="E.g., swimming pool, gym, security systems"><?php echo $row['specialFeatures']; ?></textarea>
                            </div>

                            <!-- Location Details -->
                            <h5 class="mb-3">Location Details</h5>
                            <div class="form-row row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nearbyAmenities">Nearby Amenities</label>
                                        <textarea class="form-control" name="nearbyAmenities" id="nearbyAmenities" rows="3" placeholder="E.g., schools, hospitals, shopping centers"><?php echo $row['nearbyAmenities']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accessibility">Accessibility</label>
                                        <textarea class="form-control" name="accessibility" id="accessibility" rows="3" placeholder="E.g., public transport, major roads"><?php echo $row['accessibility']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Description -->
                            <h5 class="mb-3">Property Description</h5>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Provide a detailed description of the property" required><?php echo $row['description']; ?></textarea>
                            </div>

                            <!-- Contact Information -->
                            <h5 class="mb-3">Contact Information</h5>
                            <div class="form-row row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contactName">Contact Name</label>
                                        <input type="text" name="contactName" class="form-control" id="contactName" placeholder="Enter your name" required value="<?php echo $row['contactName']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contactNumber">Contact Number</label>
                                        <input type="tel" name="contactNumber" class="form-control" id="contactNumber" placeholder="Enter your contact number" required value="<?php echo $row['contactNumber']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="contactEmail">Email Address</label>
                                <input type="email" name="contactEmail" class="form-control" id="contactEmail" placeholder="Enter your email address" required value="<?php echo $row['contactEmail']; ?>">
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="submit" class="myBtn myBtn-info"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update</button>
                            <button type="reset" class="myBtn myBtn-warning"><i class="fa-solid fa-arrow-rotate-right"></i> Reset</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">

                        <!-- hidden input field of the property id  -->
                        <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">
                        <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">

                        <!-- Photos -->
                        <h5 class="mb-3">Photos</h5>
                        <div class="form-group mb-3">
                            <label for="propertyImages">Upload Images</label>
                            <input type="file" name="propertyImages[]" id="propertyImages" multiple>
                            <div id="imageError" style="color: red; display: none;">You can upload a maximum of 4 images.</div>
                        </div>

                        <!-- Show the old Images  -->
                        <div class="row mb-2">
                            <h6>Old Images</h6>
                            <?php
                            $data1 = fetchData($conn, 'tbl_property_images', '*', 'property_id = ?', [$p_id]);
                            foreach ($data1 as $row1) {
                            ?>
                                <div class="col-md-3">
                                    <img src="<?php echo $propImagesToUpan . $row1['image_name']; ?>" class="img-fluid" alt="Image 1" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $row1['img_id']; ?>">
                                    <input type="hidden" value="<?php echo $row1['image_name']; ?>" name="imageName[]">
                                </div>
                                <!-- Image Modal -->
                                <div class="modal fade" id="imageModal<?php echo $row1['img_id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $row1['img_id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-xl class for extra-large modal -->
                                        <div class="modal-content custom-modal-content"> <!-- Added custom class for styling -->
                                            <div class="modal-header">
                                                <button type="button" class="btn btn-primary float-right ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-3"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo $propImagesToUpan . $row1['image_name']; ?>" alt="Property Image" class="img-fluid" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>

                        <!-- Show new Imges   -->
                        <h6 class="d-none mt-4" id="newImage">New Images</h6>
                        <div class="row" id="imagePreviewContainer">
                            <!-- Selected images will be displayed here -->
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="submitImages" class="myBtn myBtn-info"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    // Retrieve form data
    $cn_id = $_POST['c_id'];
    $pn_id = $_POST['p_id'];
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



    $data = [
        'c_id' => $cn_id,
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

    $where = [
        'p_id' => $pn_id,
        'c_id' => $cn_id
    ];

    $result = updateRecord($conn, 'tbl_property_listing', $data, $where);

    if ($result) {
        $successMessage = "Your Property Data Updated Successfully !!!";
        echo "<script>showSuccessAlert('$successMessage');</script>";
    } else {
        $errorMessage = "Something Went Wrong, Not Updated !!!";
        echo "<script>showErrorAlert('$errorMessage');</script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitImages'])) {
    $cn_id = $_POST['c_id'];
    $pn_id = $_POST['p_id'];

    // File upload handling
    $targetDir =  $upanToUploads . "property_images/";
    $uploadOk = 1;
    $uploadedFiles = [];

    $imageNames = $_POST['imageName'];

    if (!empty($imageNames)) {
        foreach ($imageNames as $imageName) {
            $filePath = $targetDir . $imageName;

            // Delete the file from the folder
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    $flag = true;
                }
            }

            $conditions = [
                'image_name' => $imageName
            ];

            // Call the function with the connection and conditions
            if (deleteData($conn, 'tbl_property_images', $conditions)) {
                $flag = true;
            } else {
                $flag = false;
            }
        }
    }

    foreach ($_FILES["propertyImages"]["name"] as $key => $name) {
        // Ensure the target directory exists
        $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        // Generate a unique name for the file
        $uniqueName = uniqid() . '_' . time() . '.' . $imageFileType;

        // Set the target file path with the unique name
        $targetFile = $targetDir . $uniqueName;

        // Check if image file is a real image
        $check = getimagesize($_FILES["propertyImages"]["tmp_name"][$key]);
        if ($check === false) {
            echo "<script>showErrorAlert('File " . htmlspecialchars($name) . " is not an image.');</script>";
            $uploadOk = 0;
            continue;
        }

        // Check file size (limit to 8MB)
        if ($_FILES["propertyImages"]["size"][$key] > 8388608) {
            echo "<script>showErrorAlert('File " . htmlspecialchars($name) . " is too large.');</script>";
            $uploadOk = 0;
            continue;
        }

        // Allow certain file formats
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "<script>showErrorAlert('Sorry, only JPG, JPEG, PNG, & GIF files are allowed for " . htmlspecialchars($name) . ".');</script>";
            $uploadOk = 0;
            continue;
        }

        // Move uploaded file to target directory
        if ($uploadOk && move_uploaded_file($_FILES["propertyImages"]["tmp_name"][$key], $targetFile)) {
            $uploadedFiles[] = $uniqueName; // Store only the unique file name
        } else {
            echo "<script>showErrorAlert('Sorry, there was an error uploading your file " . htmlspecialchars($name) . ".');</script>";
        }
    }

    if ($uploadOk && !empty($uploadedFiles)) {
        $property_id = $pn_id;

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


    if ($flag2 && $flag) {
        $successMessage = "Your Property Images Updated Successfully !!!";
        echo "<script>showSuccessAlert('$successMessage');</script>";
    } else {
        $errorMessage = "Something Went Wrong, Not Updated !!!";
        echo "<script>showErrorAlert('$errorMessage');</script>";
    }
}

?>


<!-- for the validation of the 4 images max  -->
<!-- for the validation of the 4 images max  -->
<script>
    document.getElementById('propertyImages').addEventListener('change', function() {
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


<!-- for the login modal show if not logged in  -->
<!-- for the login modal show if not logged in  -->
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