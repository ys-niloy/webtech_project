<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_COOKIE['status'])) {
        header('Location: login.html'); // Redirect to login if no session
    }


?>


<html>

<head>
    <link rel="stylesheet" href="../asset/style_patientDashboard.css">
    <!-- outfit font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main">
        <nav style="color: white;">
            <span><img src="../asset/images/logo.svg" alt=""></span>
            <div>
                <a href="patientAppointmentHistory.php"><button class="btn ">appointment history</button></a>
                <button class="btn ">articles</button>
                <button class="btn ">faq</button>
                <a href="patientPaymentHistory.php"><button class="btn ">payment history</button></a>
                <a href="index.html"><button class="btn rounded-btn">logout</button></a>
            </div>
        </nav>


        <div class="hero">

            <span>Welcome to Patient Dashboard!</span>

            <!-- <div>
                <button class="btn rounded-btn transparent-btn">Book Appointment</button>
            </div> -->
        </div>
    </div>

    <div class="section">
        section div
    </div>


</body>


</html>