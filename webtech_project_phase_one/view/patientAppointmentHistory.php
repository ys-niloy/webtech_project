<?php
session_start();
require_once '../model/userModel.php';

// Check if user is logged in and email exists in session
if (!isset($_COOKIE['status'])) {
    die("Access denied. Please log in.");
}

// Get patient's email from session
$patient_email = $_SESSION['email'];
// Fetch appointments
$appointments = fetchDataForUserAppointmentHistory($patient_email);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Appointment History</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Patient's Appointment History</h1>

    <?php if (count($appointments) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Doctor ID</th> <!-- New column for Doctor ID -->
                    <th>Doctor Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Problem</th>
                    <th>Token</th>
                    <th>Download Report</th>
                    <th>Review Doctor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['doctor_id']); ?></td> <!-- Display doctor_id -->
                        <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['problem']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['token']); ?></td>
                        <td>
                            <?php if (!empty($appointment['file_path'])): ?>
                                <a href="<?php echo htmlspecialchars($appointment['file_path']); ?>" download>Download</a>
                            <?php else: ?>
                                No report
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="reviewDoctor.php?doctor_name=<?php echo htmlspecialchars($appointment['doctor_name']); ?>&doctor_id=<?php echo htmlspecialchars($appointment['doctor_id']); ?>">Review Doctor</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No appointments found for this email: <?php echo htmlspecialchars($patient_email); ?></p>
    <?php endif; ?>

    <br><br><br>

    <span><a href="patientDashboard.php">Back</a></span>
</body>

</html>