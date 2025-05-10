<?php include '../../globalvar/globalvariable.php'; ?>
<?php include $connToPan . 'config.php'; ?>
<?php include $mphpToInc . 'header.php'; ?>
<?php include $mphpToInc . 'sidebar.php'; ?>
<?php include $funToPan . 'function.php'; ?>
<?php include $mphpToInc . 'navbar.php'; ?>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        height: 80%;
    }

    .page-inner {
        display: flex;
        flex-grow: 1;
        overflow: hidden;
    }

    .user-list {
        width: 250px;
        /* Adjust the width as needed */
        background-color: #f5f5f5;
        /* Background color for the sidebar */
        padding: 10px;
        border-right: 1px solid #ddd;
        /* Optional border */
        overflow-y: auto;
        /* Enable vertical scrolling if content overflows */
    }

    .user-list ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .user-list li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }

    .user-list li:hover {
        background-color: #e0e0e0;
    }

    .chat-area {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding: 10px;
        background-color: #fff;
        overflow: hidden;
    }

    .chat-header {
        background-color: #f1f1f1;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .chat-messages {
        flex-grow: 1;
        padding: 10px;
        overflow-y: auto;
        /* Enable vertical scrolling if messages overflow */
    }

    .message {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .chat-input {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #f1f1f1;
        border-top: 1px solid #ddd;
    }

    .chat-input input {
        flex-grow: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .chat-input button {
        padding: 10px;
        margin-left: 10px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .chat-input button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="page-inner d-flex">
        <!-- User List (Sidebar) -->
        <div class="user-list">
            <!-- User list content goes here -->
            <h2>Users</h2>
            <ul>
                <!-- Example user items -->
                <li>User 1</li>
                <li>User 2</li>
                <li>User 3</li>
                <!-- Add more users dynamically -->
            </ul>
        </div>

        <!-- Chat Area -->
        <div class="chat-area flex-grow-1">
            <!-- Chat content goes here -->
            <div class="chat-header">
                <!-- Chat header content (e.g., selected user) -->
                <h3>Chat with User 1</h3>
            </div>
            <div class="chat-messages">
                <!-- Chat messages will be displayed here -->
                <div class="message">Hello!</div>
                <div class="message">Hi, how are you?</div>
            </div>
            <div class="chat-input">
                <!-- Chat input field -->
                <input type="text" placeholder="Type a message...">
                <button type="button">Send</button>
            </div>
        </div>
    </div>
</div>

<?php include $mphpToInc . 'footer.php'; ?>
<?php include $mphpToInc . 'endlinks.php'; ?>