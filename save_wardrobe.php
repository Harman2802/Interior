<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "db.php";
if (!isset($_SESSION['user'])) {
    echo "login_required";
    exit;
}

$user_id = $_SESSION['user']['id'];
$user_email = $_SESSION['user']['email'];

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? $user_email;
$phone = $_POST['phone'] ?? '';
$city = $_POST['city'] ?? '';
$height = $_POST['height'] ?? '';
$type = $_POST['type'] ?? '';
$finish = $_POST['finish'] ?? '';
$material = $_POST['material'] ?? '';
$accessories = $_POST['accessories'] ?? '';
$requireTime = $_POST['requireTime'] ?? '';

if(!$name || !$phone || !$city){
    echo "missing_fields";
    exit;
}

$stmt = $conn->prepare("INSERT INTO wardrobe_quotes
(user_id,name,email,phone,city,height,type,finish,material,accessories,require_time)
VALUES (?,?,?,?,?,?,?,?,?,?,?)");

if(!$stmt){
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
"issssssssss",
$user_id,
$name,
$email,
$phone,
$city,
$height,
$type,
$finish,
$material,
$accessories,
$requireTime
);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "Execute failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>