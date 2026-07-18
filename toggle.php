<?php

$servername = "sql211.infinityfree.com";
$username = "if0_42442444";
$password = "WOGvASc6dveNzd7";
$dbname = "if0_42442444_myfrist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID
$id = $_GET['id'];

// Toggle status
$sql = "UPDATE user SET status = IF(status = 0, 1, 0) WHERE id = $id";

// Execute query
if ($conn->query($sql) === TRUE) {
    header("Location: n.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();

?>