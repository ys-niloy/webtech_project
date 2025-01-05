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
    <!-- font awesome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4><img src="../asset/images/logo.svg" alt=""></h4>
                    <ul>
                        <li class="description"><a href=""></a>Our family-centered approach to healthcare ensures that each member of your family receives personalized attention.</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Details</h4>
                    <ul>
                        <li>address</li>
                        <li>email</li>
                        <li>phone</li>
                        <li>time</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <ul>
                        <li>You can subscribe to our newsletter <br> <br> <b>carex@outlook.com</b> </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


</body>


</html>