<?php

    function getConnection()
    {
        $conn = mysqli_connect('127.0.0.1', 'root', '', 'web_project');
        return $conn;
    }

    function login($email, $password)
    {
        $conn = getConnection();
        $sql = "select * from user_info where email='{$email}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count==1)
        {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
            return true;
        }

        else
        {
            return false;
        }
    }

    function addUser($first_name, $last_name, $email, $phone, $nid, $pass, $dob, $gender, $address, $med_history, $emergency_contact)
    {
        $conn = getConnection();
        $sql = "insert into user_info VALUES('{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$nid}', '{$pass}', '{$dob}', '{$gender}' , '{$address}', '{$med_history}', '{$emergency_contact}')";
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }

    function checkUnique($email, $nid)
    {
        $conn = getConnection();
        $checkSql = "SELECT * FROM user_info WHERE email = '{$email}' OR nid = '{$nid}'";
        $checkResult = mysqli_query($conn, $checkSql);
        if(mysqli_num_rows($checkResult) > 0)
        {
            mysqli_close($conn);
            return false;
        }
        return true;
    }

    function fetchDataForUserAppointmentHistory($email)
    {
        $appointments = [];
        $conn = getConnection();
        $sql = "SELECT * FROM appointment_history WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }
        } else {
            echo "Error in query: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $appointments;
    }

    function fetchPatientDetailsByEmail($email)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM user_info WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $patient_details = null;
        if ($result && mysqli_num_rows($result) > 0) {
            $patient_details = mysqli_fetch_assoc($result);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $patient_details;
    }

    function fetchPaymentHistory($email)
    {
        $payments = [];
        $conn = getConnection();
        $sql = "SELECT * FROM payment_history WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $payments[] = $row;
            }
        } else {
            echo "Error in query: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $payments;
    }

    function fetchDoctorAppointmentHistory($email)
    {
        $appointments = [];
        $conn = getConnection();

        // Fetch the doctor's ID and name based on their email
        $doctor_sql = "SELECT doctor_id, doctor_name FROM doctor_info WHERE email = ?";
        $stmt = mysqli_prepare($conn, $doctor_sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $doctor = mysqli_fetch_assoc($result);

        if ($doctor) {
            $doctor_id = $doctor['doctor_id'];

            // Fetch the doctor's appointment history
            $appointment_sql = "SELECT * FROM appointment_history WHERE doctor_id = ?";
            $stmt = mysqli_prepare($conn, $appointment_sql);
            mysqli_stmt_bind_param($stmt, "i", $doctor_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);

        return [
            'doctor' => $doctor,
            'appointments' => $appointments
        ];
    }

    function submitReview($patient_name, $patient_email, $doctor_name, $doctor_id, $review) {
        $conn = getConnection();
        $sql = "INSERT INTO review_box (patient_email, patient_name, doctor_name, doctor_id, review_comment) 
                VALUES (?, ?, ?, ?, ?)";
        
        // Prepare statement and bind parameters
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssis", $patient_email, $patient_name, $doctor_name, $doctor_id, $review);
        
        $result = mysqli_stmt_execute($stmt);
        
        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
        return $result; // Returns true if insert was successful, false otherwise
    }



    


?>