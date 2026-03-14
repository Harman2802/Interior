<?php

$id = $_GET['id'] ?? 1;

$projects = [
    1 => [
        "title" => "Modern 3BHK Kitchen",
        "city" => "Delhi",
        "image" => "images/k1.jpg",
        "area" => "1850 sq.ft",
        "budget" => "₹12 Lakhs",
        "style" => "Modern Minimal",
        "duration" => "45 Days",
        "description" => "This kitchen features premium modular cabinets, quartz countertops, soft-close drawers, and smart storage solutions. Designed for functionality with an elegant modern aesthetic."
    ],
    2 => [
        "title" => "2BHK Apartment Interior",
        "city" => "Mumbai",
        "image" => "images/b1.jpg",
        "area" => "950 sq.ft",
        "budget" => "₹8 Lakhs",
        "style" => "Contemporary",
        "duration" => "35 Days",
        "description" => "A modern apartment design with space-saving furniture, neutral color palette, modular wardrobes, and elegant lighting."
    ],
    3 => [
        "title" => "Luxury Living Room",
        "city" => "Chandigarh",
        "image" => "images/o2.jpg",
        "area" => "1400 sq.ft",
        "budget" => "₹10 Lakhs",
        "style" => "Luxury Premium",
        "duration" => "40 Days",
        "description" => "Premium living room with elegant lighting, wooden panels, designer sofa setup, marble TV wall, and luxurious ceiling design."
    ]
];

$project = $projects[$id] ?? $projects[1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $project['title']; ?></title>
<style>
/* ======================
   BASE STYLES
====================== */
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
body{ background:#f4f6f9; color:#1e293b; line-height:1.6; }
a{ text-decoration:none; }

/* ======================
   HEADER
====================== */
header{
    background:#1e293b;
    color:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:sticky;
    top:0;
    z-index:100;
}
header h1{ font-size:22px; }
header nav a{ color:white; margin-left:20px; transition:0.3s; }
header nav a:hover{ color:#3b82f6; font-weight:600; }

/* ======================
   FOOTER
====================== */
footer{
    background:#1e293b;
    color:white;
    text-align:center;
    padding:20px;
    margin-top:50px;
}

/* ======================
   CONTAINER
====================== */
.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    padding:40px 0;
}

/* ======================
   PROJECT MAIN
====================== */
.project-main{
    display:flex;
    gap:40px;
    flex-wrap:wrap;
    background:white;
    padding:30px;
    border-radius:14px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
}

.project-image{
    flex:1;
    min-width:300px;
}

.project-image img{
    width:100%;
    border-radius:12px;
    height:400px;
    object-fit:cover;
}

.project-details{
    flex:1;
    min-width:280px;
}

.project-title{
    font-size:32px;
    font-weight:700;
    margin-bottom:10px;
}

.project-meta{
    color:#888;
    font-size:15px;
    margin-bottom:20px;
}

/* INFO GRID */
.info-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:25px;
}

.info-box{
    background:#f9fafb;
    padding:18px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.info-box h4{ margin-bottom:5px; color:#ff6b3d; }

/* DESCRIPTION */
.project-desc{
    font-size:16px;
    color:#555;
    margin-bottom:30px;
}

/* GALLERY */
.gallery{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:15px;
    margin-bottom:30px;
}
.gallery img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:10px;
    transition:0.3s;
}
.gallery img:hover{ transform:scale(1.05); }

/* CTA BUTTONS */
.btn{
    display:inline-block;
    padding:12px 22px;
    background:#ff6b3d;
    color:white;
    border-radius:8px;
    margin-right:10px;
    transition:0.3s;
}
.btn:hover{ background:#e2572d; }
.back-btn{ background:#333; }
.back-btn:hover{ background:#000; }

/* ======================
   RESPONSIVE
====================== */
@media(max-width:900px){
    .project-main{ flex-direction:column; }
    .info-grid{ grid-template-columns:1fr; }
}
</style>
</head>
<body>

<!-- HEADER -->
<header>
    <h1>Bestart</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="projects.php">Projects</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<!-- MAIN CONTENT -->
<div class="container">

    <div class="project-main">

        <!-- LEFT IMAGE -->
        <div class="project-image">
            <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
        </div>

        <!-- RIGHT DETAILS -->
        <div class="project-details">
            <h2 class="project-title"><?php echo $project['title']; ?></h2>
            <div class="project-meta">📍 Location: <?php echo $project['city']; ?></div>

            <!-- INFO GRID -->
            <div class="info-grid">
                <div class="info-box">
                    <h4>Area</h4>
                    <p><?php echo $project['area']; ?></p>
                </div>
                <div class="info-box">
                    <h4>Budget</h4>
                    <p><?php echo $project['budget']; ?></p>
                </div>
                <div class="info-box">
                    <h4>Design Style</h4>
                    <p><?php echo $project['style']; ?></p>
                </div>
                <div class="info-box">
                    <h4>Duration</h4>
                    <p><?php echo $project['duration']; ?></p>
                </div>
            </div>

            <p class="project-desc"><?php echo $project['description']; ?></p>

            <!-- CTA BUTTONS -->
            <a href="index.php" class="btn back-btn">⬅ Back to Home</a>
            <a href="projects.php" class="btn">Get Similar Design</a>
        </div>

    </div>

    <!-- GALLERY -->
    <h3 style="margin-top:40px; margin-bottom:15px;">Project Gallery</h3>
    <div class="gallery">
        <img src="images/k1.jpg" alt="Gallery Image">
        <img src="images/k2.jpg" alt="Gallery Image">
        <img src="images/k3.jpg" alt="Gallery Image">
    </div>

</div>

<!-- FOOTER -->
<footer>
    © <?php echo date("Y"); ?> BestInterior | Designed with ❤️
</footer>

</body>
</html>