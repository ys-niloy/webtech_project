<?php
    session_start();
    require_once '../model/userModel.php'; // Include the file where fetchPaymentHistory is defined

    $user_email = $_SESSION['email'];

    // fetching payment history for the user
    $payment_history = fetchPaymentHistory($user_email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="../asset/style_patientPaymentHistory.css">
</head>
<body>
    <h1>Payment History</h1>
    <?php if (!empty($payment_history)): ?>
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Card Number</th>
                    <th>Appointment ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payment_history as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['transaction_id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['card_number']) ?></td>
                        <td><?= htmlspecialchars($row['appointment_id']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No payment history found for this user.</p>
    <?php endif; ?>

    <br><br><br>

    <span><a href="patientDashboard.php">Back</a></span>
</body>
</html>
