<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];
$result = mysqli_query($conn,"SELECT * FROM quotes WHERE user_id='$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Quotes</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:#f4f6fb;
}

.header{
    height:60px;
    background:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 25px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.container{
    padding:30px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
    margin-bottom:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.status{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.pending{ background:#fff3cd; color:#856404; }
.approved{ background:#d4edda; color:#155724; }
.rejected{ background:#f8d7da; color:#721c24; }

.back{
    text-decoration:none;
    color:white;
    background:#667eea;
    padding:8px 15px;
    border-radius:8px;
}
</style>
</head>

<body>

<div class="header">
    <h3>My Saved Quotes</h3>
    <a class="back" href="main.php">← Back to Dashboard</a>
</div>

<div class="container">

<?php
if(mysqli_num_rows($result)==0){
    echo "<p>No quotes found.</p>";
}else{
    while($row = mysqli_fetch_assoc($result)){
        $status = strtolower($row['status']);
        echo "
        <div class='card'>
            <div>
                <strong>{$row['design']}</strong><br>
                Area: {$row['area']}<br>
                City: {$row['city']}<br>
                Date: {$row['created_at']}
            </div>
            <span class='status $status'>{$row['status']}</span>
        </div>
        ";
    }
}
?>

</div>
</body>
</html>