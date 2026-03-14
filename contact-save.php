<?php
$conn = new mysqli("localhost", "root", "", "bestart_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (full_name, email, phone, message)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    header("Location: contact-success.html");
    exit();
} else {
    echo "Error saving message";
}

$stmt->close();
$conn->close();
?>