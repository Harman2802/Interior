<?php
$type = $_GET['type'] ?? '';

$title = "";
$description = "";
$images = [];

switch($type){

case "bookshelves":
    $title = "Custom Bookshelves";
    $description = "Beautiful bookshelves designed to enhance your living space while providing practical storage for books, decor items, and more.";
    $images = ["images/l1.jpg","images/l2.jpg","images/l17.jpg"];
    break;

case "centertable":
    $title = "Center Table";
    $description = "Stylish center tables to complement your sofa and living room decor.";
    $images = ["images/l3.jpg","images/l4.jpg","images/l18.jpg"];
    break;

case "chairs":
    $title = "Designer Chairs";
    $description = "Modern designer chairs that combine comfort, durability, and elegance.";
    $images = ["images/l5.jpg","images/l6.jpg","images/l19.jpg"];
    break;

case "lcdunit":
    $title = "LCD Display Unit";
    $description = "TV display units crafted with premium finishes for a luxurious look.";
    $images = ["images/l7.jpg","images/l8.jpeg","images/l20.jpg"];
    break;

case "partition":
    $title = "Living-Dining Partition";
    $description = "Elegant partitions to separate living and dining areas while maintaining openness and style.";
    $images = ["images/l9.jpg","images/l10.jpg"];
    break;

case "prayerunit":
    $title = "Prayer Unit";
    $description = "Custom prayer units designed to fit perfectly into your living space with traditional elegance.";
    $images = ["images/l11.jpg","images/l12.jpg"];
    break;

case "shoerack":
    $title = "Shoe Rack";
    $description = "Organized shoe rack designs that save space and enhance entryway aesthetics.";
    $images = ["images/l13.jpg","images/l14.jpg"];
    break;

case "sofas":
    $title = "Sofas";
    $description = "Comfortable and stylish sofas available in modern, classic, and luxury designs.";
    $images = ["images/l15.jpg","images/l16.jpg"];
    break;

default:
    $title = "Living Room Furniture";
    $description = "Explore our premium living room furniture designs.";
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

<a href="living.html" class="back-btn">← Back</a>

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
<div class="feature-box"><h3>Customizable</h3><p>Fully customized designs for your living room.</p></div>
<div class="feature-box"><h3>Premium Material</h3><p>High-quality wood, laminates, and hardware.</p></div>
<div class="feature-box"><h3>Functional Design</h3><p>Smart storage and efficient layout.</p></div>
<div class="feature-box"><h3>Stylish Finish</h3><p>Elegant colors and modern aesthetics.</p></div>
</div>

<div class="cta">
<h2>Want This Design?</h2>
<p>Book a free consultation with our interior experts.</p>
<a href="custom-plan.php?room=living">Request Custom Plan</a>
</div>

</div>

</body>
</html>