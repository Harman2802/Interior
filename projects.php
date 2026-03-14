<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>BestArt Interior</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:"Poppins",sans-serif;
}

body{
background:#f7f8fa;
color:#333;
}

/* CONTAINER */

.container{
width:90%;
max-width:1200px;
margin:auto;
}

/* HEADER */
/* ================= HEADER ================= */
.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    background: rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(6px);
}
/* ================= LOGO ================= */

.logo {
    display: flex;
    align-items: center;
    gap: 1opx;
    cursor: pointer;
}

/* Logo Image (Balanced Size) */
.logo img {
    height: 60px;        /* Perfect professional size */
    width: auto;
    object-fit: contain;
    transition: transform 0.3s ease;
}

/* Hover Effect */
.logo img:hover {
    transform: scale(1.05);
}

/* Brand Text */
.logo h2 {
    font-size: 24px;     /* Better proportion with image */
    font-weight: 400;
    color: #ffffff;      /* Change if navbar is light */
    margin: 0;
    letter-spacing: 1px;
}

.logo h2 span {
    color: #f4a23a;
}

/* ================= RESPONSIVE LOGO ================= */

@media (max-width: 768px) {
    .logo img {
        height: 45px;
    }

    .logo h2 {
        font-size: 20px;
    }
}
.navbar a{
margin-left:25px;
text-decoration:none;
color:white;
font-size:14px;
transition:.3s;
}

.navbar a:hover,
.navbar .active{color:#f4a23a;}

.signup-btn{
padding:8px 18px;
background:#f4a23a;
color:#000 !important;
border-radius:30px;
font-weight:600;
}

/* HERO */

.hero{
height:420px;
background:url("images/service1.jpg") center/cover;
display:flex;
align-items:center;
color:white;
position:relative;
}

.hero::before{
content:"";
position:absolute;
inset:0;
background:rgba(0,0,0,0.55);
}

.hero-content{
position:relative;
z-index:2;
}

.hero h1{
font-size:42px;
margin-bottom:10px;
}

.hero p{
max-width:520px;
line-height:1.6;
}

/* SECTION */

.section{
padding:70px 0;
}

.section-title{
text-align:center;
font-size:28px;
margin-bottom:45px;
}

/* GRID */

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
}

/* CARD */

.card{
background:white;
border-radius:14px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
transition:.3s;
position:relative;
}

.card:hover{
transform:translateY(-8px);
}

.card img{
width:100%;
height:200px;
object-fit:cover;
}

.card-content{
padding:18px;
}

.card-title{
font-weight:600;
margin-bottom:5px;
}

.card-meta{
font-size:13px;
color:#777;
margin-bottom:12px;
}

.card button{
background:#ff6b3d;
border:none;
padding:10px 18px;
color:white;
border-radius:25px;
cursor:pointer;
}

/* PROJECT BADGES */

.badge{
position:absolute;
top:12px;
left:12px;
padding:6px 10px;
font-size:12px;
border-radius:20px;
color:white;
}

.delivered{
background:#16a34a;
}

.upcoming{
background:#f59e0b;
}

/* QUOTE SECTION */

.quote-section{
display:grid;
grid-template-columns:1fr 1fr;
gap:40px;
align-items:center;
padding:70px 0;
}

.quote-form{
background:white;
padding:30px;
border-radius:16px;
box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.quote-form h2{
margin-bottom:10px;
}

.quote-form input,
.quote-form select{
width:100%;
padding:12px;
margin-bottom:14px;
border-radius:8px;
border:1px solid #ddd;
}

.quote-form button{
width:100%;
padding:14px;
background:#ff6b3d;
color:white;
border:none;
border-radius:30px;
font-weight:600;
cursor:pointer;
}

/* STATS */

.stats{
background:white;
padding:70px 0;
}

.stats-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:25px;
text-align:center;
}

.stat{
background:#fafafa;
padding:35px;
border-radius:14px;
}

.stat h2{
color:#ff6b3d;
font-size:34px;
}

/* TESTIMONIALS */

.testimonials{
background:#f3f5f7;
padding:70px 0;
text-align:center;
}

.testimonial-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
margin-top:30px;
}

.testimonial{
background:white;
padding:25px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.07);
}

/* PACKAGES */
/* PACKAGES SECTION */
.packages-section{
    background: #f4f4f9;
    padding: 70px 0;
    text-align: center;
}

.packages-section .section-title{
    font-size: 32px;
    margin-bottom: 50px;
    color: #333;
}

.packages-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    max-width: 1200px;
    margin: auto;
}

/* Package Cards */
.package-card{
    background: white;
    border-radius: 16px;
    padding: 30px 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
}

.package-card h3{
    font-size: 22px;
    margin-bottom: 15px;
    color: #ff6b3d;
}

.package-card p{
    font-size: 14px;
    line-height: 1.6;
    color: #555;
    margin-bottom: 20px;
}

.package-card .price{
    display: inline-block;
    padding: 8px 20px;
    background: #ff6b3d;
    color: #fff;
    border-radius: 25px;
    font-weight: 600;
    font-size: 16px;
}

/* Hover Effect */
.package-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Different color themes for packages */
.package-card.basic h3{ color: #16a34a; }
.package-card.premium h3{ color: #0ea5e9; }
.package-card.ultimate h3{ color: #f59e0b; }
.package-card.luxury h3{ color: #a855f7; }
.package-card.custom h3{ color: #ec4899; }
/* Package images */
.package-card .package-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px 12px 0 0;
    margin-bottom: 15px;
}

/* Adjust hover effect to include image */
.package-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}
/* Responsive */
@media(max-width:768px){
    .packages-grid{
        grid-template-columns: 1fr;
    }
}


/* CTA */

.cta{
background:#ff6b3d;
color:white;
padding:60px 0;
text-align:center;
}

.cta button{
margin-top:15px;
background:white;
color:#ff6b3d;
padding:12px 22px;
border:none;
border-radius:25px;
font-weight:600;
}
.cta{
background:#111;
color:#fff;
text-align:center;
padding:60px 20px;
}

.cta h2{
font-size:28px;
margin-bottom:20px;
}

.cta-btn{
background:#ff6b00;
color:#fff;
border:none;
padding:14px 30px;
font-size:16px;
border-radius:6px;
cursor:pointer;
transition:0.3s;
}

.cta-btn:hover{
background:#d8d3d0;
}
/* FOOTER */

footer{
background:#111;
color:#aaa;
padding:30px 0;
text-align:center;
font-size:14px;
}

/* MOBILE */

@media(max-width:900px){

.navbar{
display:none;
}

.quote-section{
grid-template-columns:1fr;
}

.hero h1{
font-size:32px;
}

}

</style>
</head>

<body>

<header class="header">
  <div class="logo">
  <img src="images/logo.png" alt="BestArt Interior Design">

    <h2>Best<span>Art</span></h2>
  </div>
<nav class="navbar">
<a href="#home">Home</a>
  <a href="#about">About Us</a>
  <a href="#services">Services</a>
  <a href="#customize">Customize</a>
  <a href="#gallery">Gallery</a>
  <a href="#pack">Packages</a>
  <a href="#estimate">Estimate</a>
  <a href="#reviews">Reviews</a>
  <a href="#contact">Contact Us</a>
<a href="signup.php" class="signup-btn">Sign Up</a>
</nav>
</header>


<section class="hero">
<div class="container hero-content">
<h1>Beautiful Interiors For Every Home</h1>
<p>Explore modern interior designs and transform your home with our expert designers.</p>
</div>
</section>


<!-- DELIVERED PROJECTS -->

<section class="section">

<h2 class="section-title">Delivered Projects</h2>

<div class="container grid">

<div class="card">
<span class="badge delivered">Delivered</span>
<img src="images/k1.jpg">

<div class="card-content">
<div class="card-title">Modern 3BHK Kitchen</div>
<div class="card-meta">Delhi • Luxury Finish</div>

<a href="deliver_project.php?id=1">
<button>View Design</button>
</a>

</div>
</div>

<div class="card">
<span class="badge delivered">Delivered</span>
<img src="images/b1.jpg">

<div class="card-content">
<div class="card-title">2BHK Apartment</div>
<div class="card-meta">Mumbai • Smart Storage</div>

<a href="deliver_project.php?id=2">
<button>View Design</button>
</a>

</div>
</div>

<div class="card">
<span class="badge delivered">Delivered</span>
<img src="images/o2.jpg">

<div class="card-content">
<div class="card-title">Luxury Living Room</div>
<div class="card-meta">Chandigarh • Premium</div>

<a href="deliver_project.php?id=3">
<button>View Design</button>
</a>

</div>
</div>

</div>
</section>

<section class="section">

<h2 class="section-title">Upcoming Projects</h2>

<div class="container grid">

<!-- PROJECT 1 -->
<div class="card">
<span class="badge upcoming">Upcoming</span>
<img src="images/k2.jpg">

<div class="card-content">

<div class="card-title">Smart Modular Kitchen</div>
<div class="card-meta">Launching Soon</div>

<a href="upcoming_project.php?id=1">
<button>Preview</button>
</a>

</div>
</div>

<!-- PROJECT 2 -->
<div class="card">
<span class="badge upcoming">Upcoming</span>
<img src="images/b2.jpg">

<div class="card-content">

<div class="card-title">Luxury Bedroom</div>
<div class="card-meta">Work in Progress</div>

<a href="upcoming_project.php?id=2">
<button>Preview</button>
</a>

</div>
</div>

<!-- PROJECT 3 -->
<div class="card">
<span class="badge upcoming">Upcoming</span>
<img src="images/o1.jpg">

<div class="card-content">

<div class="card-title">Modern Office Interior</div>
<div class="card-meta">Coming Soon</div>

<a href="upcoming_project.php?id=3">
<button>Preview</button>
</a>

</div>
</div>

</div>

</section>


<section class="section packages-section" id="pack">
  <h2 class="section-title">Our Interior Packages</h2>

  <div class="container packages-grid">
    
    <!-- Basic Package -->
    <div class="package-card basic">
      <img src="images/k4.jpg" alt="Basic Package" class="package-img">
      <h3>Basic Package</h3>
      <p>Ideal for small spaces. Includes color consultation, furniture layout, and essential decoration.</p>
      <span class="price">₹50,000</span>
    </div>

    <!-- Premium Package -->
    <div class="package-card premium">
      <img src="images/b5.jpg" alt="Premium Package" class="package-img">
      <h3>Premium Package</h3>
      <p>Includes everything in Basic + modular furniture, smart lighting, and premium finishes.</p>
      <span class="price">₹1,50,000</span>
    </div>

    <!-- Ultimate Package -->
    <div class="package-card ultimate">
      <img src="images/k5.jpg" alt="Ultimate Package" class="package-img">
      <h3>Ultimate Package</h3>
      <p>Complete home makeover with luxury furniture, advanced lighting, 3D visualization, and decor items.</p>
      <span class="price">₹3,00,000</span>
    </div>

  </div>
</section>




<!-- QUOTE SECTION -->

<section class="container quote-section">

<img src="images/service1.jpg" style="width:100%;border-radius:16px;">

<div class="quote-form">

<h2>Get Free Interior Quote</h2>

<form action="save_quote.php" method="POST">
  <input type="text" name="name" placeholder="Your Name" required>
  
  <!-- Editable email -->
  <input type="email" name="email" placeholder="Email Address" required>
  <input type="text" name="phone" placeholder="Phone Number" required>
  <input type="text" name="city" placeholder="Enter Your City" required>
  
  <select name="package" required>
    <option value="">Select Package</option>
    <option value="Basic">Basic</option>
    <option value="Premium">Premium</option>
    <option value="Ultimate">Ultimate</option>
  </select>
 
  <button type="submit">Get Free Quote</button>
</form>

</div>

</section>


<!-- STATS -->

<section class="stats">

<div class="container stats-grid">

<div class="stat">
<h2>120+</h2>
<p>Homes Delivered</p>
</div>

<div class="stat">
<h2>85+</h2>
<p>Design Experts</p>
</div>

<div class="stat">
<h2>10+</h2>
<p>Cities Covered</p>
</div>

<div class="stat">
<h2>4.8★</h2>
<p>Customer Rating</p>
</div>

</div>

</section>


<!-- TESTIMONIALS -->

<section class="testimonials">

<h2>What Clients Say</h2>

<div class="container testimonial-grid">

<div class="testimonial">
<p>Amazing work! My house looks perfect.</p>
<b>Rahul Sharma</b>
</div>

<div class="testimonial">
<p>Professional designers and smooth process.</p>
<b>Neha Verma</b>
</div>

<div class="testimonial">
<p>Best interior experience ever.</p>
<b>Aman Singh</b>
</div>

</div>

</section>


<!-- CTA -->

<section class="cta">

<h2>Ready to Design Your Dream Home?</h2>

<a href="consultation.php">
<button class="cta-btn">Get Free Consultation</button>
</a>

</section>


<footer>

© 2026 BestArt Interiors • All Rights Reserved

</footer>

</body>
</html>