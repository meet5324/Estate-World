<?php include '../../globalvar/globalvariable.php'; ?>
<?php include  $connToPan . 'config.php'; ?>
<?php include  $mphpToInc . 'header.php'; ?>
<?php include  $mphpToInc . 'sidebar.php'; ?>
<?php include  $funToPan . 'function.php'; ?>
<?php include  $mphpToInc . 'navbar.php'; ?>

<style>
    .custom-modal-content {
        background-color: rgba(255, 255, 255, 0);
        /* White with transparency */
        border: none;
        /* Remove border */
        box-shadow: none;
        /* Remove shadow */
    }

    .custom-modal-content .modal-header,
    .custom-modal-content .modal-body {
        background-color: rgba(255, 255, 255, 0);
        /* Transparent background */
    }

    .custom-modal-content .modal-body {
        padding: 0;
        /* Remove padding from modal body */
    }

    .custom-modal-content img {
        display: block;
        margin: 0 auto;
    }

    .custom-modal-content .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
        /* Make the cross white */
    }
</style>

<?php
$p_id = $_GET['p_id'];
$c_id = $_GET['c_id'];

$tableName1 = 'login';
$where1 = 'c_id = ?'; // Use placeholders for parameters
$values1 = [$c_id]; // Corresponding values
$data1 = fetchData($conn, $tableName1, '*', $where1, $values1);
foreach ($data1 as $row1) {
    $c_name = $row1['c_name'];
}

$tableName = 'tbl_property_listing';
$where = 'p_id = ?'; // Use placeholders for parameters
$values = [$p_id]; // Corresponding values
$data = fetchData($conn, $tableName, '*', $where, $values);
foreach ($data as $row) {
?>

    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <div class="card-title">Property Details.</div>
                                <?php if ($c_name) { ?>
                                    <div class="card-title">Listed By <?php echo $c_name; ?>.</div>
                                <?php } ?>
                            </div>
                            <div class="mt-3">
                                <button id="goBackButton" class="btn btn-primary">Go Back</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <th scope="row">Property Listing For : </th>
                                                    <td><?php echo $row['listingFor']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <th scope="row">Property type : </th>
                                                    <td><?php echo $row['propertyType']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <th scope="row">Address : </th>
                                                    <td><?php echo $row['address']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Size : </th>
                                                    <td><?php echo $row['size']; ?> sqft</td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Number of Badrooms : </th>
                                                    <td><?php echo $row['bedrooms']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Number_of_Bathrooms_: </th>
                                                    <td><?php echo $row['bathrooms']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Year Built : </th>
                                                    <td><?php echo $row['yearBuilt']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Furnishing Status : </th>
                                                    <td><?php echo $row['furnishing']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Available From : </th>
                                                    <td><?php echo $row['availableFrom']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Price : </th>
                                                    <td><?php echo $row['price']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Additional Cost : </th>
                                                    <td><?php echo $row['additionalCosts']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <th scope="row">Interior Features : </th>
                                                    <td><?php echo $row['interiorFeatures']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Exterior Fetures : </th>
                                                    <td><?php echo $row['exteriorFeatures']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Special Fetures : </th>
                                                    <td><?php echo $row['specialFeatures']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Nearby Amenities : </th>
                                                    <td><?php echo $row['nearbyAmenities']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Accessibility : </th>
                                                    <td><?php echo $row['accessibility']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Property Description : </th>
                                                    <td><?php echo $row['description']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Contact Name : </th>
                                                    <td><?php echo $row['contactName']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Contact Number : </th>
                                                    <td>+91 <?php echo $row['contactNumber']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <th scope="row">Contact Email : </th>
                                                    <td><?php echo $row['contactEmail']; ?></td>
                                                </div>
                                            </div>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Images Section -->
                                <div class="container">
                                    <div class="property-images row">
                                        <?php
                                        // Fetch images for the property
                                        $tableImages = 'tbl_property_images';
                                        $whereImages = 'property_id = ?'; // Use placeholders for parameters
                                        $valuesImages = [$p_id]; // Corresponding values
                                        $images = fetchData($conn, $tableImages, '*', $whereImages, $valuesImages);

                                        foreach ($images as $index => $image) {
                                        ?>
                                            <div class="col-md-6 mb-3">
                                                <img src="<?php echo  $propImages . $image['image_name']; ?>" alt="Property Image" class="img-fluid" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $index; ?>" />
                                            </div>

                                            <!-- Image Modal -->
                                            <div class="modal fade" id="imageModal<?php echo $index; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $index; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-xl class for extra-large modal -->
                                                    <div class="modal-content custom-modal-content"> <!-- Added custom class for styling -->
                                                        <div class="modal-header">
                                                            <button type="button" class="btn btn-primary float-right ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-3"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?php echo $propImages . $image['image_name']; ?>" alt="Property Image" class="img-fluid" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<script>
    // Function to handle the Go Back button click
    function handleGoBack() {
        // Get the referrer URL
        const referrer = document.referrer;

        // Check the referrer and set the redirection accordingly
        if (referrer.includes('prop_all_request.php')) {
            // Redirect to Page X if the referrer is Page X
            window.location.href = 'prop_all_request.php'; // Replace with the actual URL of Page X
        } else if (referrer.includes('prop_request.php')) {
            // Redirect to Page Y if the referrer is Page Y
            window.location.href = 'prop_request.php'; // Replace with the actual URL of Page Y
        } else {
            // Default action or fallback URL
            // window.history.back();
            // Go back to the previous page
        }
    }

    // Attach the function to the Go Back button
    document.getElementById('goBackButton').addEventListener('click', handleGoBack);
</script>

<?php include  $mphpToInc . 'footer.php'; ?>
<?php include  $mphpToInc . 'endlinks.php'; ?>