<?php

$type = $_GET['type'] ?? '';

$title="";
$description="";
$images=[];

switch($type){

case "modern":
$title="Modern Bedroom Design";
$description="Modern bedrooms focus on minimalism, neutral colors, and functional furniture with elegant lighting.";
$images=["images/b1.jpg","images/b2.jpg","images/b7.jpg"];
break;

case "luxury":
$title="Luxury Bedroom Design";
$description="Luxury bedrooms combine premium materials, upholstered beds, and elegant decor.";
$images=["images/b3.jpg","images/b4.jpg"];
break;

case "compact":
$title="Compact Bedroom";
$description="Smart storage solutions and space saving furniture for small bedrooms.";
$images=["images/b5.jpg","images/b6.jpg"];
break;

default:
$title="Bedroom Design";
$description="Explore our bedroom interior designs.";
}

?>


<!DOCTYPE html>
<html>
<head>

<title><?php echo $title; ?></title>

<style>

body{
font-family:Arial;
margin:0;
background:#f4f4f4;
}

/* HERO */

.hero{
height:320px;
background:url("<?php echo $images[0]; ?>") center/cover;
display:flex;
align-items:center;
justify-content:center;
color:white;
}

.hero h1{
background:rgba(0,0,0,0.6);
padding:15px 30px;
border-radius:6px;
}

/* CONTAINER */

.container{
width:90%;
max-width:1200px;
margin:auto;
padding:60px 0;
}

/* GALLERY */

.gallery{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
}

.gallery img{
width:100%;
border-radius:10px;
transition:.3s;
}

.gallery img:hover{
transform:scale(1.05);
}

/* FEATURES */

.features{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-top:40px;
}

.box{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
text-align:center;
}

/* CTA */

.cta{
background:#222;
color:white;
padding:50px;
margin-top:60px;
text-align:center;
border-radius:10px;
}

.cta a{
background:#c89b3c;
color:white;
padding:14px 30px;
text-decoration:none;
border-radius:6px;
display:inline-block;
margin-top:20px;
}

.back-btn {
    display: inline-block;
    margin-bottom: 20px;
    text-decoration: none;
    font-weight: bold;
    color: #333;
    background: #f17941;    
    padding: 8px 15px;
    border-radius: 6px;
    transition: 0.3s;
}

.back-btn:hover {
    background: #ddd;
}
</style>

</head>

<body>

<div class="hero">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">

<!-- BACK BUTTON -->
<a href="index.php" class="back-btn">← Back</a>

<p><?php echo $description; ?></p>

<h2>Bedroom Gallery</h2>

<div class="gallery">

<?php
foreach($images as $img){
    echo "<img src='$img'>";
}
?>

</div>

<h2 style="margin-top:40px;">Bedroom Features</h2>

<div class="features">

<div class="box">
<h3>Custom Wardrobes</h3>
<p>Sliding and hinged wardrobes with smart storage.</p>
</div>

<div class="box">
<h3>Modern Beds</h3>
<p>Comfortable beds with stylish headboards.</p>
</div>

<div class="box">
<h3>Dressing Units</h3>
<p>Elegant dressing tables with mirrors and lights.</p>
</div>

<div class="box">
<h3>Ambient Lighting</h3>
<p>Warm lighting for relaxing bedroom atmosphere.</p>
</div>

</div>

<div class="cta">

<h2>Ready to Design Your Bedroom?</h2>

<p>Book a free consultation with our interior experts.</p>

<a href="custom-plan.php?room=bedroom">Request Custom Plan</a>

</div>

</div>


</body>
</html>