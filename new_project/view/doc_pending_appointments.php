<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Appointments</title>
    <link rel="stylesheet" href="../assets/style_doc_pending_appointments.css"> <!-- Optional CSS file for styling -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="main">
        <nav>
            <span class="logo">
                <img src="../assets/logo.png" alt="logo">

            </span>

            <div class="nav-buttons">
                <a href="index.html"><button class="nav-btn active">Home</button></a>
                <button class="nav-btn">Appointment history</button>
                <button class="nav-btn">Articles</button>
                <button class="nav-btn">Complaint</button>
                <button class="nav-btn">Log out</button>
            </div>
        </nav>
    </div>

    <h1>Pending Appointments</h1>
    <div class="table-container" align="center">
        <table class="table-content">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Patient Age</th>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projectwt";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT patient_id, patient_name, patient_age, appointment_id, appointment_date FROM pending_appointments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["patient_id"] . "</td>";
                        echo "<td>" . $row["patient_name"] . "</td>";
                        echo "<td>" . $row["patient_age"] . "</td>";
                        echo "<td>" . $row["appointment_id"] . "</td>";
                        echo "<td>" . $row["appointment_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No pending appointments</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>