<?php

$type = $_GET['type'] ?? '';

$title="";
$description="";
$images=[];

switch($type){

case "island":
$title="Island Kitchen";
$description="Island kitchens are perfect for open homes and modern living. They provide extra workspace, seating and stylish storage.";
$images=["images/k1.jpg","images/k2.jpg","images/k11.jpg","images/k12.jpg"];
break;

case "lshape":
$title="L Shape Kitchen";
$description="L shaped kitchens maximize corner space and improve workflow efficiency. Ideal for medium homes.";
$images=["images/k3.jpg","images/k8.jpg","images/k6.jpg"];
break;

case "parallel":
$title="Parallel Kitchen";
$description="Parallel kitchens provide efficient workspace on both sides for seamless cooking.";
$images=["images/k5.jpg","images/k9.jpg","images/k6.jpg"];
break;

case "straight":
$title="Straight Kitchen";
$description="Straight kitchens are sleek and minimal layouts ideal for compact homes.";
$images=["images/k6.jpg","images/k7.jpg"];
break;

case "ushape":
$title="U Shape Kitchen";
$description="U shaped kitchens provide maximum storage and workspaces on three sides.";
$images=["images/k8.jpg","images/k9.jpg","images/k7.jpg"];
break;

default:
$title="Kitchen Design";
$description="Explore our premium kitchen designs.";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>

<style>

body{
font-family:Arial;
margin:0;
background:#f5f5f5;
}

/* HERO */
.hero{
height:350px;
background:url("<?php echo $images[0]; ?>") center/cover;
display:flex;
align-items:center;
justify-content:center;
color:white;
text-align:center;
}

.hero h1{
font-size:45px;
background:rgba(0,0,0,0.5);
padding:15px 30px;
border-radius:8px;
}

/* CONTAINER */

.container{
width:90%;
max-width:1200px;
margin:auto;
padding:60px 0;
}

/* DESCRIPTION */

.desc{
font-size:18px;
line-height:1.6;
text-align:center;
margin-bottom:40px;
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
margin-top:50px;
}

.feature-box{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
text-align:center;
}

.feature-box h3{
margin-bottom:10px;
}

/* PROCESS */

.process{
margin-top:60px;
text-align:center;
}

.steps{
display:flex;
flex-wrap:wrap;
gap:20px;
justify-content:center;
margin-top:30px;
}

.step{
background:white;
padding:20px;
width:180px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* CTA */

.cta{
margin-top:60px;
text-align:center;
background:#222;
color:white;
padding:50px;
border-radius:10px;
}

.cta a{
display:inline-block;
margin-top:20px;
padding:14px 30px;
background:#c89b3c;
color:white;
text-decoration:none;
border-radius:6px;
}

.back{
display:inline-block;
margin-bottom:20px;
text-decoration:none;
font-weight:bold;
}

</style>

</head>

<body>

<div class="hero">
<h1><?php echo $title; ?></h1>
</div>

<div class="container">

<a href="kitchen.html" class="back">← Back</a>

<p class="desc"><?php echo $description; ?></p>

<!-- IMAGE GALLERY -->

<h2>Design Gallery</h2>

<div class="gallery">

<?php
foreach($images as $img){
echo "<img src='$img'>";
}
?>

</div>

<!-- FEATURES -->

<h2 style="margin-top:50px;">Kitchen Highlights</h2>

<div class="features">

<div class="feature-box">
<h3>Smart Storage</h3>
<p>Optimized cabinets and drawers for maximum storage.</p>
</div>

<div class="feature-box">
<h3>Modern Design</h3>
<p>Premium finishes and contemporary aesthetics.</p>
</div>

<div class="feature-box">
<h3>Durable Materials</h3>
<p>High-quality plywood, laminates and hardware.</p>
</div>

<div class="feature-box">
<h3>Space Optimization</h3>
<p>Designed to use every inch efficiently.</p>
</div>

</div>

<!-- PROCESS -->

<div class="process">

<h2>Our Design Process</h2>

<div class="steps">

<div class="step">
<h4>1</h4>
<p>Consultation</p>
</div>

<div class="step">
<h4>2</h4>
<p>Design Planning</p>
</div>

<div class="step">
<h4>3</h4>
<p>Material Selection</p>
</div>

<div class="step">
<h4>4</h4>
<p>Installation</p>
</div>

</div>

</div>

<!-- CTA -->

<div class="cta">

<h2>Want This Kitchen Design?</h2>
<p>Get a customized design plan from our interior experts.</p>

<a href="custom-plan.php">Request Free Consultation</a>

</div>

</div>

</body>
</html>