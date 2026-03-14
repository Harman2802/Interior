<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Minimal Living Space</title>

<style>

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
padding:12px 8%;
display:flex;
justify-content:space-between;
align-items:center;
background:rgba(0,0,0,0.35);
backdrop-filter:blur(6px);
z-index:100;
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo img{
height:55px;
}

.logo h2{
color:#fff;
font-weight:400;
}

.logo span{
color:#f4a23a;
}

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
color:#000 !important;
border-radius:30px;
font-weight:600;
}

/* HERO */

.hero{
background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
url("https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1200&auto=format&fit=crop");
height:300px;
background-size:cover;
background-position:center;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:32px;
font-weight:bold;
margin-top:80px;
text-align:center;
}

/* GRID */

.container{
padding:50px 8%;
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
margin-bottom:12px;
font-size:1.25rem;
color:#111;
}

.card p{
font-size:0.95rem;
line-height:1.5;
color:#555;
flex-grow:1;
margin-bottom:15px;
}

.price{
font-weight:bold;
color:#00a152;
margin-bottom:15px;
}

/* BOOK BUTTON */

.btn{
background:linear-gradient(135deg,#00c853,#00e676);
color:#fff;
padding:12px 0;
border:none;
border-radius:10px;
cursor:pointer;
font-weight:600;
font-size:1rem;
text-transform:uppercase;
letter-spacing:.5px;
box-shadow:0 6px 12px rgba(0,200,83,0.3);
transition:.3s;
}

.btn:hover{
transform:scale(1.05);
box-shadow:0 10px 20px rgba(0,200,83,0.4);
}

/* FOOTER */

.footer{
text-align:center;
padding:25px;
background:#111;
color:white;
margin-top:50px;
font-size:.95rem;
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
Minimal Living Space Designs
</div>

<div class="container">

<!-- CARD 1 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Soft White Minimal Room</h3>
<p>Clean white palette with modern sofa.</p>
<div class="price">₹32,000</div>
<button class="btn" onclick="book('Soft White Minimal Room','32000')">Book Now</button>
</div>
</div>

<!-- CARD 2 -->
<div class="card">
<img src="images/l15.jpg" loading="lazy">
<div class="card-content">
<h3>Scandinavian Minimal</h3>
<p>Light wood finish with neutral tones.</p>
<div class="price">₹38,000</div>
<button class="btn" onclick="book('Scandinavian Minimal','38000')">Book Now</button>
</div>
</div>

<!-- CARD 3 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Compact Urban Style</h3>
<p>Perfect for studio apartments.</p>
<div class="price">₹29,000</div>
<button class="btn" onclick="book('Compact Urban Style','29000')">Book Now</button>
</div>
</div>

<!-- CARD 4 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1617104678098-de229db51175?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Nordic Minimal Lounge</h3>
<p>Wood textures with soft lighting.</p>
<div class="price">₹41,000</div>
<button class="btn" onclick="book('Nordic Minimal Lounge','41000')">Book Now</button>
</div>
</div>

<!-- CARD 5 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Grey Minimal Setup</h3>
<p>Simple grey tones with sleek finish.</p>
<div class="price">₹35,000</div>
<button class="btn" onclick="book('Grey Minimal Setup','35000')">Book Now</button>
</div>
</div>

<!-- CARD 6 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Minimal TV Unit Room</h3>
<p>Clean TV wall with compact seating.</p>
<div class="price">₹37,000</div>
<button class="btn" onclick="book('Minimal TV Unit Room','37000')">Book Now</button>
</div>
</div>

<!-- CARD 7 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Warm Beige Minimal</h3>
<p>Soft beige tones with elegant layout.</p>
<div class="price">₹36,000</div>
<button class="btn" onclick="book('Warm Beige Minimal','36000')">Book Now</button>
</div>
</div>

<!-- CARD 8 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Modern Studio Minimal</h3>
<p>Smart storage with clean design.</p>
<div class="price">₹34,000</div>
<button class="btn" onclick="book('Modern Studio Minimal','34000')">Book Now</button>
</div>
</div>

<!-- CARD 9 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Light Wood Minimal</h3>
<p>Natural wood finish with airy feel.</p>
<div class="price">₹39,000</div>
<button class="btn" onclick="book('Light Wood Minimal','39000')">Book Now</button>
</div>
</div>

<!-- CARD 10 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1588854337115-1c67d9247e4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Minimal Pastel Room</h3>
<p>Soft pastel shades with modern decor.</p>
<div class="price">₹33,000</div>
<button class="btn" onclick="book('Minimal Pastel Room','33000')">Book Now</button>
</div>
</div>

<!-- CARD 11 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Simple Family Minimal</h3>
<p>Comfortable family-friendly layout.</p>
<div class="price">₹42,000</div>
<button class="btn" onclick="book('Simple Family Minimal','42000')">Book Now</button>
</div>
</div>

<!-- CARD 12 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Elegant Minimal White</h3>
<p>Bright white theme with clean lines.</p>
<div class="price">₹40,000</div>
<button class="btn" onclick="book('Elegant Minimal White','40000')">Book Now</button>
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

})
.catch(error=>{
console.log(error);
alert("Server error");
});

}

</script>

</body>
</html>