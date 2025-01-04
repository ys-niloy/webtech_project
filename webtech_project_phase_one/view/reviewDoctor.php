<?php
    session_start();
    require_once '../model/userModel.php';

    // Check if user is logged in and email exists in session
    if (!isset($_SESSION['email'])) {
        die("Access denied. Please log in.");
    }

    // Get patient's email from session
    $patient_email = $_SESSION['email'];
    $doctor_name = $_REQUEST['doctor_name'];
    $doctor_id = $_REQUEST['doctor_id'];

    $patient_details = fetchPatientDetailsByEmail($patient_email); // Function to fetch patient details by email
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Doctor</title>
   <link rel="stylesheet" href="../asset/style_reviewDoctor.css">
</head>
<body>
    <h1>Review Doctor</h1>

    <div class="form-container">
        <?php if (isset($patient_details)): ?>
            <form method="POST" action="../controller/submitReview.php">
                <!-- Patient Details -->
                <label for="patient_name">Patient Name</label>
                <input type="text" id="patient_name" name="patient_name" value="<?php echo htmlspecialchars($patient_details['first_name']); ?>" readonly><br><br>

                <label for="patient_email">Patient Email</label>
                <input type="email" id="patient_email" name="patient_email" value="<?php echo htmlspecialchars($patient_details['email']); ?>" readonly><br><br>

                <!-- Doctor Details -->
                <label for="doctor_name">Doctor Name</label>
                <input type="text" id="doctor_name" name="doctor_name" value="<?php echo ($doctor_name); ?>" readonly><br><br>

                <!-- Hidden Doctor ID Field -->
                <label for="doctor_id">Doctor ID</label>
                <input type="text" id="doctor_id" name="doctor_id" value="<?php echo ($doctor_id); ?>" readonly> <br><br>

                <!-- Complaint Box -->
                <label for="review">Your Complaint/Review</label><br>
                <textarea id="review" name="review" rows="6" placeholder="Write your review here..."></textarea><br><br>

                <input type="submit" name="submit" value="Submit Review">
            </form>
        <?php else: ?>
            <p>Doctor or patient details not found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
