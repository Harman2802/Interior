<?php
$type = $_GET['type'] ?? '';

$title = "";
$description = "";
$images = [];

switch($type){

case "barcounter":
    $title = "Bar Counter";
    $description = "Modern bar counter designs that enhance the elegance of your dining area. Stylish, functional and customizable to your space.";
    $images = ["images/d1.jpg","images/d2.jpg","images/d6.jpg"];
    break;

case "crockery":
    $title = "Crockery Shelf";
    $description = "Customized crockery shelves designed to organize and display your crockery beautifully. Perfect for elegant dining interiors.";
    $images = ["images/d3.jpg","images/d4.jpg","images/d9.jpg"];
    break;

case "chair":
    $title = "Dining Chair";
    $description = "Comfortable and stylish dining chairs made for modern homes. Fully customizable to match your table and interior theme.";
    $images = ["images/d5.jpg","images/d6.jpg","images/d1.jpg"];
    break;

case "table":
    $title = "Dining Table";
    $description = "Premium dining tables designed to match your interior theme, made from durable materials like hardwood, laminate, and glass.";
    $images = ["images/d7.jpg","images/d8.jpg","images/d1.jpg"];
    break;

case "washcounter":
    $title = "Wash Counter";
    $description = "Functional wash counters that complement dining interiors, designed for maximum utility and style.";
    $images = ["images/d9.jpg","images/d10.jpg","images/d3.jpg"];
    break;

default:
    $title = "Dining Room Furniture";
    $description = "Explore our custom-made dining room furniture designs.";
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>

<style>
body{font-family:Arial; margin:0; background:#f5f5f5;}

/* BACK BUTTON */
.back-btn{
    display:inline-block;
    margin:20px 0 10px 0;
    text-decoration:none;
    font-weight:bold;
    color:#333;
    background:#f0f0f0;
    padding:8px 15px;
    border-radius:6px;
    transition:.3s;
}
.back-btn:hover{background:#ddd;}

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
background:rgba(0,0,0,0.5);
padding:15px 30px;
border-radius:8px;
}

/* CONTAINER */
.container{width:90%; max-width:1200px; margin:auto; padding:50px 0;}
.desc{font-size:18px; line-height:1.6; margin-bottom:40px; text-align:center;}

/* GALLERY */
.gallery{display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;}
.gallery img{width:100%; border-radius:10px; transition:.3s;}
.gallery img:hover{transform:scale(1.05);}

/* FEATURES */
.features{display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; margin-top:40px;}
.feature-box{background:white; padding:25px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1); text-align:center;}
.feature-box h3{margin-bottom:10px;}

/* CTA */
.cta{background:#222; color:white; padding:50px; margin-top:60px; text-align:center; border-radius:10px;}
.cta a{background:#c89b3c; color:white; padding:14px 30px; text-decoration:none; border-radius:6px; display:inline-block; margin-top:20px;}
</style>
</head>
<body>

<div class="container">

<a href="index.php" class="back-btn">← Back</a>

<div class="hero">
<h1><?php echo $title; ?></h1>
</div>

<p class="desc"><?php echo $description; ?></p>

<h2>Gallery</h2>
<div class="gallery">
<?php foreach($images as $img){ echo "<img src='$img'>"; } ?>
</div>

<h2 style="margin-top:40px;">Highlights & Features</h2>
<div class="features">
<div class="feature-box"><h3>Customizable</h3><p>Design to fit your space and style.</p></div>
<div class="feature-box"><h3>Premium Material</h3><p>High-quality wood, laminates, and hardware.</p></div>
<div class="feature-box"><h3>Functional Design</h3><p>Efficient and smart storage solutions.</p></div>
<div class="feature-box"><h3>Stylish Finish</h3><p>Elegant colors and modern aesthetics.</p></div>
</div>

<div class="cta">
<h2>Want This Design?</h2>
<p>Book a free consultation with our interior experts.</p>
<a href="custom-plan.php?room=dining">Request Custom Plan</a>
</div>

</div>
</body>
</html>