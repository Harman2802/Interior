<?php
session_start();
include 'db.php';

// 1. Check login
if(!isset($_SESSION['user'])){
    echo "not_logged_in"; // MUST match JS
    exit;
}

$user_id    = $_SESSION['user']['id'];
$userEmail  = $_SESSION['user']['email'];
$userName   = $_SESSION['user']['name'] ?? '';

// 2. Get POST data, use defaults
$email    = $_POST['email'] ?? $userEmail;
$name     = $_POST['name'] ?? $userName;
$phone    = $_POST['phone'] ?? '';
$city     = $_POST['city'] ?? '';
$whatsapp = $_POST['whatsapp'] ?? 'no';

$bhk     = $_POST['bhk'] ?? '';
$size    = $_POST['size'] ?? '';
$package = $_POST['package'] ?? '';

$living   = isset($_POST['living']) ? (int)$_POST['living'] : 1;
$kitchen  = isset($_POST['kitchen']) ? (int)$_POST['kitchen'] : 1;
$bedroom  = isset($_POST['bedroom']) ? (int)$_POST['bedroom'] : 1;
$bathroom = isset($_POST['bathroom']) ? (int)$_POST['bathroom'] : 1;
$dining   = isset($_POST['dining']) ? (int)$_POST['dining'] : 1;

// 3. Validate required fields
if(!$name || !$phone || !$city || !$email){
    echo "required_fields_missing";
    exit;
}

// 4. Insert into database
$stmt = $conn->prepare("
INSERT INTO homequote 
(user_id,name,email,phone,city,whatsapp,bhk,size,package,living,kitchen,bedroom,bathroom,dining,status,created_at)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?, 'pending', NOW())
");

if(!$stmt){
    echo "Database Error: ".$conn->error;
    exit;
}

$stmt->bind_param(
    "issssssssiiiii",
    $user_id,
    $name,
    $email,
    $phone,
    $city,
    $whatsapp,
    $bhk,
    $size,
    $package,
    $living,
    $kitchen,
    $bedroom,
    $bathroom,
    $dining
);

// 5. Execute and respond
if($stmt->execute()){
    echo "success";
}else{
    echo "Database Error: ".$stmt->error;
}

$stmt->close();
$conn->close();
exit;
?>