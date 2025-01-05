<?php
    session_start();
    require_once '../model/userModel.php';

    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
        exit;
    }

    // getting the logged-in doctor's email
    $doctor_email = $_SESSION['email'];

    // fetching the doctor's details and appointment history
    $data = fetchDoctorAppointmentHistory($doctor_email);
    $doctor = $data['doctor'];
    $appointments = $data['appointments'];

    if ($doctor) {
        $doctor_name = $doctor['doctor_name'];
    } else {
        die("No doctor found with the given email.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/style_doctorAppointmentHistory.css">
    <title>Doctor's Appointments</title>
    
</head>
<body>
    <h1>Doctor's Appointments</h1>
    <h2>Welcome, Dr. <?php echo htmlspecialchars($doctor_name); ?></h2>

    <?php if (count($appointments) > 0): ?>
        <form method="POST" action="../controller/uploadReport.php" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Problem</th>
                        <th>Token</th>
                        <th>Report</th>
                        <th>Upload File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['email']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['problem']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['token']); ?></td>
                            <td>
                                <?php if (!empty($appointment['file_path'])): ?>
                                    <?php echo htmlspecialchars($appointment['file_path']); ?>
                                <?php else: ?>
                                    No files
                                <?php endif; ?>
                            </td>
                            <td>
                                <input type="hidden" name="appointment_ids[]" value="<?php echo $appointment['appointment_id']; ?>">
                                <input type="file" name="files[<?php echo $appointment['appointment_id']; ?>]">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit">Save</button>
        </form>
    <?php else: ?>
        <p>No appointments found for you.</p>
    <?php endif; ?>

    <br><br><br>
    <span><a href="doctorDashboard.php">Back</a></span>
</body>
</html>
