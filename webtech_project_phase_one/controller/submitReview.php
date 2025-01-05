<?php
    session_start();
    require_once '../model/userModel.php'; 

    if(!$_COOKIE['status'])
    {
        header('Location: ../view/login.html');
    }

    // Check if the form is submitted
    if (isset($_REQUEST['submit'])) {
        // Retrieve the data from the POST request
        $patient_name = isset($_POST['patient_name']) ? $_POST['patient_name'] : '';
        $patient_email = isset($_POST['patient_email']) ? $_POST['patient_email'] : '';
        $doctor_name = isset($_POST['doctor_name']) ? $_POST['doctor_name'] : '';
        $doctor_id = isset($_POST['doctor_id']) ? $_POST['doctor_id'] : '';
        $review = isset($_POST['review']) ? $_POST['review'] : '';

        
        if (empty($review)) {
            die("Please fill in all fields.");
        }

        $result = submitReview($patient_name, $patient_email, $doctor_name, $doctor_id, $review);

        if ($result) {
            echo "Review submitted successfully!";
            header('Location: ../view/patientAppointmentHistory');
        } else {
            echo "There was an error submitting your review.";
        }
    } else {
        header("Location: ../view/reviewDoctor.php");
        exit();
    }
?>
