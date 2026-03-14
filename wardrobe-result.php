<?php
$conn = new mysqli("localhost", "root", "", "bestart_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get latest wardrobe quote
$result = $conn->query("SELECT * FROM wardrobe_quotes ORDER BY id DESC LIMIT 1");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wardrobe Quote Result</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Reset */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif;}

body{
    background: linear-gradient(135deg, #e0e7ff, #fef3c7);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;
}

.card{
    background:#fff;
    width:100%;
    max-width:700px;
    border-radius:20px;
    padding:40px;
    box-shadow:0 25px 50px rgba(0,0,0,0.1);
    animation:fadeIn 0.5s ease;
    position:relative;
    overflow:hidden;
}

.success-icon{
    width:60px;
    height:60px;
    background:#4ade80;
    color:white;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 20px;
    font-size:28px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#1e3a8a;
    margin-bottom:30px;
    font-weight:700;
    font-size:1.8rem;
}

.summary{
    background:#f3f4f6;
    padding:30px;
    border-radius:15px;
    display:grid;
    gap:12px;
}

.summary p{
    display:flex;
    justify-content:space-between;
    font-size:15px;
    color:#374151;
    border-bottom:1px dashed #d1d5db;
    padding-bottom:6px;
}

.summary p:last-child{
    border-bottom:none;
}

.summary strong{
    color:#111827;
}

.section-title{
    margin-top:20px;
    margin-bottom:10px;
    font-weight:600;
    color:#1e3a8a;
    font-size:1rem;
}

.actions{
    text-align:center;
    margin-top:30px;
}

.home-btn{
    display:inline-block;
    padding:14px 30px;
    background:#1e3a8a;
    color:white;
    font-weight:500;
    font-size:15px;
    border-radius:12px;
    text-decoration:none;
    transition:all 0.25s ease;
    box-shadow:0 5px 15px rgba(30,58,138,0.25);
}

.home-btn:hover{
    background:#4338ca;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(30,58,138,0.3);
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(10px);}
    to{opacity:1; transform:translateY(0);}
}

@media(max-width:480px){
    .card{
        padding:25px;
    }
    h2{
        font-size:1.5rem;
    }
    .home-btn{
        padding:12px 25px;
        font-size:14px;
    }
}
</style>
</head>
<body>

<div class="card">

    <div class="success-icon">✔</div>
    <h2>Wardrobe Quote Submitted Successfully 🎉</h2>

    <div class="summary">
        <p><strong>Name:</strong> <span><?php echo htmlspecialchars($data['name']); ?></span></p>
        <p><strong>Email:</strong> <span><?php echo htmlspecialchars($data['email']); ?></span></p>
        <p><strong>Phone:</strong> <span><?php echo htmlspecialchars($data['phone']); ?></span></p>
        <p><strong>City:</strong> <span><?php echo htmlspecialchars($data['city']); ?></span></p>

        <div class="section-title">Wardrobe Details</div>

        <p><strong>Height:</strong> <span><?php echo htmlspecialchars($data['height']); ?> ft</span></p>
        <p><strong>Type:</strong> <span><?php echo htmlspecialchars($data['type']); ?></span></p>
        <p><strong>Finish:</strong> <span><?php echo htmlspecialchars($data['finish']); ?></span></p>
        <p><strong>Material:</strong> <span><?php echo htmlspecialchars($data['material']); ?></span></p>
        <p><strong>Accessories:</strong> <span><?php echo htmlspecialchars($data['accessories']) ?: "None"; ?></span></p>
        <p><strong>Requirement:</strong> <span><?php echo htmlspecialchars($data['require_time']); ?></span></p>

        <p><strong>Submitted On:</strong> <span><?php echo htmlspecialchars($data['created_at']); ?></span></p>
    </div>

    <div class="actions">
        <a href="index.php" class="home-btn">Back to Home</a>
    </div>

</div>

</body>
</html>

<?php $conn->close(); ?>