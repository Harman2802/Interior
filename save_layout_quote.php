<?php
session_start();
include 'db.php';

// 1️⃣ CHECK LOGIN
if(!isset($_SESSION['user'])){
    echo "not_logged_in"; // JS will handle this
    exit;
}

/* =========================
   USER DATA
========================= */
$user_id      = $_SESSION['user']['id'];
$userName     = $_SESSION['user']['name'] ?? '';
$sessionEmail = $_SESSION['user']['email'] ?? '';

/* =========================
   FORM DATA
========================= */
$name      = $_POST['name'] ?? $userName;
$email     = $_POST['email'] ?? $sessionEmail;
$phone     = $_POST['phone'] ?? '';
$city      = $_POST['city'] ?? '';
$whatsapp  = $_POST['whatsapp'] ?? 'no';
$layout    = $_POST['layout'] ?? '';
$package   = $_POST['package'] ?? '';

/* =========================
   MEASUREMENTS
========================= */
$a = isset($_POST['measurement_a']) && $_POST['measurement_a'] !== '' ? (float)$_POST['measurement_a'] : 0;
$b = isset($_POST['measurement_b']) && $_POST['measurement_b'] !== '' ? (float)$_POST['measurement_b'] : 0;
$c = isset($_POST['measurement_c']) && $_POST['measurement_c'] !== '' ? (float)$_POST['measurement_c'] : 0;

$measurement_a = 0;
$measurement_b = 0;
$measurement_c = 0;

/* =========================
   LAYOUT CONDITIONS
========================= */
switch($layout){
    case "STRAIGHT":
        $measurement_a = $a;
        break;
    case "L":
    case "PARALLEL":
        $measurement_a = $a;
        $measurement_b = $b;
        break;
    case "U":
        $measurement_a = $a;
        $measurement_b = $b;
        $measurement_c = $c;
        break;
}

/* =========================
   VALIDATION
========================= */
if(!$name || !$email || !$phone || !$city || !$layout){
    echo "required_fields_missing";
    exit;
}

/* =========================
   PREPARE STATEMENT
========================= */
$stmt = $conn->prepare("
INSERT INTO layoutquote
(user_id, name, email, phone, city, whatsapp, layout, package, measurement_a, measurement_b, measurement_c, status, created_at)
VALUES (?,?,?,?,?,?,?,?,?,?,?, 'pending', NOW())
");

if(!$stmt){
    echo "Database Error: ".$conn->error;
    exit;
}

/* =========================
   BIND PARAMETERS
   - Use "d" for float (measurements)
========================= */
$stmt->bind_param(
    "issssssddd",
    $user_id,
    $name,
    $email,
    $phone,
    $city,
    $whatsapp,
    $layout,
    $package,
    $measurement_a,
    $measurement_b,
    $measurement_c
);

/* =========================
   EXECUTE
========================= */
if($stmt->execute()){
    echo "success";
}else{
    echo "Database Error: ".$stmt->error;
}

$stmt->close();
$conn->close();
exit;
?>