<?php

$id = $_GET['id'] ?? 1;

$projects = [
    1 => [
        "title" => "Smart Modular Kitchen",
        "status" => "Launching Soon",
        "city" => "Delhi",
        "image" => "images/k2.jpg",
        "area" => "1800 sq.ft",
        "budget" => "₹11 Lakhs",
        "style" => "Modern Minimal",
        "duration" => "50 Days",
        "description" => "This upcoming kitchen design features smart storage, matte finish cabinets, and modern lighting concepts."
    ],
    2 => [
        "title" => "Luxury Bedroom Interior",
        "status" => "Work in Progress",
        "city" => "Mumbai",
        "image" => "images/b2.jpg",
        "area" => "1200 sq.ft",
        "budget" => "₹9 Lakhs",
        "style" => "Luxury Contemporary",
        "duration" => "40 Days",
        "description" => "A premium bedroom interior with designer wall panels, warm lighting, and luxury furniture."
    ],
    3 => [
        "title" => "Modern Office Interior",
        "status" => "Coming Soon",
        "city" => "Chandigarh",
        "image" => "images/o1.jpg",
        "area" => "1500 sq.ft",
        "budget" => "₹10 Lakhs",
        "style" => "Corporate Modern",
        "duration" => "45 Days",
        "description" => "Modern workspace design with ergonomic furniture, open workspace planning, and stylish interiors."
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
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI',sans-serif; }
body{ background:#f4f6f9; color:#1e293b; line-height:1.6; }
a{ text-decoration:none; }

/* HEADER */
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

/* FOOTER */
footer{
    background:#1e293b;
    color:white;
    text-align:center;
    padding:20px;
    margin-top:50px;
}

/* CONTAINER */
.container{
    width:90%;
    max-width:1200px;
    margin:auto;
    padding:40px 0;
}

/* PROJECT MAIN */
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

.project-desc{
    font-size:16px;
    color:#555;
    margin-bottom:30px;
}

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

.status{
    display:inline-block;
    background:#ff9800;
    color:#fff;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    margin-bottom:15px;
}

/* RESPONSIVE */
@media(max-width:900px){
    .project-main{ flex-direction:column; }
    .info-grid{ grid-template-columns:1fr; }
}
</style>
</head>
<body>

<header>
    <h1>Bestart</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="projects.php">Projects</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<div class="container">

    <div class="project-main">

        <div class="project-image">
            <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
        </div>

        <div class="project-details">

            <span class="status"><?php echo $project['status']; ?></span>

            <h2 class="project-title"><?php echo $project['title']; ?></h2>
            <div class="project-meta">📍 Location: <?php echo $project['city']; ?></div>

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

            <a href="projects.php" class="btn back-btn">⬅ Back to Projects</a>
            <a href="projects.php" class="btn">Get Similar Design</a>
        </div>

    </div>

    <h3 style="margin-top:40px; margin-bottom:15px;">Project Gallery</h3>
    <div class="gallery">
        <img src="images/k1.jpg" alt="Gallery Image">
        <img src="images/k2.jpg" alt="Gallery Image">
        <img src="images/k3.jpg" alt="Gallery Image">
    </div>

</div>

<footer>
    © <?php echo date("Y"); ?> BestInterior | Designed with ❤️
</footer>

</body>
</html>