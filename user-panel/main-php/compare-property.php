<?php
include '../../globalvar/globalvariable.php';
include $connToPan . 'config.php';
include $mphpToInc . 'header.php';
include $funToPan . 'function.php';
include $mphpToInc . 'navbar.php';

// Check for property IDs
if (!isset($_GET['p_id1']) || !isset($_GET['p_id2'])) {
    echo "<div class='container mt-5 text-center'><h3 class='text-danger'>Invalid request. Please select two properties to compare.</h3></div>";
    exit;
}

$p_id1 = $_GET['p_id1'];
$p_id2 = $_GET['p_id2'];

// Fetch Property Data for Both Properties
$property1 = fetchData($conn, 'tbl_property_listing', '*', 'p_id = ?', [$p_id1])[0] ?? null;
$property2 = fetchData($conn, 'tbl_property_listing', '*', 'p_id = ?', [$p_id2])[0] ?? null;

if (!$property1 || !$property2) {
    echo "<div class='container mt-5 text-center'><h3 class='text-danger'>One or both properties not found.</h3></div>";
    exit;
}

// Fetch Property Images
$image1 = fetchData($conn, 'tbl_property_images', '*', 'property_id = ?', [$p_id1])[0]['image_name'] ?? '';
$image2 = fetchData($conn, 'tbl_property_images', '*', 'property_id = ?', [$p_id2])[0]['image_name'] ?? '';

$imagePath1 = $propImagesToUpan . $image1;
$imagePath2 = $propImagesToUpan . $image2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Properties</title>
    <style>
        .property-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .property-card:hover {
            transform: scale(1.05);
        }

        .property-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        ul li {
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center text-primary">Compare Properties</h2>
        <div class="card shadow-lg p-4 mt-4 mb-5">
            <div class="table-responsive">
                <!-- Your existing table code here -->
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Feature</th>
                            <th>Property 1</th>
                            <th>Property 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Image</td>
                            <td><img src="<?php echo $imagePath1; ?>" alt="Property 1" width="150"></td>
                            <td><img src="<?php echo $imagePath2; ?>" alt="Property 2" width="150"></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $property1['price']; ?>
                            </td>
                            <td><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $property2['price']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $property1['address']; ?></td>
                            <td><?php echo $property2['address']; ?></td>
                        </tr>
                        <tr>
                            <td>Property Type</td>
                            <td><?php echo $property1['propertyType']; ?></td>
                            <td><?php echo $property2['propertyType']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo $property1['req_status']; ?></td>
                            <td><?php echo $property2['req_status']; ?></td>
                        </tr>
                        <tr>
                            <td>Size (sqft)</td>
                            <td><?php echo $property1['size']; ?></td>
                            <td><?php echo $property2['size']; ?></td>
                        </tr>
                        <tr>
                            <td>Bedrooms</td>
                            <td><?php echo $property1['bedrooms']; ?></td>
                            <td><?php echo $property2['bedrooms']; ?></td>
                        </tr>
                        <tr>
                            <td>Bathrooms</td>
                            <td><?php echo $property1['bathrooms']; ?></td>
                            <td><?php echo $property2['bathrooms']; ?></td>
                        </tr>
                        <!-- <tr>
                        <td>Other Features</td>
                        <td><?php echo $property1['features'] ?? 'N/A'; ?></td>
                        <td><?php echo $property2['features'] ?? 'N/A'; ?></td>
                    </tr> -->
                        <tr>
                            <td>Other Features</td>
                            <td>
                                <ul class="text-start">
                                    <?php
                                    $features1 = [];
                                    if (!empty($property1['interiorFeatures']))
                                        $features1[] = $property1['interiorFeatures'];
                                    if (!empty($property1['exteriorFeatures']))
                                        $features1[] = $property1['exteriorFeatures'];
                                    if (!empty($property1['specialFeatures']))
                                        $features1[] = $property1['specialFeatures'];
                                    if (!empty($property1['nearbyAmenities']))
                                        $features1[] = $property1['nearbyAmenities'];
                                    if (!empty($property1['accessibility']))
                                        $features1[] = $property1['accessibility'];

                                    echo !empty($features1) ? '<li>' . implode('</li><li>', $features1) . '</li>' : 'N/A';
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <ul class="text-start">
                                    <?php
                                    $features2 = [];
                                    if (!empty($property2['interiorFeatures']))
                                        $features2[] = $property2['interiorFeatures'];
                                    if (!empty($property2['exteriorFeatures']))
                                        $features2[] = $property2['exteriorFeatures'];
                                    if (!empty($property2['specialFeatures']))
                                        $features2[] = $property2['specialFeatures'];
                                    if (!empty($property2['nearbyAmenities']))
                                        $features2[] = $property2['nearbyAmenities'];
                                    if (!empty($property2['accessibility']))
                                        $features2[] = $property2['accessibility'];

                                    echo !empty($features2) ? '<li>' . implode('</li><li>', $features2) . '</li>' : 'N/A';
                                    ?>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <?php include $mphpToInc . 'footer.php'; ?>
    <?php include $mphpToInc . 'endlinks.php'; ?>
</body>

</html>