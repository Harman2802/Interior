<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Luxury Master Suite</title>

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
background:#f4f6f8;
color:#333;
}

/* HEADER */

.header{
position:fixed;
top:0;
left:0;
width:100%;
padding:10px 8%;
display:flex;
justify-content:space-between;
align-items:center;
background:rgba(0,0,0,0.35);
backdrop-filter:blur(6px);
z-index:100;
}

/* LOGO */

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo img{
height:60px;
}

.logo h2{
color:white;
font-weight:400;
}

.logo span{
color:#f4a23a;
}

/* NAV */

.navbar a{
margin-left:25px;
text-decoration:none;
color:white;
font-size:14px;
transition:.3s;
}

.navbar a:hover{
color:#f4a23a;
}

.signup-btn{
padding:8px 18px;
background:#f4a23a;
color:black !important;
border-radius:30px;
font-weight:600;
}

/* HERO */

.hero{
background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
url("https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1200&auto=format&fit=crop");
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
margin-top:80px;
}

/* GRID */

.container{
padding:50px 20px;
display:grid;
grid-template-columns:repeat(3,1fr);
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

.card:hover{
transform:translateY(-10px) scale(1.03);
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

.card img{
width:100%;
height:220px;
object-fit:cover;
transition:.3s;
}

.card img:hover{
transform:scale(1.05);
}

.card-content{
padding:20px;
display:flex;
flex-direction:column;
flex-grow:1;
}

.card h3{
margin-bottom:10px;
font-size:1.25rem;
}

.card p{
font-size:.95rem;
line-height:1.5;
flex-grow:1;
margin-bottom:15px;
color:#555;
}

.price{
color:#00a152;
font-weight:bold;
margin-bottom:15px;
}

/* BUTTON */

.btn{
background:linear-gradient(135deg,#00c853,#00e676);
color:white;
padding:12px 0;
border:none;
border-radius:10px;
cursor:pointer;
font-weight:600;
font-size:1rem;
text-transform:uppercase;
letter-spacing:.5px;
box-shadow:0 6px 12px rgba(0,200,83,0.3);
transition:all .3s;
position:relative;
overflow:hidden;
}

.btn:hover{
transform:scale(1.05);
box-shadow:0 10px 20px rgba(0,200,83,0.4);
}

.btn::after{
content:"";
position:absolute;
top:0;
left:-75%;
width:50%;
height:100%;
background:rgba(255,255,255,.25);
transform:skewX(-25deg);
transition:.5s;
}

.btn:hover::after{
left:125%;
}

/* FOOTER */

.footer{
text-align:center;
padding:25px;
background:#111;
color:white;
margin-top:50px;
font-size:.9rem;
}

/* RESPONSIVE */

@media(max-width:900px){
.container{
grid-template-columns:repeat(2,1fr);
}
}

@media(max-width:600px){

.container{
grid-template-columns:1fr;
}

.navbar{
display:none;
}

.hero{
font-size:24px;
padding:20px;
}

}

</style>

</head>

<body>

<header class="header">

<div class="logo">
<img src="images/logo.png">
<h2>Best<span>Art</span></h2>
</div>

<nav class="navbar">
<a href="index.html">Home</a>
<a href="services.html">Services</a>
<a href="contact.html">Contact</a>
<a href="quote.html">Quote</a>
<a href="signup.php" class="signup-btn">Sign Up</a>
</nav>

</header>

<div class="hero">
Luxury Master Suite Designs
</div>

<div class="container">

<!-- 1 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Royal Gold Suite</h3>
<p>Premium gold accents with velvet king bed.</p>
<div class="price">₹1,25,000</div>
<button class="btn" onclick="book('Royal Gold Suite','125000')">Book Now</button>
</div>
</div>

<!-- 2 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1505693314120-0d443867891c?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Modern Luxury Suite</h3>
<p>Spacious suite with designer lighting.</p>
<div class="price">₹1,10,000</div>
<button class="btn" onclick="book('Modern Luxury Suite','110000')">Book Now</button>
</div>
</div>

<!-- 3 -->

<div class="card">
<img src="images/b8.jpg" loading="lazy">
<div class="card-content">
<h3>Marble Wall Master Suite</h3>
<p>Elegant marble backdrop with premium decor.</p>
<div class="price">₹1,45,000</div>
<button class="btn" onclick="book('Marble Wall Master Suite','145000')">Book Now</button>
</div>
</div>

<!-- 4 -->

<div class="card">
<img src="images/b2.jpg" loading="lazy">
<div class="card-content">
<h3>Wood Panel Luxury Suite</h3>
<p>Warm wood finish with soft ambient lighting.</p>
<div class="price">₹1,20,000</div>
<button class="btn" onclick="book('Wood Panel Luxury Suite','120000')">Book Now</button>
</div>
</div>

<!-- 5 -->

<div class="card">
<img src="images/b5.jpg" loading="lazy">
<div class="card-content">
<h3>Executive Master Bedroom</h3>
<p>Elegant executive-style master suite.</p>
<div class="price">₹1,35,000</div>
<button class="btn" onclick="book('Executive Master Bedroom','135000')">Book Now</button>
</div>
</div>

<!-- 6 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Luxury Walk-in Closet Suite</h3>
<p>Master suite with premium wardrobe space.</p>
<div class="price">₹1,50,000</div>
<button class="btn" onclick="book('Luxury Walk-in Closet Suite','150000')">Book Now</button>
</div>
</div>

<!-- 7 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Grey Elite Master Suite</h3>
<p>Neutral grey tones with luxury bedding.</p>
<div class="price">₹1,18,000</div>
<button class="btn" onclick="book('Grey Elite Master Suite','118000')">Book Now</button>
</div>
</div>

<!-- 8 -->

<div class="card">
<img src="images/b6.jpg" loading="lazy">
<div class="card-content">
<h3>Contemporary King Suite</h3>
<p>Modern king-size suite with LED ceiling.</p>
<div class="price">₹1,28,000</div>
<button class="btn" onclick="book('Contemporary King Suite','128000')">Book Now</button>
</div>
</div>

<!-- 9 -->

<div class="card">
<img src="images/b3.jpg" loading="lazy">
<div class="card-content">
<h3>Luxury Couple Suite</h3>
<p>Romantic master suite with warm tones.</p>
<div class="price">₹1,22,000</div>
<button class="btn" onclick="book('Luxury Couple Suite','122000')">Book Now</button>
</div>
</div>

<!-- 10 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1560185008-b033106af5c3?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>White Royal Master Suite</h3>
<p>Bright white royal themed master bedroom.</p>
<div class="price">₹1,40,000</div>
<button class="btn" onclick="book('White Royal Master Suite','140000')">Book Now</button>
</div>
</div>

<!-- 11 -->

<div class="card">
<img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Minimal Luxury Suite</h3>
<p>Clean minimal luxury with premium finish.</p>
<div class="price">₹1,15,000</div>
<button class="btn" onclick="book('Minimal Luxury Suite','115000')">Book Now</button>
</div>
</div>

<!-- 12 -->

<div class="card">
<img src="images/b4.jpg" loading="lazy">
<div class="card-content">
<h3>Grand Master Bedroom</h3>
<p>Large spacious master suite with chandelier.</p>
<div class="price">₹1,55,000</div>
<button class="btn" onclick="book('Grand Master Bedroom','155000')">Book Now</button>
</div>
</div>

</div>

<div class="footer">
© 2026 BestArt Interior Designs
</div>

<script>

function book(name,price){

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

if(data.status==="login_required"){
alert("Please login first");
window.location.href="login.php";
return;
}

if(data.status==="success"){
localStorage.setItem("selectedPackage",name);
localStorage.setItem("selectedPrice",price);
window.location.href="packages.php";
}else{
alert("Booking failed");
}

});

}

</script>

</body>
</html>
