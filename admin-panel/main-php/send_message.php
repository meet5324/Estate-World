<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estate-world";

$senderId = intval($_POST['sender_id']);
$receiverId = intval($_POST['receiver_id']);
$message = $_POST['message'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $senderId, $receiverId, $message);

if ($stmt->execute()) {
    echo "Message sent.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
