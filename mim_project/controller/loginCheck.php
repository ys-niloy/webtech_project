<?php
session_start();
require_once '../model/userModel.php';

if (isset($_REQUEST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    // Input validation
    if (empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Check if the agreement checkbox was selected
    if (!isset($_POST['agreement']) || $_POST['agreement'] !== 'agree') {
        echo "You must agree to the legal policies before logging in.";
        exit;
    }

    // Get user data
    $user = getUser($email, $password, $userType);

    if ($user) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $userType;
        setcookie('status', 'true', time() + 3600, '/');

        // Redirect to user dashboard or admin dashboard based on user type
        if ($userType === 'user') {
            header("Location: ../view/userDashboard.php");
        } elseif ($userType === 'admin') {
            header("Location: ../view/adminDashboard.php");
        }
        exit;
    } else {
        echo "Invalid email or password";
        exit;
    }
} else {
    echo "Unauthorized access.";
    exit;
}
?>
