<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Classic Bedroom</title>

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
url("https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=1200&auto=format&fit=crop");
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
color:#8b5e3c;
font-weight:bold;
margin-bottom:15px;
}

/* BUTTON */

.btn{
background:linear-gradient(135deg,#8b5e3c,#b67c54);
color:white;
padding:12px 0;
border:none;
border-radius:10px;
cursor:pointer;
font-weight:600;
font-size:1rem;
text-transform:uppercase;
letter-spacing:.5px;
box-shadow:0 6px 12px rgba(139,94,60,0.3);
transition:all .3s;
position:relative;
overflow:hidden;
}

.btn:hover{
transform:scale(1.05);
box-shadow:0 10px 20px rgba(139,94,60,0.4);
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
Classic Bedroom Designs
</div>

<div class="container">

<!-- CARD 1 -->

<div class="card">
<img src="images/b0.jpg" loading="lazy">
<div class="card-content">
<h3>Royal Wooden Bedroom</h3>
<p>Traditional carved wooden bed with vintage decor.</p>
<div class="price">₹55,000</div>
<button class="btn" onclick="book('Royal Wooden Bedroom','55000')">Book Now</button>
</div>
</div>

<!-- CARD 2 -->

<div class="card">
<img src="images/b1.jpg" loading="lazy">
<div class="card-content">
<h3>Vintage Gold Bedroom</h3>
<p>Classic gold accents with luxury curtains.</p>
<div class="price">₹62,000</div>
<button class="btn" onclick="book('Vintage Gold Bedroom','62000')">Book Now</button>
</div>
</div>

<!-- CARD 3 -->

<div class="card">
<img src="images/b2.jpg" loading="lazy">
<div class="card-content">
<h3>Elegant Cream Bedroom</h3>
<p>Soft cream tones with antique furniture.</p>
<div class="price">₹58,000</div>
<button class="btn" onclick="book('Elegant Cream Bedroom','58000')">Book Now</button>
</div>
</div>

<!-- CARD 4 -->

<div class="card">
<img src="images/b3.jpg" loading="lazy">
<div class="card-content">
<h3>Heritage Style Bedroom</h3>
<p>Traditional design with carved headboard.</p>
<div class="price">₹65,000</div>
<button class="btn" onclick="book('Heritage Style Bedroom','65000')">Book Now</button>
</div>
</div>

<!-- CARD 5 -->

<div class="card">
<img src="images/b4.jpg" loading="lazy">
<div class="card-content">
<h3>Classic Brown Theme</h3>
<p>Warm brown palette with vintage lamps.</p>
<div class="price">₹53,000</div>
<button class="btn" onclick="book('Classic Brown Theme','53000')">Book Now</button>
</div>
</div>

<!-- CARD 6 -->

<div class="card">
<img src="images/b5.jpg" loading="lazy">
<div class="card-content">
<h3>Traditional Family Bedroom</h3>
<p>Classic family bedroom with heavy drapes.</p>
<div class="price">₹60,000</div>
<button class="btn" onclick="book('Traditional Family Bedroom','60000')">Book Now</button>
</div>
</div>

<!-- CARD 7 -->

<div class="card">
<img src="images/b6.jpg" loading="lazy">
<div class="card-content">
<h3>Antique Wooden Finish</h3>
<p>Dark wood polish with timeless detailing.</p>
<div class="price">₹57,000</div>
<button class="btn" onclick="book('Antique Wooden Finish','57000')">Book Now</button>
</div>
</div>

<!-- CARD 8 -->

<div class="card">
<img src="images/b7.jpg" loading="lazy">
<div class="card-content">
<h3>Royal Suite Bedroom</h3>
<p>Classic suite layout with grand lighting.</p>
<div class="price">₹70,000</div>
<button class="btn" onclick="book('Royal Suite Bedroom','70000')">Book Now</button>
</div>
</div>

<!-- CARD 9 -->

<div class="card">
<img src="images/b8.jpg" loading="lazy">
<div class="card-content">
<h3>Luxury Classic White</h3>
<p>White vintage bedroom with premium decor.</p>
<div class="price">₹63,000</div>
<button class="btn" onclick="book('Luxury Classic White','63000')">Book Now</button>
</div>
</div>

<!-- CARD 10 -->

<div class="card">
<img src="images/b3.jpg" loading="lazy">
<div class="card-content">
<h3>Victorian Bedroom</h3>
<p>Victorian era style furniture with detail.</p>
<div class="price">₹68,000</div>
<button class="btn" onclick="book('Victorian Bedroom','68000')">Book Now</button>
</div>
</div>

<!-- CARD 11 -->

<div class="card">
<img src="images/b0.jpg" loading="lazy">
<div class="card-content">
<h3>Classic Comfort Bedroom</h3>
<p>Traditional comfort with elegant textures.</p>
<div class="price">₹59,000</div>
<button class="btn" onclick="book('Classic Comfort Bedroom','59000')">Book Now</button>
</div>
</div>

<!-- CARD 12 -->

<div class="card">
<img src="images/b1.jpg" loading="lazy">
<div class="card-content">
<h3>Grand Heritage Suite</h3>
<p>Premium heritage theme with royal finish.</p>
<div class="price">₹72,000</div>
<button class="btn" onclick="book('Grand Heritage Suite','72000')">Book Now</button>
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
