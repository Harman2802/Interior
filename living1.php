<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Modern Living Room</title>

<style>
/* RESET */
*{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
body{background:#f4f6f8;color:#333;}

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
    background:linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
    url("https://images.unsplash.com/photo-1618220179428-22790b461013?w=1200&auto=format&fit=crop");
    height:300px;
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:32px;
    font-weight:bold;
    text-align:center;
}

/* GRID */
.container{
    padding:50px 20px;
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:30px;
}

/* CARD */
.card{
    background:white;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 12px 24px rgba(0,0,0,0.08);
    transition:.4s;
    display:flex;
    flex-direction:column;
}
.card:hover{transform:translateY(-10px) scale(1.03); box-shadow:0 20px 40px rgba(0,0,0,0.15);}
.card img{width:100%; height:220px; object-fit:cover; transition:.3s;}
.card img:hover{transform: scale(1.05);}
.card-content{padding:20px; display:flex; flex-direction:column; flex-grow:1;}
.card h3{margin-bottom:12px; font-size:1.25rem; color:#111;}
.card p{font-size:0.95rem; line-height:1.5; color:#555; flex-grow:1; margin-bottom:15px;}
.price {
    display: inline-block;
    
    font-weight: bold;
    padding: 6px 12px;
    border-radius: 12px;
    margin-bottom: 15px;
    font-size: 0.95rem;
}
/* BOOK BUTTON STYLING */
.btn {
    background: linear-gradient(135deg, #00c853, #00e676); /* Green gradient */
    color: #fff;
    padding: 12px 0;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 6px 12px rgba(0,200,83,0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

/* Hover animation */
.btn:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0,200,83,0.4);
}

/* Animated gradient overlay on hover */
.btn::after {
    content: "";
    position: absolute;
    top: 0; left: -75%;
    width: 50%;
    height: 100%;
    background: rgba(255,255,255,0.25);
    transform: skewX(-25deg);
    transition: all 0.5s;
}

.btn:hover::after {
    left: 125%;
}
/* FOOTER */
.footer{text-align:center; padding:25px; background:#111; color:white; margin-top:50px; font-size:0.95rem;}

/* RESPONSIVE */
@media(max-width:900px){.container{grid-template-columns:repeat(2, 1fr);}}
@media(max-width:600px){
    .container{grid-template-columns:1fr;}
    .navbar{flex-direction:column; align-items:flex-start;}
    .nav-links{margin-top:10px;}
    .nav-links a{margin:0 15px 10px 0;}
    .hero{font-size:24px; padding:20px;}
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

<!-- HERO -->
<div class="hero">Modern Living Room Designs</div>

<!-- CARDS -->
<div class="container">

<!-- Card 1 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Minimal Grey Living Room">
<div class="card-content">
<h3>Minimal Grey Living Room</h3>
<p>Clean modern design with premium sofa and lighting.</p>
<div class="price">₹45,000</div>
<button class="btn" onclick="book('Minimal Grey Living Room','45000')">Book Now</button>
</div>
</div>

<!-- Card 2 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1618220179428-22790b461013?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Luxury Wooden Interior">
<div class="card-content">
<h3>Luxury Wooden Interior</h3>
<p>Wood panel design with modern furniture setup.</p>
<div class="price">₹72,000</div>
<button class="btn" onclick="book('Luxury Wooden Interior','72000')">Book Now</button>
</div>
</div>

<!-- Card 3 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="White Elegant Hall">
<div class="card-content">
<h3>White Elegant Hall</h3>
<p>Designer lighting with modern white theme.</p>
<div class="price">₹60,000</div>
<button class="btn" onclick="book('White Elegant Hall','60000')">Book Now</button>
</div>
</div>

<!-- Card 4 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Premium Family Living Room">
<div class="card-content">
<h3>Premium Family Living Room</h3>
<p>Spacious layout with decoration pieces.</p>
<div class="price">₹80,000</div>
<button class="btn" onclick="book('Premium Family Living Room','80000')">Book Now</button>
</div>
</div>

<!-- Card 5 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Modern Beige Living Room">
<div class="card-content">
<h3>Modern Beige Living Room</h3>
<p>Warm beige tones with comfortable seating.</p>
<div class="price">₹52,000</div>
<button class="btn" onclick="book('Modern Beige Living Room','52000')">Book Now</button>
</div>
</div>

<!-- Card 6 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Classic Sofa Lounge">
<div class="card-content">
<h3>Classic Sofa Lounge</h3>
<p>Elegant sofa setup with wall decor.</p>
<div class="price">₹48,000</div>
<button class="btn" onclick="book('Classic Sofa Lounge','48000')">Book Now</button>
</div>
</div>

<!-- Card 7 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="LED Panel Living Room">
<div class="card-content">
<h3>LED Panel Living Room</h3>
<p>Modern LED panel wall with stylish furniture.</p>
<div class="price">₹67,000</div>
<button class="btn" onclick="book('LED Panel Living Room','67000')">Book Now</button>
</div>
</div>

<!-- Card 8 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1617806118233-18e1de247200?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Compact Studio Living Room">
<div class="card-content">
<h3>Compact Studio Living Room</h3>
<p>Smart design perfect for small homes.</p>
<div class="price">₹38,000</div>
<button class="btn" onclick="book('Compact Studio Living Room','38000')">Book Now</button>
</div>
</div>

<!-- Card 9 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=600&h=400&auto=format&fit=crop" loading="lazy" alt="Luxury Marble Theme">
<div class="card-content">
<h3>Luxury Marble Theme</h3>
<p>Premium marble wall with designer sofa.</p>
<div class="price">₹90,000</div>
<button class="btn" onclick="book('Luxury Marble Theme','90000')">Book Now</button>
</div>
</div>

</div>

<!-- FOOTER -->
<div class="footer">© 2026 BestArt Interior Designs</div>

<script>
function book(name, price){

fetch("save_booking.php",{
method:"POST",
headers:{
"Content-Type":"application/json"
},
body:JSON.stringify({
package:name,
price:price
})
})
.then(res=>res.json())
.then(data=>{

if(data.status === "login_required"){
alert("Please login first");
window.location.href="login.php";
return;
}

if(data.status === "success"){
localStorage.setItem("selectedPackage", name);
localStorage.setItem("selectedPrice", price);
window.location.href="packages.php";
}else{
alert("Booking failed");
}

});
}
</script>

</body>
</html>