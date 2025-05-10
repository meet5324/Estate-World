<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<style>
    #map {
        height: 500px;
        width: 100%;
        margin-top: 20px;
    }

    .blur {
        filter: blur(8px);
        pointer-events: none;
        user-select: none;
    }

    .unblur {
        filter: none;
        pointer-events: auto;
        user-select: auto;
    }
</style>

<?php
$p_id = isset($_GET['p_id']) ? (int) $_GET['p_id'] : 0;
$c_id = $_SESSION['c_id'];
if ($c_id === 0 || $p_id === 0) {
    exit("Error: Missing c_id or p_id");
}
$query_stmt = $conn->prepare("SELECT revealed_at FROM tbl_revealed_details WHERE c_id = ? AND property_id = ?");
$query_stmt->bind_param("ii", $c_id, $p_id);
if (!$query_stmt->execute()) {
    exit("Query execution failed: " . $query_stmt->error);
}
$query_result = $query_stmt->get_result();
if ($query_result->num_rows == 0) {
    $reveal_time = false;
} else {
    $fetch_row = $query_result->fetch_assoc();
    $reveal_time = $fetch_row['revealed_at']; // Correct variable
    // echo "<script>console.log('" . $reveal_time . "')</script>"; // Use the correct variable
}
$query_stmt->close();
?>


<!-- code for the hero bg  -->
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
        $hero_bg = $propImagesToUpan . $row2['image_name'];
    }
}
?>

<?php
// if ($c_id) {
//   $where = 'c_id = ? AND p_id = ?';
//   $values = [$c_id, $p_id];
// } else {
$where = 'p_id = ?';
$values = [$p_id];
// }
$data = fetchData($conn, 'tbl_property_listing', '*', $where, $values);

// Check if there are rows in the data
if (count($data) > 0) {
    foreach ($data as $row) {
        ?>
        <?php $defaultCity = $row['address']; ?>
        <div class="hero page-inner overlay" style="background-image: url('<?php echo $hero_bg; ?>')">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-9 text-center mt-5">
                        <h1 class="heading" data-aos="fade-up">
                            <?php echo $row['address']; ?>
                        </h1>

                        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                            <ol class="breadcrumb text-center justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="list_property.php">List Property</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="properties.php" class="text-decoration-underline">Properties</a>
                                </li>
                                <li class="breadcrumb-item active text-white-50 text-decoration-underline" aria-current="page">
                                    <?php echo $row['address']; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <div class="img-property-slide-wrap">
                            <div class="img-property-slide">
                                <?php
                                $where1 = 'property_id = ?';
                                $values1 = [$p_id];
                                $data1 = fetchData($conn, 'tbl_property_images', '*', $where1, $values1);
                                foreach ($data1 as $row1) {
                                    ?>
                                    <img src="<?php echo $propImagesToUpan . $row1['image_name']; ?>" alt="Image"
                                        class="img-fluid" />
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="heading text-primary"> <?php echo $row['address']; ?></h2>
                        <p class="meta"> <?php echo $row['propertyType']; ?></p>
                        <p class="text-black-50">
                            <?php echo $row['interiorFeatures']; ?>
                        </p>
                        <p class="text-black-50">
                            <?php echo $row['exteriorFeatures']; ?>
                        </p>
                        <p class="text-black-50">
                            <?php echo $row['specialFeatures']; ?>
                        </p>

                        <div class="d-block agent-box p-5 <?php echo (!($reveal_time) ? 'blur' : '') ?>" id="agent-details">
                            <div class="img mb-4">
                                <img src="../images/person_2-min.jpg" alt="Image" class="img-fluid" />
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><?php echo $row['contactName']; ?></h3>
                                <div class="meta"><?php echo $row['contactEmail']; ?></div>
                                <div class="meta mb-3"><?php echo $row['contactNumber']; ?></div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Ratione laborum quo quos omnis sed magnam id ducimus saepe
                                </p>
                                <ul class="list-unstyled social dark-hover d-flex">
                                    <li class="me-1">
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                    <li class="me-1">
                                        <a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="me-1">
                                        <a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="me-1">
                                        <a href="#"><span class="icon-linkedin"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <?php
                        if (!$reveal_time) {
                            ?>
                            <button class="btn btn-primary mt-3 py-2 px-3 reveal-btn" data-cid="<?php echo $_SESSION['c_id'] ?>"
                                data-pid="<?php echo $p_id; ?>" data-email="<?php $_SESSION['email'] ?>"
                                onclick="toggleBlur()">Reveal
                                Details</button>
                        <?php } ?>
                    </div>

                    <div id="map"></div>
                </div>
            </div>
        </div>

    <?php }
} ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".reveal-btn").forEach(button => {
            button.addEventListener("click", function () {
                let cid = this.getAttribute("data-cid");
                let pid = this.getAttribute("data-pid");
                let email = this.getAttribute("data-email");
                // console.log(cid);

                fetch("../../api/reveal_property.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        cid: cid,
                        pid: pid,
                        email: email
                    })
                })
                    .then(response => response.text()) // Get response as text first
                    .then(text => {
                        // console.log("Raw Response:", text); // Log the raw response
                        return JSON.parse(text); // Try parsing JSON
                    })
                    .then(data => {
                        // console.log("Status Code:", data.status_code);
                        if (data.status_code == 422) {
                            alert("Something went Wrong");
                        }
                        if (data.status_code == 200) {
                            const detailsDiv = document.getElementById('agent-details');
                            detailsDiv.classList.toggle('blur');
                            document.querySelectorAll(".reveal-btn").forEach(button => {
                                button.classList.add("d-none");
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Parsing Error:", error);
                        alert("Something went Wrong");
                    });

            });
        });
    });
</script>

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    let map;
    let defaultCity = "<?php echo $defaultCity; ?>";

    function initMap(lat = 20.5937, lng = 78.9629, zoom = 5) {
        if (map) {
            map.remove(); // Remove existing map before reinitializing
        }

        map = L.map('map').setView([lat, lng], zoom);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup("Selected Location")
            .openPopup();
    }

    function searchLocation(event) {
        event.preventDefault(); // Prevent form reload
        let location = document.getElementById("locationInput").value;
        fetchLocation(location);
    }

    function fetchLocation(location) {
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    let lat = data[0].lat;
                    let lon = data[0].lon;
                    initMap(lat, lon, 10);
                } else {
                    alert("Location not found!");
                }
            })
            .catch(error => console.error("Error fetching location:", error));
    }

    // Fetch default city location on page load
    fetchLocation(defaultCity);
</script>


<?php
// ---------------------- Reveal Owner Details Section ----------------------- */

if (isset($_POST['reveal'])) {
    // Retrieve inputs from POST
    if (!isset($_POST['email']) || !isset($_POST['property_id'])) {
        echo "Error: Required fields not found";
        exit;
    } else {
        $emailInSession = $_POST['email'];
        $property_id = $_POST['property_id']; // Must be passed via a hidden field

        // 1. Get customer id from the login table
        $stmt = $conn->prepare("SELECT c_id FROM login WHERE c_email = ?");
        $stmt->bind_param("s", $emailInSession);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            die("Error: No data found for email: " . $emailInSession);
        }
        $row = $result->fetch_assoc();
        $c_id = $row['c_id'];
        $stmt->close();
    }
}
?>


<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'loader.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>