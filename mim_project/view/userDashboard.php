<?php
if (!isset($_COOKIE['status'])) {
    header('Location: login.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/style_userDashboard.css">
    <title>Document</title>
</head>

<body>
    <div class="navbar">
        <div class="logo">E-Pass</div>
        <div class="nav-buttons">
            <a href="viewUserProfile.php">Profile</a>
            <a href="../view/login.html">Log out</a>
        </div>
    </div>

    <div>
        <h4>User Dashboard</h4>
    </div>



</body>

</html>