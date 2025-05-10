<?php
// get_states.php
include '../connection/config.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = "SELECT state_id, state_name FROM tbl_states";
    $result = $conn->query($query);

    $states = [];
    while ($row = $result->fetch_assoc()) {
        $states[] = $row;
    }
    
    echo json_encode($states);
}
?>
