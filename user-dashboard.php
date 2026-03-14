<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

/* DELETE QUOTE (SECURE) */
if(isset($_GET['delete']) && isset($_GET['table'])){
    
    $table = $_GET['table'];
    $id = (int)$_GET['delete'];

    $allowedTables = ['homequote','layoutquote','wardrobe_quotes','get'];

    if(in_array($table,$allowedTables)){

        $stmt = $conn->prepare("DELETE FROM `$table` WHERE id=? AND user_id=?");
        $stmt->bind_param("ii",$id,$user_id);
        $stmt->execute();
        $stmt->close();

        header("Location: user-dashboard.php");
        exit;
    }
}


/* QUOTE TABLES */
$quoteTables = [
    "homequote",
    "layoutquote",
    "wardrobe_quotes",
    "get"
];

$allQuotes = [];


/* FETCH USER QUOTES ONLY */
foreach($quoteTables as $table){

    $tableExists = $conn->query("SHOW TABLES LIKE '$table'");

    if($tableExists && $tableExists->num_rows > 0){

        $columns = $conn->query("SHOW COLUMNS FROM `$table` LIKE 'created_at'");

        if($columns && $columns->num_rows > 0){

            $stmt = $conn->prepare("SELECT * FROM `$table` WHERE user_id=? ORDER BY created_at DESC");

        }else{

            $stmt = $conn->prepare("SELECT * FROM `$table` WHERE user_id=?");

        }

        $stmt->bind_param("i",$user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){

            $row['table_name'] = $table;
            $allQuotes[] = $row;

        }

        $stmt->close();
    }
}


/* SORT ALL QUOTES BY DATE */
usort($allQuotes,function($a,$b){

    return strtotime($b['created_at'] ?? 0) - strtotime($a['created_at'] ?? 0);

});
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard | BestArt</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Roboto',sans-serif;
}

body{
background:linear-gradient(135deg,#f5f7fa,#c3cfe2);
min-height:100vh;
color:#333;
}

.header{
background:linear-gradient(135deg,#ff758c,#ff7eb3);
color:white;
font-size:26px;
font-weight:700;
padding:25px;
text-align:center;
box-shadow:0 8px 25px rgba(0,0,0,0.1);
position:relative;
border-bottom-left-radius:20px;
border-bottom-right-radius:20px;
}

.back-btn{
position:absolute;
left:20px;
top:50%;
transform:translateY(-50%);
background:white;
color:#ff4b5c;
border:none;
padding:10px 18px;
border-radius:10px;
cursor:pointer;
font-weight:600;
box-shadow:0 4px 10px rgba(0,0,0,0.15);
transition:.3s;
}

.back-btn:hover{
transform:translateY(-50%) scale(1.05);
}

.wrapper{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
gap:25px;
padding:40px;
max-width:1300px;
margin:auto;
}

.quote-card{
background:rgba(255,255,255,0.8);
backdrop-filter:blur(10px);
border-radius:20px;
padding:25px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
transition:.3s;
position:relative;
}

.quote-card:hover{
transform:translateY(-8px);
box-shadow:0 25px 50px rgba(0,0,0,0.15);
}

.quote-card h3{
color:#ff4b5c;
margin-bottom:10px;
font-size:20px;
text-transform:uppercase;
}

.quote-card p{
font-size:14px;
margin-bottom:8px;
}

.quote-card strong{
color:#222;
}

.status{
display:inline-block;
padding:5px 12px;
border-radius:20px;
font-size:12px;
font-weight:600;
margin-bottom:12px;
}

.pending{
background:#fff3cd;
color:#856404;
}

.approved{
background:#d4edda;
color:#155724;
}

.rejected{
background:#f8d7da;
color:#721c24;
}

.source{
position:absolute;
bottom:12px;
right:15px;
font-size:11px;
color:#777;
font-style:italic;
}

.delete-btn{
position:absolute;
top:12px;
right:12px;
background:#ff4b5c;
color:white;
border:none;
padding:5px 10px;
border-radius:8px;
cursor:pointer;
font-size:12px;
font-weight:600;
transition:.3s;
text-decoration:none;
}

.delete-btn:hover{
background:#e03a4f;
}

.center{
text-align:center;
grid-column:1/-1;
padding:80px;
font-size:18px;
color:#555;
}

@media(max-width:768px){
.header{font-size:22px;}
}

</style>
</head>
<body>

<div class="header">
<button class="back-btn" onclick="window.location.href='index.php'">← Back</button>
Your Quotes
</div>

<div class="wrapper">

<?php if(!empty($allQuotes)): ?>

<?php foreach($allQuotes as $quote): ?>

<div class="quote-card">

<h3>

<?php

switch($quote['table_name']){

case 'homequote':
echo "Home Quote";
break;

case 'layoutquote':
echo "Layout Quote";
break;

case 'wardrobe_quotes':
echo "Wardrobe Quote";
break;

case 'get':
echo "Get Quote";
break;

default:
echo "Quote";

}

?>

</h3>

<?php
$status = $quote['status'] ?? 'pending';
?>

<span class="status <?= strtolower($status) ?>">
<?= ucfirst($status) ?>
</span>

<a href="user-dashboard.php?delete=<?= $quote['id'] ?>&table=<?= $quote['table_name'] ?>"
class="delete-btn"
onclick="return confirm('Delete this quote?')">
Delete
</a>

<p><strong>Name:</strong> <?= htmlspecialchars($quote['name'] ?? '-') ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($quote['email'] ?? '-') ?></p>
<p><strong>Phone:</strong> <?= htmlspecialchars($quote['phone'] ?? '-') ?></p>

<?php if(!empty($quote['city'])): ?>
<p><strong>City:</strong> <?= htmlspecialchars($quote['city']) ?></p>
<?php endif; ?>

<!-- HOME QUOTE -->
<?php if($quote['table_name']=='homequote'): ?>

<p><strong>BHK:</strong> <?= htmlspecialchars($quote['bhk'] ?? '-') ?></p>
<p><strong>Size:</strong> <?= htmlspecialchars($quote['size'] ?? '-') ?></p>
<p><strong>Package:</strong> <?= htmlspecialchars($quote['package'] ?? '-') ?></p>

<?php endif; ?>


<!-- LAYOUT -->
<?php if($quote['table_name']=='layoutquote'): ?>

<p><strong>Layout:</strong> <?= htmlspecialchars($quote['layout'] ?? '-') ?></p>
<p><strong>Package:</strong> <?= htmlspecialchars($quote['package'] ?? '-') ?></p>

<?php endif; ?>


<!-- WARDROBE -->
<?php if($quote['table_name']=='wardrobe_quotes'): ?>

<p><strong>Height:</strong> <?= htmlspecialchars($quote['height'] ?? '-') ?></p>
<p><strong>Type:</strong> <?= htmlspecialchars($quote['type'] ?? '-') ?></p>
<p><strong>Finish:</strong> <?= htmlspecialchars($quote['finish'] ?? '-') ?></p>

<?php endif; ?>


<!-- GET QUOTE -->
<?php if($quote['table_name']=='get'): ?>

<p><strong>Selected Design:</strong> <?= htmlspecialchars($quote['selected_design'] ?? '-') ?></p>

<?php endif; ?>


<p class="source">

Source: <?= $quote['table_name'] ?> |
<?= $quote['created_at'] ?? 'N/A' ?>

</p>

</div>

<?php endforeach; ?>

<?php else: ?>

<p class="center">No quotes found yet.</p>

<?php endif; ?>

</div>

</body>
</html>