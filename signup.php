<?php
session_start();
include "db.php";

$message = "";
$message_type = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

$photo = "";

if(empty($name) || empty($email) || empty($password)){
$message = "All fields are required!";
$message_type = "error";
}else{

/* CHECK EMAIL */
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s",$email);
$check->execute();
$check->store_result();

if($check->num_rows > 0){

$message = "Email already registered!";
$message_type = "error";

}else{

/* HANDLE IMAGE UPLOAD */

if(!empty($_FILES['photo']['name'])){

$folder = "uploads/";

if(!is_dir($folder)){
mkdir($folder,0777,true);
}

$filename = time()."_".basename($_FILES['photo']['name']);
$target = $folder.$filename;

move_uploaded_file($_FILES['photo']['tmp_name'],$target);

$photo = $target;

}

/* PASSWORD HASH */
$hashed_password = password_hash($password,PASSWORD_DEFAULT);

/* INSERT USER */
$stmt = $conn->prepare("INSERT INTO users (fullname,email,password,photo) VALUES (?,?,?,?)");

$stmt->bind_param("ssss",$name,$email,$hashed_password,$photo);

if($stmt->execute()){

$_SESSION['signup_success']="Account created successfully!";
header("Location: login.php");
exit();

}else{

$message="Something went wrong!";
$message_type="error";

}

$stmt->close();
}

$check->close();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Create Account</title>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family: 'Poppins', sans-serif;
}

body{
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url("images/bg.jpg");
}

.signup-container{
 background: rgba(255,255,255,0.15);
 backdrop-filter: blur(25px);
 padding:45px;
 width:420px;
 border-radius:25px;
 box-shadow:0 25px 50px rgba(0,0,0,0.25);
 text-align:center;
 color:white;
 position:relative;
 animation: fadeIn 0.6s ease;
}

.signup-container h2{
  margin-bottom:25px;
  font-weight:600;
}

.input-group{
  margin-bottom:18px;
}

.input-group input{
  width:100%;
  padding:14px;
  border:none;
  border-radius:12px;
  font-size:14px;
  outline:none;
  background: rgba(255,255,255,0.9);
  transition:0.3s;
}

.input-group input:focus{
  transform: scale(1.03);
  box-shadow:0 0 10px rgba(255,255,255,0.6);
}

button{
  width:100%;
  padding:14px;
  border:none;
  border-radius:12px;
  background: linear-gradient(135deg,#ff9966,#ff5e62);
  color:white;
  font-weight:600;
  cursor:pointer;
  transition:0.3s;
  font-size:15px;
}

button:hover{
  transform: translateY(-3px);
  box-shadow:0 10px 20px rgba(0,0,0,0.3);
}

.footer-text{
  margin-top:18px;
  font-size:14px;
}

.footer-text a{
  color:black;
  font-weight:600;
  text-decoration:none;
}

.footer-text a:hover{
  text-decoration:underline;
}

/* POPUP */
.popup{
    position: fixed;
    top: 30px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 30px;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    z-index: 999;
    animation: slideDown 0.4s ease;
}

.popup.success{
    background: #00c853;
}

.popup.error{
    background: #ff1744;
}

@keyframes slideDown{
    from{ top:-100px; opacity:0; }
    to{ top:30px; opacity:1; }
}

@keyframes fadeIn{
    from{opacity:0; transform: translateY(20px);}
    to{opacity:1; transform: translateY(0);}
}
</style>
</head>


<body>

<?php if(!empty($message)) { ?>
    <div class="popup <?php echo $message_type; ?>" id="popup">
        <?php echo $message; ?>
    </div>
<?php } ?>



<div class="signup-container">

<a href="index.php" style="
    position:absolute;
    top:15px;
    right:20px;
    color:black;
    font-size:30px;
    font-weight:bold;
    text-decoration:none;
    transition:0.3s;
">×</a>

  <h2>Create Your Account</h2>

 <form action="signup.php" method="POST" enctype="multipart/form-data">

<div class="input-group">
<input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Email Address" required>
</div>

<div class="input-group">
<input type="file" name="photo" accept="image/*">
</div>

<div class="input-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit">Sign Up</button>

</form>

  <div class="footer-text">
    Already have an account?
    <a href="login.php">Login</a>
  </div>

</div>

<script>
setTimeout(function(){
    let popup = document.getElementById("popup");
    if(popup){
        popup.style.display = "none";
    }
}, 3000);
</script>

</body>
</html>