<?php
    session_start();

    // Check if the doctor is logged in
    if (!isset($_SESSION['email'])) {
        // die("Access denied. Please log in.");
        header('Location: login.html');
    }
?>

<html>

<head>
    <link rel="stylesheet" href="../asset/style_doctorDashboard.css">
    <!-- outfit font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <title>Doctor Dashboard</title>
</head>

<body>
    <div class="main">
        <nav style="color: white;">
            <span><img src="../asset/images/logo.svg" alt=""></span>
            <div>
                <a href="doctorAppointmentHistory.php"><button class="btn ">appointment history</button></a>
                <!-- <button class="btn "></button>
                <button class="btn "></button> -->
                <button class="btn ">faq</button>
                <a href="login.html"><button class="btn rounded-btn">logout</button></a>
            </div>
        </nav>


        <div class="hero">

            <span>Welcome to Doctor Dashboard!</span>

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