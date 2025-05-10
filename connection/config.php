<?php 

// Database credentials

$host = 'localhost';
$dbname = 'estate-world';
$username = 'root';
$password = ''; 


// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);


// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
// Connection successful
// echo "Connected successfully";


// Close the connection when done
// mysqli_close($conn);


?>