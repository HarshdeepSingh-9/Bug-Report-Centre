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
    $ticketname = $conn->real_escape_string($_POST['ticketname']);
    $code = $conn->real_escape_string($_POST['code']);
    $email = $conn->real_escape_string($_POST['email']);
    $brief = $conn->real_escape_string($_POST['brief']);

    // Get the maximum ticket ID from the database
    $max_ticket_id_query = "SELECT MAX(ticket_id) AS max_ticket_id FROM bugs";
    $result = $conn->query($max_ticket_id_query);
    $row = $result->fetch_assoc();
    $max_ticket_id = $row['max_ticket_id'];

    // Increment the ticket ID
    $new_ticket_id = $max_ticket_id + 1;

    // SQL query to insert reported bug into the database
    $insert_bug_sql = "INSERT INTO bugs (ticket_id, bug_code, ticket_name, email, brief) VALUES ('$new_ticket_id', '$code','$ticketname', '$email', '$brief')";

    // Execute the query
    if ($conn->query($insert_bug_sql)) {
        // Redirect to community.html after successful submission
       echo "Reported Successfully. Click <a href='/dashboard/cps406_bug_report/community.php'>here</a> to go back to the community page.";

        exit(); // Stop further execution
    }
}

// Close connection
$conn->close();
?>
