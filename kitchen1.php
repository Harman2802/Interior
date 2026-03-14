<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Smart Modular Kitchen</title>

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
width:auto;
object-fit:contain;
}

.logo h2{
font-size:24px;
font-weight:400;
color:#fff;
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
background:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.4)),url("images/k7.jpg");
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
}

.card-content{
padding:20px;
display:flex;
flex-direction:column;
flex-grow:1;
}

.card h3{
margin-bottom:10px;
}

.card p{
font-size:.95rem;
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
}

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
Smart Modular Kitchen Designs
</div>

<div class="container">

<!-- CARD 1 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556912173-3bb406ef7e77?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Modern L-Shape Kitchen</h3>
<p>Space-saving L-shape modular kitchen layout.</p>
<div class="price">₹1,20,000</div>
<button class="btn" onclick="book('Modern L-Shape Kitchen','120000')">Book Now</button>
</div>
</div>

<!-- CARD 2 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>U-Shape Smart Kitchen</h3>
<p>Efficient U-shape kitchen with smart storage.</p>
<div class="price">₹1,45,000</div>
<button class="btn" onclick="book('U-Shape Smart Kitchen','145000')">Book Now</button>
</div>
</div>

<!-- CARD 3 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Parallel Modular Kitchen</h3>
<p>Modern parallel design with sleek cabinets.</p>
<div class="price">₹1,30,000</div>
<button class="btn" onclick="book('Parallel Modular Kitchen','130000')">Book Now</button>
</div>
</div>

<!-- CARD 4 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556912173-3bb406ef7e77?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Island Kitchen Setup</h3>
<p>Premium island kitchen with breakfast counter.</p>
<div class="price">₹1,80,000</div>
<button class="btn" onclick="book('Island Kitchen Setup','180000')">Book Now</button>
</div>
</div>

<!-- CARD 5 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Glossy White Kitchen</h3>
<p>High-gloss cabinets with LED lighting.</p>
<div class="price">₹1,50,000</div>
<button class="btn" onclick="book('Glossy White Kitchen','150000')">Book Now</button>
</div>
</div>

<!-- CARD 6 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Wood Finish Kitchen</h3>
<p>Warm wood textures with modular fittings.</p>
<div class="price">₹1,35,000</div>
<button class="btn" onclick="book('Wood Finish Kitchen','135000')">Book Now</button>
</div>
</div>

<!-- CARD 7 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Compact Apartment Kitchen</h3>
<p>Smart design perfect for small flats.</p>
<div class="price">₹1,10,000</div>
<button class="btn" onclick="book('Compact Apartment Kitchen','110000')">Book Now</button>
</div>
</div>

<!-- CARD 8 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Luxury Black Kitchen</h3>
<p>Matte black finish with premium fittings.</p>
<div class="price">₹1,90,000</div>
<button class="btn" onclick="book('Luxury Black Kitchen','190000')">Book Now</button>
</div>
</div>

<!-- CARD 9 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Smart Storage Kitchen</h3>
<p>Pull-out drawers and corner storage system.</p>
<div class="price">₹1,55,000</div>
<button class="btn" onclick="book('Smart Storage Kitchen','155000')">Book Now</button>
</div>
</div>

<!-- CARD 10 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Minimal Grey Kitchen</h3>
<p>Modern grey modular kitchen concept.</p>
<div class="price">₹1,40,000</div>
<button class="btn" onclick="book('Minimal Grey Kitchen','140000')">Book Now</button>
</div>
</div>

<!-- CARD 11 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>High-Tech Smart Kitchen</h3>
<p>Sensor lights and soft-close cabinets.</p>
<div class="price">₹2,10,000</div>
<button class="btn" onclick="book('High-Tech Smart Kitchen','210000')">Book Now</button>
</div>
</div>

<!-- CARD 12 -->
<div class="card">
<img src="https://images.unsplash.com/photo-1600585152915-d208bec867a1?w=600&auto=format&fit=crop" loading="lazy">
<div class="card-content">
<h3>Premium Family Kitchen</h3>
<p>Spacious modular kitchen for big families.</p>
<div class="price">₹1,75,000</div>
<button class="btn" onclick="book('Premium Family Kitchen','175000')">Book Now</button>
</div>
</div>

</div>

<div class="footer">© 2026 BestArt Interior Designs</div>

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