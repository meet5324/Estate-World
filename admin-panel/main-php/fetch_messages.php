<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estate-world";

$senderId = intval($_GET['sender_id']);
$receiverId = intval($_GET['receiver_id']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $senderId, $receiverId, $receiverId, $senderId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="message">';
        echo '<span class="message-user">' . htmlspecialchars($row['sender_id']) . ':</span>';
        echo '<span class="message-text">' . htmlspecialchars($row['message']) . '</span>';
        echo '</div>';
    }
} else {
    echo '<div>No messages yet.</div>';
}

$stmt->close();
$conn->close();
?>
