<?php
session_start(); // Start session to store login status

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Sanitize user inputs
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM reported_bug WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authentication successful, set session variable and redirect to track.html
        $_SESSION['username'] = $username;
        header("Location: /dashboard/cps406_bug_report/community.php"); // Redirect to track.html
        exit();
    } else {
        // Authentication failed, redirect back to login page with error message
        echo "<script>alert('Username or Password incorrect');</script>";
        header("Location: /dashboard/cps406_bug_report/index.html"); // Redirect to track.html
        exit();
    }

    // Close connection
}
?>
