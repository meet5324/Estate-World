<?php
header("Content-Type: application/json");
include '../connection/config.php'; // Ensure this file does not output errors

$data = json_decode(file_get_contents("php://input"), true);
$cid = isset($data['cid']) ? intval($data['cid']) : null;
$pid = isset($data['pid']) ? intval($data['pid']) : null;
$email = isset($data['email']) ? intval($data['email']) : null;

if (!$cid) {
    echo json_encode(["success" => false, "status_code" => 422, "message" => "Invalid data"]);
    exit;
}

// Suppress warnings that might break JSON response
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $query = "SELECT points FROM tbl_plans_details WHERE c_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($row['points'] > 0) {
            $newPoints = $row['points'] - 1;
            $updateQuery = "UPDATE tbl_plans_details SET points = ? WHERE c_id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ii", $newPoints, $cid);

            $prep_stmt = $conn->prepare("INSERT INTO tbl_revealed_details (c_id, property_id) VALUES (?, ?)");
            $prep_stmt->bind_param("ii", $cid, $pid);

            if ($updateStmt->execute() && $prep_stmt->execute()) {
                echo json_encode(["success" => true, "status_code" => 200, "message" => "Points deducted successfully"]);
            } else {
                echo json_encode(["success" => false, "status_code" => 500, "message" => "Failed to update points"]);
            }
        } else {
            echo json_encode(["success" => false, "status_code" => 400, "message" => "Insufficient points"]);
        }
    } else {
        echo json_encode(["success" => false, "status_code" => 404, "message" => "No record found"]);
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "status_code" => 500, "message" => $e->getMessage()]);
}
?>