<?php
// Database credentials
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password    
$database = "Bug_users"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the bugs table
$sql = "SELECT * FROM bugs";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>
