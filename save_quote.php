<?php
session_start();

$status = "";
$message = "";

/* LOGIN CHECK */
if (!isset($_SESSION['user'])) {
    $status = "error";
    $message = "Please login first to submit a quote.";
} else {

    // Database connection
    $conn = new mysqli("localhost", "root", "", "bestart_db");

    if ($conn->connect_error) {
        $status = "error";
        $message = "Database connection failed: " . $conn->connect_error;
    } else {

        // Sanitize and trim inputs
        $name     = trim($_POST['name'] ?? '');
        $phone    = trim($_POST['phone'] ?? '');
        $city     = trim($_POST['city'] ?? '');
        $package  = trim($_POST['package'] ?? '');
        $whatsapp = isset($_POST['whatsapp']) && $_POST['whatsapp'] === 'yes' ? 'yes' : 'no';
        $email    = $_SESSION['user']['email']; // email from session

        // Validation
        if (empty($name) || empty($phone) || empty($city) || empty($package)) {
            $status = "error";
            $message = "Please fill all required fields.";
        } else {

            // Prepared statement to insert data
            $stmt = $conn->prepare("INSERT INTO quotes (name, email, phone, city, package, whatsapp_updates) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $email, $phone, $city, $package, $whatsapp);

            if ($stmt->execute()) {
                $status = "success";
                $message = "Your quote request has been submitted successfully!";
            } else {
                $status = "error";
                $message = "Something went wrong while saving your quote. Please try again.";
            }

            $stmt->close();
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quote Status</title>
<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#ff7e5f,#feb47b);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}
.result-card{
    background:#fff;
    padding:40px;
    border-radius:12px;
    text-align:center;
    width:400px;
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
    animation:fadeIn 0.4s ease;
}
.icon{
    font-size:60px;
    margin-bottom:15px;
}
.success{color:#28a745;}
.error{color:#dc3545;}
h2{margin-bottom:10px;}
p{color:#555;margin-bottom:25px;}
.btn{
    background:#ff6b3d;
    color:#fff;
    border:none;
    padding:12px 25px;
    border-radius:30px;
    cursor:pointer;
    font-size:14px;
    text-decoration:none;
    display:inline-block;
}
.btn:hover{background:#e55a2e;}
@keyframes fadeIn{
    from{opacity:0;transform:translateY(20px);}
    to{opacity:1;transform:translateY(0);}
}
</style>
</head>
<body>
<div class="result-card">
    <?php if($status == "success"){ ?>
        <div class="icon success">✔</div>
        <h2>Quote Submitted</h2>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php } else { ?>
        <div class="icon error">✖</div>
        <h2>Error</h2>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php } ?>
    <a href="index.php" class="btn">Back to Home</a>
</div>
</body>
</html>