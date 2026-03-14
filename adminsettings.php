<?php
session_start();
include "db.php";

// Ensure admin is logged in
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

// Fetch admin info
$result = $conn->query("SELECT * FROM users WHERE id=$user_id");
if($result && $result->num_rows > 0){
    $user = $result->fetch_assoc();
} else {
    die("Admin not found.");
}

// Handle form submission
if(isset($_POST['update'])){

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];

if(!empty($password)){
$password_hashed = password_hash($password, PASSWORD_DEFAULT);
$conn->query("UPDATE users SET fullname='$name', email='$email', password='$password_hashed' WHERE id=$user_id");
}else{
$conn->query("UPDATE users SET fullname='$name', email='$email' WHERE id=$user_id");
}

/* Update session */
$_SESSION['user']['name'] = $name;
$_SESSION['user']['email'] = $email;

$success = "Settings updated successfully!";

    if(isset($success)){
    echo "<script>
    setTimeout(function(){
        window.location='admin.php';
    },1500);
    </script>";
}

    // refresh updated data
    $result = $conn->query("SELECT * FROM users WHERE id=$user_id");
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Settings | BestArt</title>

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    padding: 50px 20px;
}

.settings-box {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 500px;
}

.settings-box h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #0f172a;
}

.settings-box form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.settings-box input {
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 14px;
    transition: 0.3s;
}

.settings-box input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
}

.settings-box button {
    padding: 12px;
    background: #3b82f6;
    color: white;
    font-size: 16px;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

.settings-box button:hover {
    background: #2563eb;
}

.success {
    text-align: center;
    color: #16a34a;
    font-weight: 600;
    margin-bottom: 15px;
}

</style>
</head>
<body>

<div class="settings-box">
<h2>Admin Settings</h2>

<?php if(isset($success)){ ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>

<form method="POST">
    <label>Full Name</label>
    <input type="text" name="name" value="<?php echo isset($user['fullname']) ? htmlspecialchars($user['fullname']) : ''; ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Enter new password (leave blank to keep current)">

    <button type="submit" name="update">Update Settings</button>
</form>
</div>

</body>
</html>