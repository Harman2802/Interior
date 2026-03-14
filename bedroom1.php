    <!DOCTYPE html>

    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestArt | Minimal Bedroom</title>

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
    transition:transform .3s;
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
    url("https://images.unsplash.com/photo-1505693314120-0d443867891c?w=1200&auto=format&fit=crop");
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
    color:#111;
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
    font-size:.95rem;
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

    .btn:hover::after{left:125%;}

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
    <img src="images/logo.png" alt="BestArt Interior Design">
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
    Minimal Bedroom Designs
    </div>

    <div class="container">

    <!-- CARD 1 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1505693314120-0d443867891c?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Soft White Bedroom</h3>
    <p>Minimal white bedroom with wooden bed.</p>
    <div class="price">₹30,000</div>
    <button class="btn" onclick="book('Soft White Bedroom','30000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 2 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Nordic Bedroom</h3>
    <p>Scandinavian minimal bedroom design.</p>
    <div class="price">₹36,000</div>
    <button class="btn" onclick="book('Nordic Bedroom','36000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 3 -->

    <div class="card">
    <img src="images/b1.jpg" loading="lazy">
    <div class="card-content">
    <h3>Compact Bedroom</h3>
    <p>Smart minimal layout for small rooms.</p>
    <div class="price">₹28,000</div>
    <button class="btn" onclick="book('Compact Bedroom','28000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 4 -->

    <div class="card">
    <img src="images/b3.jpg" loading="lazy">
    <div class="card-content">
    <h3>Wood Finish Bedroom</h3>
    <p>Natural wood bed with warm lighting.</p>
    <div class="price">₹34,000</div>
    <button class="btn" onclick="book('Wood Finish Bedroom','34000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 5 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Grey Minimal Bedroom</h3>
    <p>Neutral grey bedroom theme.</p>
    <div class="price">₹32,000</div>
    <button class="btn" onclick="book('Grey Minimal Bedroom','32000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 6 -->

    <div class="card">
    <img src="images/b4.jpg" loading="lazy">
    <div class="card-content">
    <h3>Minimal Couple Bedroom</h3>
    <p>Simple modern bedroom setup.</p>
    <div class="price">₹38,000</div>
    <button class="btn" onclick="book('Minimal Couple Bedroom','38000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 7 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Pastel Bedroom</h3>
    <p>Soft pastel tones with minimal decor.</p>
    <div class="price">₹33,000</div>
    <button class="btn" onclick="book('Pastel Bedroom','33000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 8 -->

    <div class="card">
    <img src="images/b6.jpg" loading="lazy">
    <div class="card-content">
    <h3>Studio Bedroom</h3>
    <p>Minimal studio apartment bedroom.</p>
    <div class="price">₹29,000</div>
    <button class="btn" onclick="book('Studio Bedroom','29000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 9 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1560184897-ae75f418493e?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Elegant Minimal Bedroom</h3>
    <p>Clean layout with modern lighting.</p>
    <div class="price">₹37,000</div>
    <button class="btn" onclick="book('Elegant Minimal Bedroom','37000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 10 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1615873968403-89e068629265?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>Light Wood Bedroom</h3>
    <p>Simple wood textures with soft lighting.</p>
    <div class="price">₹35,000</div>
    <button class="btn" onclick="book('Light Wood Bedroom','35000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 11 -->

    <div class="card">
    <img src="images/b7.jpg" loading="lazy">
    <div class="card-content">
    <h3>Minimal Teen Bedroom</h3>
    <p>Simple modern teen bedroom design.</p>
    <div class="price">₹31,000</div>
    <button class="btn" onclick="book('Minimal Teen Bedroom','31000')">Book Now</button>
    </div>
    </div>

    <!-- CARD 12 -->

    <div class="card">
    <img src="https://images.unsplash.com/photo-1560185008-b033106af5c3?w=600&auto=format&fit=crop" loading="lazy">
    <div class="card-content">
    <h3>White Elegant Bedroom</h3>
    <p>Bright white minimal bedroom setup.</p>
    <div class="price">₹39,000</div>
    <button class="btn" onclick="book('White Elegant Bedroom','39000')">Book Now</button>
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
