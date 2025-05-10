<?php
// test.php
if (!isset($_GET['current_user_id']) || empty($_GET['current_user_id'])) {
    die('Current User ID is required.');
}

$currentUserId = intval($_GET['current_user_id']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estate-world";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT a_id, a_name FROM alogin WHERE a_id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $currentUserId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Users</h2>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item">';
                    echo '<a href="test2.php?user_id=' . $row['a_id'] . '&current_user_id=' . $currentUserId . '">' . htmlspecialchars($row['a_name']) . '</a>';
                    echo '</li>';
                }
            } else {
                echo '<li class="list-group-item">No users found.</li>';
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
$conn->close();
?>
