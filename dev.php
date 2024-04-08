<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <title>BUG Tracking System</title>
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
            <a href="dev.php" class="h_1" id="dev" onclick="highlight('dev')">Developers</a>
        </ul>
        <ul>
            <a href="community.php" class="h_1" id="community" onclick="highlight('community')">Community</a>
        </ul>
    </div>

    <div class="container devs_table">
        <div class="row">
            <div class="col-md-6 resolvedT">
                <!-- Content for the first column (Resolved Tickets) -->
                <h2>Resolved Tickets</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bug Code</th>
                            <th>Ticket ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Database credentials
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "Bug_users";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $database);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch resolved tickets from the database
                        $resolved_tickets_query = "SELECT bug_code, ticket_id FROM bugs WHERE resolved = 'yes'";
                        $resolved_tickets_result = $conn->query($resolved_tickets_query);

                        // Output resolved tickets
                        while ($row = $resolved_tickets_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['bug_code'] . "</td>";
                            echo "<td>" . $row['ticket_id'] . "</td>";
                            echo "</tr>";
                        }

                        // Close connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 openT">
                <!-- Content for the second column (Open Tickets) -->
                <h2>Open Tickets</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bug Code</th>
                            <th>Ticket ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $database);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch open tickets from the database
                        $open_tickets_query = "SELECT bug_code, ticket_id FROM bugs WHERE resolved = 'no'";
                        $open_tickets_result = $conn->query($open_tickets_query);

                        // Output open tickets
                        while ($row = $open_tickets_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['bug_code'] . "</td>";
                            echo "<td>" . $row['ticket_id'] . "</td>";
                            echo "</tr>";
                        }

                        // Close connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type = "module" src="/dashboard/cps406_bug_report/script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>