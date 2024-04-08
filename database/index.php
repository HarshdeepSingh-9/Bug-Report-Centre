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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);

    // Check if username already exists
    $check_username_sql = "SELECT * FROM reported_bug WHERE username = '$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        // Username already exists, display error message
        echo "Username already exists. Please choose another username.";
    } else {
        // Username is unique, proceed with insertion
        $insert_user_sql = "INSERT INTO reported_bug (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($insert_user_sql) === TRUE) {
            echo "New user created successfully";
            sleep(2);
            header("Location: /dashboard/cps406_bug_report/index.html"); // Redirect to index.html
            exit(); // Stop further execution
        } else {
            echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
