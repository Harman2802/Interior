<?php
session_start();
include "db.php";

$message = "";
$message_type = "";

/* Handle form submission */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $message = "Email is required!";
        $message_type = "error";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Here you would normally send reset email
            $message = "Password reset link has been sent to your email.";
            $message_type = "success";
        } else {
            $message = "Email not found!";
            $message_type = "error";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Forgot Password</title>
<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url("images/bg.jpg");
background-size:cover;
}

.login-box{
position: relative;
background: rgba(255,255,255,0.1);
backdrop-filter: blur(25px);
padding: 50px 40px 40px 40px;
width: 400px;
border-radius: 20px;
box-shadow: 0 20px 50px rgba(0,0,0,0.3);
text-align: center;
color: white;
animation: fadeIn 0.6s ease;
}

.login-box h2{
margin-bottom: 30px;
font-weight: 700;
font-size: 28px;
}

.input-group{
margin-bottom: 18px;
position: relative;
}

.input-group input{
width:100%;
padding:15px 14px;
border:none;
border-radius:12px;
outline:none;
font-size:15px;
background:rgba(255,255,255,0.9);
transition:0.3s;
}

.input-group input:focus{
transform:scale(1.03);
box-shadow:0 0 12px rgba(255,255,255,0.7);
}

button{
width:100%;
padding:15px;
border:none;
border-radius:12px;
background:linear-gradient(135deg,#ff9966,#ff5e62);
color:white;
font-weight:600;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

button:hover{
transform:translateY(-3px);
box-shadow:0 10px 20px rgba(0,0,0,0.3);
}

.footer{
margin-top: 20px;
font-size: 14px;
}

.footer a{
color:white;
font-weight:600;
text-decoration:none;
}

.footer a:hover{
text-decoration:underline;
}

/* POPUP */
.popup{
position:fixed;
top:30px;
left:50%;
transform:translateX(-50%);
padding:15px 30px;
border-radius:12px;
color:white;
font-weight:600;
animation:slideDown 0.4s ease;
z-index:1000;
}

.popup.success{ background:#00c853; }
.popup.error{ background:#ff1744; }

@keyframes slideDown{
from{ top:-100px; opacity:0; }
to{ top:30px; opacity:1; }
}

@keyframes fadeIn{
from{ opacity:0; transform:translateY(20px); }
to{ opacity:1; transform:translateY(0); }
}
</style>
</head>
<body>

<?php if(!empty($message)) { ?>
<div class="popup <?php echo $message_type; ?>" id="popup">
<?php echo $message; ?>
</div>
<?php } ?>

<div class="login-box">

  <!-- Close button -->
  <a href="index.php" style="
      position:absolute;
      top:15px;
      right:20px;
      color:white;
      font-size:28px;
      font-weight:bold;
      text-decoration:none;
      transition:0.3s;
  ">&times;</a>

  <h2>Forgot Password</h2>

  <form method="POST">

    <div class="input-group">
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>

    <button type="submit">Send Reset Link</button>

  </form>

  <div class="footer">
    Remembered your password? <a href="login.php">Login</a>
  </div>

</div>

<script>
/* Hide popup after 3 seconds */
setTimeout(function(){
let popup = document.getElementById("popup");
if(popup){
popup.style.display="none";
}
},3000);
</script>

</body>
</html>