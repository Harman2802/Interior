<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
header("Location: login.php");
exit;
}

$user_id = $_SESSION['user']['id'];
$result = $conn->query("SELECT * FROM user_designs WHERE user_id=$user_id ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Designs | BestArt</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* GLOBAL */

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#eef2f3,#ffffff);
color:#333;
padding-top:90px;

display:flex;
flex-direction:column;
min-height:100vh;
}

/* HEADER */

.header{
position:fixed;
top:0;
left:0;
width:100%;
padding:14px 8%;
display:flex;
justify-content:space-between;
align-items:center;
background:rgba(255,255,255,0.85);
backdrop-filter:blur(10px);
box-shadow:0 4px 15px rgba(0,0,0,0.08);
z-index:1000;
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo img{
height:50px;
}

.logo h2{
font-weight:600;
color:#333;
}

.logo span{
color:#ff7b00;
}

/* NAVBAR */

.navbar a{
margin-left:20px;
text-decoration:none;
color:#333;
font-size:14px;
font-weight:500;
transition:.3s;
}

.navbar a:hover{
color:#ff7b00;
}

.signup-btn{
background:#ff7b00;
color:white !important;
padding:8px 18px;
border-radius:25px;
}

/* PAGE TITLE */
.page-content{
flex:1;
}
.container{
max-width:1000px;
margin:40px auto;
padding:0 20px;
}

.container h2{
text-align:center;
margin-bottom:35px;
font-size:28px;
}

/* DESIGN CARD */

.card{
background:white;
border-radius:14px;
padding:22px;
margin-bottom:20px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 8px 25px rgba(0,0,0,0.07);
transition:.3s;
}

.card:hover{
transform:translateY(-4px);
box-shadow:0 12px 30px rgba(0,0,0,0.12);
}

.card-left{
display:flex;
align-items:center;
gap:15px;
}

.icon{
width:45px;
height:45px;
background:#ff7b00;
border-radius:10px;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:18px;
}

.name{
font-size:17px;
font-weight:600;
}

.price{
color:#00a63e;
font-weight:bold;
font-size:14px;
}

/* DELETE BUTTON */

.delete-btn{
background:#ff3d3d;
border:none;
color:white;
padding:8px 14px;
border-radius:6px;
cursor:pointer;
transition:.3s;
}

.delete-btn:hover{
background:#d62828;
transform:scale(1.05);
}

/* EMPTY */

.empty{
background:white;
padding:40px;
border-radius:12px;
text-align:center;
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

/* FOOTER */
/* ===== PREMIUM FOOTER ===== */
.footer{
  background:linear-gradient(180deg,#0c0c0c,#050505);
  padding:80px 8% 30px;
  margin-top:100px;
  border-top:3px solid #c6a769;
  color:#bbb;
}

/* GRID */
/* ===== FOOTER CONTENT IMPROVED ===== */

.footer-content{
  max-width:1100px;        /* keeps content centered */
  margin:0 auto 40px;      /* equal left/right margin */
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
  gap:40px;
}

/* FOOTER COLUMN */
.footer-col {
    flex: 1;
    min-width: 200px;
}

.footer-col h3 {
    margin-bottom: 15px;
    font-size: 18px;
    color: #efe8e8;
}

.footer-col a {
    display: block;
    text-decoration: none;
    color: #f5eaea;
    margin-bottom: 8px;
    font-size: 15px;
    transition: 0.3s;
}

/* Hover effect */
.footer-col a:hover {
    color: #ece4e4;
    padding-left: 6px;
}
/* SOCIAL ICONS */
.footer-social{
  display:flex;
  justify-content:center;
  gap:15px;
  margin-bottom:25px;
}

.footer-social a{
  width:42px;
  height:42px;
  border-radius:50%;
  background:#e8e6e6;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#c6a769;
  font-size:16px;
  transition:0.3s ease;
  box-shadow:0 5px 10px rgba(236, 233, 233, 0.967);
}

.footer-social a:hover{
  background:#f1efea;
  color:#a29e9e;
  transform:translateY(-6px) scale(1.1);
}

/* BOTTOM */
.footer-bottom{
  text-align:center;
  font-size:13px;
  color:#fdf7f7;
  border-top:1px solid rgba(255,255,255,0.08);
  padding-top:20px;
}


/* MOBILE */

@media(max-width:700px){

.navbar{
display:none;
}

.card{
flex-direction:column;
align-items:flex-start;
gap:12px;
}

}

</style>

</head>

<body>

<!-- HEADER -->

<header class="header">

<div class="logo">
<img src="images/logo.png">
<h2>Best<span>Art</span></h2>
</div>

<nav class="navbar">
<a href="index.php">Home</a>
<a href="index.php#about">About</a>
<a href="index.php#services">Services</a>
<a href="designs.php">Designs</a>
<a href="index.php#gallery">Gallery</a>
<a href="index.php#contact">Contact</a>

<?php if(isset($_SESSION['user'])){ ?>
<a href="logout.php" class="signup-btn">Logout</a>
<?php } else { ?>
<a href="signup.php" class="signup-btn">Sign Up</a>
<?php } ?>
</nav>

</header>
<div class="page-content">
<!-- CONTENT -->

<div class="container">

<h2>My Selected Designs</h2>

<?php if($result->num_rows > 0){ ?>

<?php while($row=$result->fetch_assoc()){ ?>

<div class="card">

<div class="card-left">

<div class="icon">
<i class="fas fa-couch"></i>
</div>

<div>
<div class="name"><?php echo $row['package_name']; ?></div>
<div class="price">₹<?php echo $row['price']; ?></div>
</div>

</div>

<form method="POST" action="delete_design.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<button class="delete-btn"><i class="fa fa-trash"></i></button>
</form>

</div>

<?php } ?>

<?php } else { ?>

<div class="empty">
<p>No designs selected yet.</p>
</div>

<?php } ?>

</div>
</div>
<!-- FOOTER -->

<footer class="footer">
<div class="footer-content">
<div class="footer-col">
<h3>BestArt</h3>
<p>Modern interior solutions for modern living.</p>
</div>
<div class="footer-col">
<h3>Contact</h3>
<p>info@bestart.com</p>
<p>+91 95922 90249</p>
</div>
<div class="footer-col">
<h3>Links</h3>
<a href="#">About</a>
<a href="#">Services</a>
<a href="#">Gallery</a>
</div>
</div>
<div class="footer-social">
  <a href="#"><i class="fab fa-facebook-f"></i></a>
  <a href="#"><i class="fab fa-instagram"></i></a>
  <a href="#"><i class="fab fa-linkedin-in"></i></a>
</div>
<div class="footer-bottom">
© 2026 BestArt Interior Design
</div>
</footer>

</body>
</html>

