<?php
    session_start();
    require_once '../model/userModel.php';

    if (!isset($_COOKIE['status'])) {
        header('Location: login.html');
        exit();
    }

    $userProfile = getUserProfile($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/style_viewUserProfile.css">
    <title>View Profile</title>
</head>

<body>
    <div class="navbar">
        <div class="logo">E-Pass</div>
        <div class="nav-buttons">
            <a href="../view/userDashboard.php">Home</a>
            <a href="../view/login.html">Log out</a>
        </div>
    </div>

    <h4>User Profile</h4>

    <div class="container">
        <?php if ($userProfile): ?>
            <p><strong>Full Name:</strong> <?= $userProfile['full_name'] ?></p>
            <p><strong>Email:</strong> <?= $userProfile['email'] ?></p>
            <p><strong>Phone:</strong> <?= $userProfile['phone'] ?></p>
            <button><a href="updatePassword.php">Change Password</a></button>
        <?php else: ?>
            <p>User information could not be retrieved.</p>
        <?php endif; ?>
    </div>
</body>


</html>