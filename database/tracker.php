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

// Check if the form is submitted and ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID'])) {
    $ticket_id = $conn->real_escape_string($_POST['ID']);

    // SQL query to search for ticket with provided ticket ID
    $search_query = "SELECT * FROM bugs WHERE ticket_id = '$ticket_id'";
    $result = $conn->query($search_query);

    // Check if any result found
    if ($result->num_rows > 0) {
        echo "<div style='text-align: center;'>"; // Center-aligning the table
        echo "<table style='border-collapse: collapse; width: 80%; margin: 0 auto;'>";
        echo "<tr style='background-color: #f2f2f2;'><th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Ticket ID</th><th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Ticket Name</th><th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Email</th><th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Brief</th><th style='border: 1px solid #ddd; padding: 8px; text-align: left;'>Resolved</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row["ticket_id"] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row["ticket_name"] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row["email"] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row["brief"] . "</td>";
            echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row["Resolved"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        
    } else {
        echo "<div style='text-align: center; margin-top: 20px; font-style: italic; color: #666;'>No results found for Ticket ID: " . $ticket_id . "</div>";
    }
    echo "Click <a href='/dashboard/cps406_bug_report/community.php'>here</a> to go back to the community page.";
}

// Close connection
$conn->close();
?>
