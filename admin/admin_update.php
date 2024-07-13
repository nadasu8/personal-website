<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['content'])) {
        $id = $_POST['id'];
        $content = $_POST['content'];

        $stmt = $conn->prepare("UPDATE descrip SET content = ? WHERE id = ?");
        $stmt->bind_param("si", $content, $id);
        $stmt->execute();
        $stmt->close();

        $_SESSION['success_message'] = "Description updated successfully!";
        header("Location: admin.php");
        exit();
    }

    // Check if a file was uploaded
    if (!empty($_FILES['file']['name']) && isset($_POST['section'])) {
        $file = $_FILES['file'];
        $uploadDir = '../uploads/';
        $filePath = $uploadDir . basename($file['name']);
        $section = $_POST['section'];
        
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Save the file path to the 'files' table or update the existing entry for the CV
            $stmt = $conn->prepare("INSERT INTO files (section, file_path) VALUES (?, ?) ON DUPLICATE KEY UPDATE file_path = VALUES(file_path)");
            $stmt->bind_param("ss", $section, $filePath);
            $stmt->execute();
            $stmt->close();

            // Set success message to be displayed on admin.php
            $_SESSION['success_message'] = "File uploaded successfully!";
        } else {
            // Handle file upload failure
            $_SESSION['error_message'] = "File upload failed.";
        }
    }
    // If everything is successful, redirect to the index page
    header("Location: admin.php");
    exit();
}
?>
