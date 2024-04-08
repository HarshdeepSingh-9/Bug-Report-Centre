<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
</head>

<body>
    <div class="bug_beetle"> <img class="beetle" src="database/bug.png" alt="BRC"></div>
    <ul>
        <a href="index.html" class="h_1" id="logout" onclick="highlight('logout')">Logout</a>
    </ul>
    <div class="content">
        <ul>
            <a href="track.html" class="h_1" id="track" onclick="highlight('track')">Track BUG</a>
        </ul>
        <ul>
            <a href="report.html" class="h_1" id="report" onclick="highlight('report')">Report BUG</a>
        </ul>
        <ul>
            <a href="dev.php" class="h_1" id="dev">Developers</a>
        </ul>
        <ul>
            <a href="community.php" class="h_1" id="community">Community</a>
        </ul>
    </div>
    <div class="container">
        <h2>Bugs Community</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Bug Code</th>
                    <th>Ticket Name</th>
                    <th>Email</th>
                    <th>Brief</th>
                    <th>Resolved</th>
                </tr>
            </thead>
            <tbody>
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

                // Loop through the fetched data and render it in the table rows
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ticket_id"] . "</td>";
                    echo "<td>" . $row["bug_code"] . "</td>";
                    echo "<td>" . $row["ticket_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["brief"] . "</td>";
                    echo "<td>" . $row["Resolved"] . "</td>";
                    echo "</tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>