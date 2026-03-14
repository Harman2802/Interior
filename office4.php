<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Creative Studio</title>

<style>

/* RESET */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;}
body{background:#f4f6f8;color:#333;}

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
z-index:100;
background:rgba(0,0,0,0.35);
backdrop-filter:blur(6px);
}

/* LOGO */

.logo{
display:flex;
align-items:center;
gap:10px;
cursor:pointer;
}

.logo img{
height:60px;
transition:.3s;
}

.logo img:hover{transform:scale(1.05);}

.logo h2{
font-size:24px;
font-weight:400;
color:#fff;
letter-spacing:1px;
}

.logo span{color:#f4a23a;}

.navbar a{
margin-left:25px;
text-decoration:none;
color:white;
font-size:14px;
transition:.3s;
}

.navbar a:hover{color:#f4a23a;}

.signup-btn{
padding:8px 18px;
background:#f4a23a;
color:#000 !important;
border-radius:30px;
font-weight:600;
}

/* HERO */

.hero{
background:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),
url("images/o3.jpg");
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

.card img:hover{transform:scale(1.05);}

.card-content{
padding:20px;
display:flex;
flex-direction:column;
flex-grow:1;
}

.card h3{
margin-bottom:12px;
font-size:1.25rem;
}

.card p{
font-size:.95rem;
line-height:1.5;
color:#555;
flex-grow:1;
margin-bottom:15px;
}

.price{
font-weight:bold;
margin-bottom:15px;
}

/* BUTTON */

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

.btn:hover::after{left:125%;}

/* FOOTER */

.footer{
text-align:center;
padding:25px;
background:#111;
color:white;
margin-top:50px;
}

/* RESPONSIVE */

@media(max-width:900px){
.container{grid-template-columns:repeat(2,1fr);}
}

@media(max-width:600px){

.container{grid-template-columns:1fr;}

.hero{font-size:24px;padding:20px;}

.navbar{display:none;}

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
Creative Studio Interior Designs
</div>

<div class="container">

<div class="card">
<img src="images/o1.jpg" loading="lazy">
<div class="card-content">
<h3>Artist Studio</h3>
<p>Creative painting studio with natural lighting.</p>
<div class="price">₹1,40,000</div>
<button class="btn" onclick="book('Artist Studio','140000')">Book Now</button>
</div>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Photography Studio</h3>
<p>Professional photography workspace setup.</p>
<div class="price">₹1,85,000</div>
<button class="btn" onclick="book('Photography Studio','185000')">Book Now</button>
</div>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Design Studio</h3>
<p>Modern workspace for designers and creators.</p>
<div class="price">₹1,60,000</div>
<button class="btn" onclick="book('Design Studio','160000')">Book Now</button>
</div>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Music Studio</h3>
<p>Sound-friendly creative music workspace.</p>
<div class="price">₹2,10,000</div>
<button class="btn" onclick="book('Music Studio','210000')">Book Now</button>
</div>
</div>

<div class="card">
<img src="images/o2.jpg" loading="lazy">
<div class="card-content">
<h3>Creative Office Studio</h3>
<p>Hybrid creative workspace with office layout.</p>
<div class="price">₹1,70,000</div>
<button class="btn" onclick="book('Creative Office Studio','170000')">Book Now</button>
</div>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1497366412874-3415097a27e7?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Open Creative Studio</h3>
<p>Open layout studio with modern furniture.</p>
<div class="price">₹1,80,000</div>
<button class="btn" onclick="book('Open Creative Studio','180000')">Book Now</button>
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