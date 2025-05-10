<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estate-world";

$userId = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
$currentUserId = isset($_GET['current_user_id']) ? intval($_GET['current_user_id']) : 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user information for the chat page title
if ($userId) {
    $sql = "SELECT a_name FROM alogin WHERE a_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userName = htmlspecialchars($user['a_name']);
    } else {
        $userName = "Unknown User";
    }
    $stmt->close();
}

// Fetch messages between the current user and the selected user
if ($userId && $currentUserId) {
    $sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $currentUserId, $userId, $userId, $currentUserId);
    $stmt->execute();
    $messages = $stmt->get_result();
    $stmt->close();
} else {
    $messages = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with <?php echo $userName; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chat-box {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .message {
            margin-bottom: 10px;
        }
        .message-user {
            font-weight: bold;
        }
        .message-text {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Chat with <?php echo $userName; ?></h2>
        <div class="chat-box" id="chat-box">
            <?php
            if ($messages && $messages->num_rows > 0) {
                while ($row = $messages->fetch_assoc()) {
                    echo '<div class="message">';
                    echo '<span class="message-user">' . htmlspecialchars($row['sender_id']) . ':</span>';
                    echo '<span class="message-text">' . htmlspecialchars($row['message']) . '</span>';
                    echo '</div>';
                }
            } else {
                echo '<div>No messages yet.</div>';
            }
            ?>
        </div>
        <form id="chat-form" class="mt-3" method="post" action="">
            <div class="form-group">
                <textarea name="message" class="form-control" rows="3" placeholder="Type a message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        const currentUserId = <?php echo $currentUserId; ?>;
        const receiverId = <?php echo $userId; ?>;

        function loadMessages() {
            $.get('fetch_messages.php', { sender_id: currentUserId, receiver_id: receiverId }, function(data) {
                $('#chat-box').html(data);
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            });
        }

        $('#chat-form').on('submit', function(e) {
            e.preventDefault();
            $.post('send_message.php', {
                sender_id: currentUserId,
                receiver_id: receiverId,
                message: $('textarea[name="message"]').val()
            }, function() {
                $('textarea[name="message"]').val('');
                loadMessages();
            });
        });

        setInterval(loadMessages, 2000); // Refresh messages every 2 seconds
        loadMessages(); // Initial load
    </script>
</body>
</html>
