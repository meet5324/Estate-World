<?php
// get_districts.php
include '../connection/config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['state_id'])) {
    $state_id = intval($_GET['state_id']);
    $query = "SELECT district_id, district_name FROM tbl_districts WHERE state_id = $state_id";
    $result = $conn->query($query);

    $districts = [];
    while ($row = $result->fetch_assoc()) {
        $districts[] = $row;
    }
    
    echo json_encode($districts);
}
?>
