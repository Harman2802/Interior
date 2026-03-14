<?php
session_start();
include "db.php";

/* CHECK LOGIN */
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

/* GET LATEST HOME QUOTE OF THIS USER */
$stmt = $conn->prepare("SELECT package FROM homequote WHERE user_id=? ORDER BY id DESC LIMIT 1");
$stmt->bind_param("i",$user_id);
$stmt->execute();
$result = $stmt->get_result();

$package = "Not Selected";

if($row = $result->fetch_assoc()){
    $package = $row['package'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quote Submitted | BestArt</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Segoe UI',sans-serif;
}

body{
  min-height:100vh;
  display:flex;
  flex-direction:column;
  background:linear-gradient(135deg,#6c63ff,#e56b6f);
  overflow:hidden;
}

/* HEADER */
.header{
  background:rgba(255,255,255,0.1);
  backdrop-filter:blur(10px);
  padding:20px 40px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  color:white;
}

.logo{
  font-weight:700;
  letter-spacing:3px;
  font-size:20px;
}

/* MAIN */
.container{
  flex:1;
  display:flex;
  justify-content:center;
  align-items:center;
  padding:20px;
  position:relative;
}

/* Floating circles */
.container::before,
.container::after{
  content:"";
  position:absolute;
  width:300px;
  height:300px;
  background:rgba(255,255,255,0.15);
  border-radius:50%;
  z-index:0;
}

.container::before{
  top:-80px;
  left:-80px;
}

.container::after{
  bottom:-100px;
  right:-100px;
}

/* CARD */
.card{
  position:relative;
  z-index:1;
  background:rgba(255,255,255,0.15);
  backdrop-filter:blur(20px);
  padding:60px;
  border-radius:25px;
  text-align:center;
  box-shadow:0 25px 50px rgba(0,0,0,0.25);
  max-width:550px;
  width:100%;
  color:white;
  animation:slideUp 0.7s ease;
}

/* SUCCESS ICON */
.success-icon{
  width:90px;
  height:90px;
  border-radius:50%;
  background:white;
  color:#3cad46;
  font-size:40px;
  display:flex;
  justify-content:center;
  align-items:center;
  margin:auto;
  margin-bottom:25px;
  animation:pop 0.5s ease;
}

h2{
  margin-bottom:15px;
  font-size:26px;
}

p{
  line-height:1.6;
  opacity:0.9;
}

.summary{
  margin:25px 0;
  padding:18px;
  border-radius:15px;
  background:rgba(255,255,255,0.2);
  font-weight:600;
  font-size:18px;
}

/* BUTTONS */
.buttons{
  margin-top:30px;
  display:flex;
  justify-content:center;
  gap:20px;
  flex-wrap:wrap;
}

.btn{
  padding:14px 30px;
  border-radius:30px;
  font-weight:600;
  cursor:pointer;
  border:none;
  transition:0.3s;
}

.btn-primary{
  background:white;
  color:#6c63ff;
}

.btn-primary:hover{
  transform:translateY(-3px);
  box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.btn-secondary{
  background:transparent;
  border:2px solid white;
  color:white;
}

.btn-secondary:hover{
  background:white;
  color:#6c63ff;
  transform:translateY(-3px);
}

/* Animations */
@keyframes slideUp{
  from{opacity:0; transform:translateY(40px);}
  to{opacity:1; transform:translateY(0);}
}

@keyframes pop{
  from{transform:scale(0);}
  to{transform:scale(1);}
}
</style>
</head>

<body>

<div class="header">
  <div class="logo">BestArt</div>
</div>

<div class="container">
  <div class="card">

    <div class="success-icon">✔</div>

    <h2>Thank You for Choosing BestArt!</h2>

    <p>
      Your quote request has been successfully submitted.
      Our design team will contact you within 24 hours.
    </p>

    <div class="summary">
      Selected Package: <?php echo htmlspecialchars($package); ?>
    </div>

    <div class="buttons">
      <button class="btn btn-primary" onclick="goHome()">Back to Home</button>
      <button class="btn btn-secondary" onclick="startOver()">Start New Design</button>
    </div>

  </div>
</div>

<script>

function goHome(){
  window.location.href="index.php";
}

function startOver(){
  window.location.href="full-home.php";
}

</script>

</body>
</html>