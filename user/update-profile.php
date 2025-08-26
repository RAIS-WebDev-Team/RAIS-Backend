<?php
// update-profile.php - Handles profile update logic

session_start();
include_once '../config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../login.php");
    exit;
}

$userId = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // --- Retrieve all form data ---
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    // Retrieve social media links
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $gmail = $_POST['gmail'];
    
    // --- Handle file upload ---
    $profileImagePath = null;
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0) {
        $targetDir = "../uploads/";
        // Create directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = basename($_FILES["profileImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array(strtolower($fileType), $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
                $profileImagePath = "uploads/" . $fileName;
            }
        }
    }

    // --- Prepare SQL statement to update the database ---
    if ($profileImagePath) {
        // Query includes profile image and social links
        $stmt = $conn->prepare("UPDATE users SET firstName = ?, lastName = ?, phone = ?, address = ?, birthday = ?, profileImage = ?, facebook = ?, instagram = ?, gmail = ? WHERE id = ?");
        $stmt->bind_param("sssssssssi", $firstName, $lastName, $phone, $address, $birthday, $profileImagePath, $facebook, $instagram, $gmail, $userId);
    } else {
        // Query includes social links but no new profile image
        $stmt = $conn->prepare("UPDATE users SET firstName = ?, lastName = ?, phone = ?, address = ?, birthday = ?, facebook = ?, instagram = ?, gmail = ? WHERE id = ?");
        $stmt->bind_param("ssssssssi", $firstName, $lastName, $phone, $address, $birthday, $facebook, $instagram, $gmail, $userId);
    }

    // Execute the statement and redirect
    if ($stmt->execute()) {
        // On success, redirect back to the profile page
        header("location: profile.php"); 
    } else {
        // On failure, show an error
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
