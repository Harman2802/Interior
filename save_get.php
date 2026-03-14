<?php
session_start();
include 'db.php';

/* ======================
   CHECK LOGIN
====================== */
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id']) || !isset($_SESSION['user']['email'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Required</title>
        <style>
            body { font-family: 'Segoe UI', sans-serif; background: #f4f6f8; display:flex; justify-content:center; align-items:center; height:100vh;}
            .message-box { background:white; padding:40px 50px; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,0.1); text-align:center;}
            .message-box h1 { font-size:48px; color:#ef4444; }
            .message-box p { font-size:18px; margin:20px 0; }
            .message-box a { display:inline-block; padding:12px 25px; background:#3b82f6; color:white; border-radius:8px; text-decoration:none; transition:0.3s;}
            .message-box a:hover{ background:#2563eb; }
        </style>
    </head>
    <body>
        <div class="message-box">
            <h1>⚠️ Login Required</h1>
            <p>You must be logged in to submit a request.</p>
            <a href="login.php">Go to Login</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

/* ======================
   FORM DATA
====================== */
$user_id = $_SESSION['user']['id'];
$user_email = $_SESSION['user']['email'];

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? $user_email);
$phone = trim($_POST['phone'] ?? '');
$city  = trim($_POST['city'] ?? '');
$whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
$design = trim($_POST['selectedDesign'] ?? ''); // Fixed name to match HTML
$status = "pending";

/* ======================
   VALIDATION
====================== */
$errors = [];

if (!$name) $errors[] = "Name is required";
if (!$phone) $errors[] = "Phone is required";
if (!$city) $errors[] = "City is required";
if (!$design) $errors[] = "Please select a design";

if (!empty($errors)) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Form Error</title>
        <style>
            body { font-family: 'Segoe UI', sans-serif; background: #f4f6f8; display:flex; justify-content:center; align-items:center; height:100vh;}
            .message-box { background:white; padding:40px 50px; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,0.1); text-align:center;}
            .message-box h1 { font-size:48px; color:#ef4444; }
            .message-box p { font-size:18px; margin:20px 0; }
            .message-box a { display:inline-block; padding:12px 25px; background:#3b82f6; color:white; border-radius:8px; text-decoration:none; transition:0.3s;}
            .message-box a:hover{ background:#2563eb; }
        </style>
    </head>
    <body>
        <div class="message-box">
            <h1>⚠️ Missing Fields</h1>
            <p><?php echo implode("<br>", array_map('htmlspecialchars', $errors)); ?></p>
            <a href="javascript:history.back()">Go Back</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

/* ======================
   INSERT INTO DATABASE
====================== */
$stmt = $conn->prepare("
    INSERT INTO `get`
    (user_id, name, email, phone, city, whatsapp_updates, selected_design, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    die("<h2 style='color:red;'>Prepare failed: " . htmlspecialchars($conn->error) . "</h2>");
}

$stmt->bind_param(
    "issssiss",
    $user_id,
    $name,
    $email,
    $phone,
    $city,
    $whatsapp,
    $design,
    $status
);

if ($stmt->execute()) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Request Submitted</title>
        <style>
            body { font-family: 'Segoe UI', sans-serif; background: #f4f6f8; display:flex; justify-content:center; align-items:center; height:100vh;}
            .result-box { background:white; padding:40px 50px; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,0.1); text-align:center;}
            .result-box h1 { font-size:48px; color:#22c55e; }
            .result-box p { font-size:18px; margin:20px 0; }
            .result-box a { display:inline-block; padding:12px 25px; background:#3b82f6; color:white; border-radius:8px; text-decoration:none; transition:0.3s;}
            .result-box a:hover{ background:#2563eb; }
        </style>
    </head>
    <body>
        <div class="result-box">
            <h1>✅ Success!</h1>
            <p>Thank you, <strong><?php echo htmlspecialchars($name); ?></strong>.<br>
            Your request for "<strong><?php echo htmlspecialchars($design); ?></strong>" has been submitted successfully.</p>
            <a href="index.php">Back to Home</a>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<h2 style='color:red;'>Database Error: " . htmlspecialchars($stmt->error) . "</h2>";
}

$stmt->close();
$conn->close();
?>