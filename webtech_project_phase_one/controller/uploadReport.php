<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $appointment_ids = $_POST['appointment_ids'];
    $files = $_FILES['files'];

    foreach ($appointment_ids as $appointment_id) {
        if (isset($files['name'][$appointment_id]) && $files['error'][$appointment_id] === UPLOAD_ERR_OK) {
            $file_name = basename($files['name'][$appointment_id]); // Prevent directory traversal
            $tmp_name = $files['tmp_name'][$appointment_id];

            // Security: Restrict allowed file types
            $allowed_types = ['pdf', 'png', 'jpg']; // Example allowed extensions
            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_types)) {
                die("File type not allowed."); // Reject the file if the type is not allowed
            }

            $upload_dir = __DIR__ . '/../uploads/'; // Absolute server-side path
            $file_path = $upload_dir . $file_name;

            // Move uploaded file to the uploads directory
            if (move_uploaded_file($tmp_name, $file_path)) {
                // Generate a web-accessible URL for the file
                $file_url = '/myPart/uploads/' . $file_name;

                // Update the database with the file URL
                $sql = "UPDATE appointment_history SET file_path = ? WHERE appointment_id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, 'si', $file_url, $appointment_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }

    mysqli_close($conn);
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>
