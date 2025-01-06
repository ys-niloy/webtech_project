<?php
    session_start();

    require_once '../model/userModel.php';

    if (!isset($_COOKIE['status'])) {
        header('Location: login.html');
        exit();
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $email = $_SESSION['email'];

        if (updateUserPassword($email, $currentPassword, $newPassword)) {
            echo "Password updated successfully!";
        } else {
            echo "Failed to update password. Please check your current password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="../asset/style_viewUserProfile.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">E-Pass</div>
        <div class="nav-buttons">
            <a href="../view/userDashboard.php">Home</a>
            <a href="../view/login.html">Log out</a>
        </div>
    </div>

    <h4>Change Password</h4>

    <div class="container">
        <form method="POST" action="">
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required> <br> <br>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required> <br><br>

            <button type="submit">Update Password</button>
        </form>
    </div>
</body>

</html>