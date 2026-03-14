<?php
session_start();
require 'db.php';

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check admin login
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin'){
    header("Location: index.php");
    exit();
}

$pageSection = $_GET['page'] ?? 'dashboard';

/* ========= DELETE / APPROVE / REJECT QUOTES ========= */

if(isset($_GET['delete_quote']) && isset($_GET['type'])){

$id = intval($_GET['delete_quote']);
$type = strtolower($_GET['type']);

if($type == 'home'){
$conn->query("DELETE FROM homequote WHERE id=$id");
}

elseif($type == 'layout'){
$conn->query("DELETE FROM layoutquote WHERE id=$id");
}

elseif($type == 'wardrobe'){
$conn->query("DELETE FROM wardrobe_quotes WHERE id=$id");
}

elseif($type == 'get'){
$conn->query("DELETE FROM `get` WHERE id=$id");
}

header("Location: admin.php?page=quotes&success=1");
exit();
}



/* ========= APPROVE ========= */

if(isset($_GET['approve']) && isset($_GET['type'])){

$id = intval($_GET['approve']);
$type = strtolower($_GET['type']);

if($type == 'home'){
$conn->query("UPDATE homequote SET status='approved' WHERE id=$id");
}

elseif($type == 'layout'){
$conn->query("UPDATE layoutquote SET status='approved' WHERE id=$id");
}

elseif($type == 'wardrobe'){
$conn->query("UPDATE wardrobe_quotes SET status='approved' WHERE id=$id");
}

elseif($type == 'get'){
$conn->query("UPDATE `get` SET status='approved' WHERE id=$id");
}

header("Location: admin.php?page=quotes");
exit();
}



/* ========= REJECT ========= */

if(isset($_GET['reject']) && isset($_GET['type'])){

$id = intval($_GET['reject']);
$type = strtolower($_GET['type']);

if($type == 'home'){
$conn->query("UPDATE homequote SET status='rejected' WHERE id=$id");
}

elseif($type == 'layout'){
$conn->query("UPDATE layoutquote SET status='rejected' WHERE id=$id");
}

elseif($type == 'wardrobe'){
$conn->query("UPDATE wardrobe_quotes SET status='rejected' WHERE id=$id");
}

elseif($type == 'get'){
$conn->query("UPDATE `get` SET status='rejected' WHERE id=$id");
}

header("Location: admin.php?page=quotes");
exit();
}


/* ========= DELETE USER ========= */

if(isset($_GET['delete_user'])){
    
    $id = intval($_GET['delete_user']);
    $conn->query("DELETE FROM users WHERE id=$id");

    header("Location: admin.php?page=users&success=1");
    exit();
}


/* ========= DELETE MESSAGE ========= */

if(isset($_GET['delete_message'])){
    
    $id = intval($_GET['delete_message']);
    $conn->query("DELETE FROM contact_messages WHERE id=$id");

    header("Location: admin.php?page=messages&success=1");
    exit();
}
/* ========= COUNTS ========= */
$totalUsers = $conn->query("SELECT COUNT(*) as t FROM users")->fetch_assoc()['t'];
$totalMessages = $conn->query("SELECT COUNT(*) as t FROM contact_messages")->fetch_assoc()['t'];
$totalDesigns = $conn->query("SELECT COUNT(*) as total FROM user_designs")->fetch_assoc()['total'];

$totalQuotes = $conn->query("
SELECT 
    (SELECT COUNT(*) FROM homequote) +
    (SELECT COUNT(*) FROM layoutquote) +
    (SELECT COUNT(*) FROM wardrobe_quotes) +
    (SELECT COUNT(*) FROM `get`)
AS total
")->fetch_assoc()['total'];

/* ========= USERS SEARCH + PAGINATION ========= */
$limit = 5;
$currentPage = isset($_GET['p']) ? max(1,intval($_GET['p'])) : 1;
$offset = ($currentPage - 1) * $limit;

$search = "";
if(isset($_GET['search'])){
    $search = $conn->real_escape_string($_GET['search']);
    $users = $conn->query("SELECT * FROM users WHERE email LIKE '%$search%' LIMIT $offset, $limit");
}else{
    $users = $conn->query("SELECT * FROM users LIMIT $offset, $limit");
}

/* ========= DELETE DESIGN ========= */

if(isset($_GET['delete_design'])){

    $id = intval($_GET['delete_design']);

    $conn->query("DELETE FROM user_designs WHERE id=$id");

    header("Location: admin.php?page=designs&success=1");
    exit();
}

/* ========= DELETE USER ========= */

if(isset($_GET['delete_user'])){

    $id = intval($_GET['delete_user']);

    $conn->query("DELETE FROM users WHERE id=$id");

    header("Location: admin.php?page=users&success=1");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
<title>Professional Admin</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
/* =====================
   RESET
===================== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f1f5f9;
    color:#1e293b;
    display:flex;
    min-height:100vh;
    transition:all 0.3s ease;
}


/* Smooth transitions */
.sidebar,
.card,
.highlight-stats .stat,
.menu a,
.header-btn,
.header-link,
.logout-btn{
    transition:all 0.3s ease;
}

/* =====================
   SIDEBAR
===================== */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#0f172a,#1e293b);
    color:white;
    padding:25px 20px;
    display:flex;
    flex-direction:column;
    position:fixed;
    height:100vh;
    left:0;
    top:0;
    z-index:1000;
}

/* Profile */
.profile{
    text-align:center;
    margin-bottom:30px;
}

.profile-img{
    position:relative;
    width:90px;
    height:90px;
    margin:0 auto 15px;
}

.profile-img img{
    width:100%;
    height:100%;
    border-radius:50%;
    border:3px solid #3b82f6;
}

.online{
    position:absolute;
    bottom:6px;
    right:6px;
    width:14px;
    height:14px;
    background:#22c55e;
    border-radius:50%;
    border:2px solid #0f172a;
}

.profile h3{
    font-size:18px;
}

.profile p{
    font-size:13px;
    color:#94a3b8;
}

/* MENU */
.menu{
    display:flex;
    flex-direction:column;
    gap:22px;
    margin-bottom:20px;
    margin-top:40px;
}

.menu a{
    padding:14px 16px;
    border-radius:10px;
    color:#cbd5e1;
    text-decoration:none;
    transition:0.3s ease;
}

.menu a:hover,
.menu a.active{
    background:#3b82f6;
    color:white;
}

/* SIDEBAR CONTROLS */
.sidebar-controls{
    margin-top:10px;
    display:flex;
    flex-direction:column;
    gap:10px;
}

.control-btn{
    padding:10px;
    border:none;
    border-radius:8px;
    background:#334155;
    color:white;
    cursor:pointer;
}

.control-btn:hover{
    background:#3b82f6;
}

.notification-box{
    position:relative;
    background:#334155;
    padding:10px;
    border-radius:8px;
}

.notification-box .badge{
    position:absolute;
    top:-5px;
    right:-5px;
    background:red;
    font-size:12px;
    padding:2px 6px;
    border-radius:50%;
}

.control-link{
    text-decoration:none;
    padding:10px;
    border-radius:8px;
    background:#1e293b;
    color:#cbd5e1;
}

.control-link:hover{
    background:#3b82f6;
    color:white;
}

.logout{
    margin-top:auto;
    background:#ef4444;
    padding:12px;
    text-align:center;
    border-radius:8px;
    color:white;
    text-decoration:none;
}

.logout:hover{
    background:#dc2626;
}

/* =====================
   MAIN CONTENT
===================== */
.main{
    margin-left:260px;
    width:100%;
    padding:25px;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:white;
    padding:15px 25px;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
    margin-bottom:25px;
}

.header-right{
    display:flex;
    align-items:center;
    gap:18px;
}

/* Header Buttons */
.header-btn{
background:#3498db;
color:white;
padding:8px 14px;
border-radius:6px;
text-decoration:none;
border:none;
cursor:pointer;
font-size:14px;
margin-right:10px;
transition:0.3s;
}

.header-btn:hover{
background:#2980b9;
}

.logout-btn{
background:#e74c3c;
color:white;
padding:8px 14px;
border-radius:6px;
text-decoration:none;
font-size:14px;
transition:0.3s;
}

.logout-btn:hover{
background:#c0392b;
}
/* HEADER LEFT */
.header-left{
display:flex;
align-items:center;
gap:12px;
}

/* MENU BUTTON DEFAULT = HIDDEN (DESKTOP) */
#menuToggle{
display:none;
font-size:20px;
padding:8px 14px;
border:none;
border-radius:6px;
background:#3b82f6;
color:white;
cursor:pointer;
}

/* TITLE */
.header-left h2{
font-size:22px;
font-weight:600;
color:#0f172a;
}


/* =========================
   MOBILE & TABLET
========================= */
@media (max-width:992px){

#menuToggle{
display:block;   /* SHOW ONLY MOBILE */
}

.header-left h2{
font-size:18px;
}

}

/* Notification */
.notification{
    position:relative;
    font-size:18px;
    cursor:pointer;
}

.notification .badge{
    position:absolute;
    top:-6px;
    right:-8px;
    background:red;
    color:white;
    font-size:11px;
    padding:2px 6px;
    border-radius:50%;
}

/* Header Links */
.header-link{
    background:#f1f5f9;
    padding:8px 12px;
    border-radius:8px;
    text-decoration:none;
    font-size:16px;
}

.header-link:hover{
    background:#3b82f6;
    color:white;
}

.logout-btn{
    background:#ef4444;
    padding:8px 12px;
    border-radius:8px;
    color:white;
    text-decoration:none;
}

.logout-btn:hover{
    background:#dc2626;
}

/* =====================
   HIGHLIGHTED STATS
===================== */
.highlight-stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
    margin-bottom:40px;
}

.highlight-stats .stat{
    background:linear-gradient(135deg,#3b82f6,#6366f1);
    color:white;
    padding:30px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 10px 25px rgba(59,130,246,0.3);
    position:relative;
    overflow:hidden;
}

.highlight-stats .stat:hover{
    transform:translateY(-8px) scale(1.03);
    box-shadow:0 15px 35px rgba(99,102,241,0.5);
}

.highlight-stats .stat h3{
    font-size:34px;
    font-weight:700;
    margin-bottom:10px;
}

.highlight-stats .stat p{
    font-size:15px;
    opacity:0.9;
}

/* Shine Animation */
.highlight-stats .stat::before{
    content:"";
    position:absolute;
    top:-50%;
    left:-50%;
    width:200%;
    height:200%;
    background:linear-gradient(120deg,rgba(255,255,255,0.15) 0%,rgba(255,255,255,0) 60%);
    transform:rotate(25deg);
}

.highlight-stats .stat:hover::before{
    animation:shine 1.5s ease-in-out;
}

@keyframes shine{
    0%{transform:translateX(-100%) rotate(25deg);}
    100%{transform:translateX(100%) rotate(25deg);}
}

.stat-icon{
    font-size:30px;
    margin-bottom:12px;
    opacity:0.9;
}

.stat-extra{
    display:block;
    margin-top:10px;
    font-size:13px;
    opacity:0.85;
    background:rgba(255,255,255,0.15);
    padding:6px 10px;
    border-radius:20px;
}

/* ===============================
   CARD CONTAINER
================================ */
.card{
    background:white;
    padding:25px;
    border-radius:16px;
    margin-bottom:35px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
    transition:0.3s ease;
    overflow-x:auto;
}

.card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 30px rgba(0,0,0,0.08);
}

.card h3{
    margin-bottom:20px;
    font-size:20px;
    font-weight:600;
    color:#0f172a;
}


/* ===============================
   SEARCH FORM
================================ */
form{
    margin-bottom:20px;
    display:flex;
    gap:10px;
}

form input{
    padding:10px 14px;
    border-radius:8px;
    border:1px solid #cbd5e1;
    outline:none;
    width:250px;
    transition:0.3s;
}

form input:focus{
    border-color:#3b82f6;
    box-shadow:0 0 0 2px rgba(59,130,246,0.2);
}

form button{
    padding:10px 18px;
    border:none;
    border-radius:8px;
    background:#3b82f6;
    color:white;
    cursor:pointer;
    transition:0.3s;
}

form button:hover{
    background:#2563eb;
}

/* ===============================
   TABLE DESIGN
================================ */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:0;
    min-width:700px;
}

table thead{
    background:linear-gradient(135deg,#3b82f6,#6366f1);
}

table th{
    padding:14px 16px;
    text-align:left;
    font-size:13px;
    font-weight:700;
    letter-spacing:0.8px;
    color:white;
    text-transform:uppercase;
    position:relative;
    background-color: #5ba1fe;
}



/* Rounded header corners */
table th:first-child{
    border-top-left-radius:12px;
}
table th:last-child{
    border-top-right-radius:12px;
}

table td{
    padding:14px 16px;
    font-size:14px;
    border-bottom:1px solid #286eca;
    vertical-align:middle;
}

/* Zebra rows */
table tbody tr:nth-child(even){
    background:#f8fafc;
}

/* ===============================
   STATUS BADGES
================================ */
.status{
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:500;
    text-transform:capitalize;
}

/* Status colors */
.status.pending{
    background:#fef3c7;
    color:#92400e;
}

.status.approved{
    background:#dcfce7;
    color:#166534;
}

.status.rejected{
    background:#fee2e2;
    color:#991b1b;
}

/* ===============================
   TYPE BADGES (Quotes)
================================ */
.type-badge{
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:500;
}

.type-badge.home{
    background:#dbeafe;
    color:#1e40af;
}

.type-badge.layout{
    background:#ede9fe;
    color:#5b21b6;
}

.type-badge.wardrobe{
    background:#dcfce7;
    color:#166534;
}

/* ===============================
   ACTION BUTTONS
================================ */
.edit,
.delete,
.approve,
.reject{
    padding:6px 12px;
    border-radius:6px;
    font-size:13px;
    text-decoration:none;
    color:white;
    margin:2px;
    display:inline-block;
    transition:0.3s;
}

/* Edit */
.edit{
    background:#3b82f6;
}
.edit:hover{
    background:#2563eb;
}

/* Delete */
.delete{
    background:#ef4444;
}
.delete:hover{
    background:#dc2626;
}

/* Approve */
.approve{
    background:#22c55e;
}
.approve:hover{
    background:#16a34a;
}

/* Reject */
.reject{
    background:#f59e0b;
}
.reject:hover{
    background:#d97706;
}

/* ===============================
   PAGINATION
================================ */
.pagination{
    margin-top:20px;
}

.pagination a{
    padding:8px 14px;
    background:#3b82f6;
    color:white;
    border-radius:6px;
    text-decoration:none;
    margin-right:6px;
    transition:0.3s;
}

.pagination a:hover{
    background:#2563eb;
}

/* ===============================
   MESSAGE COLUMN FIX
================================ */
table td:nth-child(3){
    max-width:350px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

/* FIXED FOOTER - SAME AS SIDEBAR */
.footer{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    padding:15px;
    text-align:center;
    color:#cbd5e1;
    background:linear-gradient(180deg,#0f172a,#1e293b); /* same as sidebar */
    border-top:1px solid rgba(255,255,255,0.05);
    z-index:999;
}


/* DARK MODE STYLES */

body.dark{
    background:#0f172a;
    color:#e2e8f0;
}

body.dark .main{
    background:#1e293b;
}

body.dark .sidebar{
    background:#0f172a;
}

body.dark table{
    background:#1e293b;
    color:#e2e8f0;
}

body.dark table th{
    background:#334155;
    color:white;
}

body.dark table td{
    border-color:#334155;
}

/* ===============================
   RESPONSIVE SIDEBAR SYSTEM
================================ */

/* TABLET */
@media (max-width:1024px){

.sidebar{
width:230px;
}

.main{
margin-left:230px;
}

.highlight-stats{
grid-template-columns:repeat(2,1fr);
}

}


/* ===============================
   MOBILE MENU SYSTEM
================================ */

@media (max-width:768px){

/* SIDEBAR HIDDEN */
.sidebar{
position:fixed;
left:-260px;
top:0;
width:260px;
height:100%;
z-index:2000;
transition:0.35s ease;
}

/* SIDEBAR OPEN */
.sidebar.active{
left:0;
}

/* MAIN FULL WIDTH */
.main{
margin-left:0;
padding:18px;
}

/* HEADER FIX */
.header{
flex-direction:row;
justify-content:space-between;
align-items:center;
}

/* HEADER RIGHT */
.header-right{
gap:10px;
flex-wrap:wrap;
}

/* SHOW MENU BUTTON */
#menuToggle{
display:block;
}

/* STATS */
.highlight-stats{
grid-template-columns:1fr;
}

/* TABLE SCROLL */
table{
display:block;
overflow-x:auto;
white-space:nowrap;
}

/* SEARCH FORM */
form{
flex-direction:column;
}

form input{
width:100%;
}

form button{
width:100%;
}

/* PROFILE IMAGE */
.profile-img{
width:70px;
height:70px;
}

/* MENU */
.menu{
gap:15px;
}

.menu a{
padding:12px;
font-size:14px;
}

}


/* ===============================
   SMALL MOBILE
================================ */

@media (max-width:480px){

.header{
padding:12px;
}

.header-left h2{
font-size:17px;
}

.header-btn,
.logout-btn{
padding:6px 10px;
font-size:12px;
}

.highlight-stats .stat{
padding:18px;
}

.highlight-stats .stat h3{
font-size:24px;
}

table th,
table td{
font-size:12px;
padding:8px;
}

}
</style>


</head>
<body>


<div class="sidebar">

    <!-- PROFILE SECTION -->
<div class="profile">
    <div class="profile-img">
        <img src="https://i.pravatar.cc/100" alt="Admin">
        <span class="online"></span>
    </div>

    <h3><?php echo htmlspecialchars($_SESSION['user']['name'] ?? 'Admin'); ?></h3>
    <p>Administrator</p>
</div>

    <!-- MENU -->
<div class="menu">
    <a href="admin.php?page=dashboard" class="<?php if(!isset($_GET['page']) || $_GET['page']=='dashboard') echo 'active'; ?>">🏠 Dashboard</a>
    <a href="admin.php?page=users" class="<?php if(isset($_GET['page']) && $_GET['page']=='users') echo 'active'; ?>">👤 Users</a>
    <a href="admin.php?page=messages" class="<?php if(isset($_GET['page']) && $_GET['page']=='messages') echo 'active'; ?>">💬 Messages</a>
    <a href="admin.php?page=quotes" class="<?php if(isset($_GET['page']) && $_GET['page']=='quotes') echo 'active'; ?>">📄 Quotes</a>
    <a href="admin.php?page=designs" class="<?php if(isset($_GET['page']) && $_GET['page']=='designs') echo 'active'; ?>">🛋 Designs</a> 
</div>

</div>


<div class="main">
   <div class="header">
    
    <!-- LEFT -->
    <div class="header-left">
<button id="menuToggle" class="header-btn">☰</button>
<h2>Dashboard</h2>
</div>

   <!-- RIGHT -->
<div class="header-right">

    <!-- Dark Mode -->
    <button id="darkToggle" class="header-btn">🌙</button>

    <!-- Settings -->
    <a href="adminsettings.php" class="header-btn">⚙ Settings</a>

    <!-- Logout -->
    <a href="logout.php" class="logout-btn">🚪 Logout</a>

</div>

</div>


<!-- STATS -->
<?php if($pageSection == 'dashboard'){ ?>

<!-- STATS -->
<div class="stats highlight-stats">

    <!-- USERS -->
    <div class="stat">
        <div class="stat-icon">👤</div>
        <h3><?php echo $totalUsers; ?></h3>
        <p>Total Users</p>
        <span class="stat-extra">+12% this month</span>
    </div>

    <!-- MESSAGES -->
    <div class="stat">
        <div class="stat-icon">💬</div>
        <h3><?php echo $totalMessages; ?></h3>
        <p>Total Messages</p>
        <span class="stat-extra">+8 new today</span>
    </div>

    <!-- QUOTES -->
    <div class="stat">
        <div class="stat-icon">📄</div>
        <h3><?php echo $totalQuotes; ?></h3>
        <p>Total Quotes</p>
        <span class="stat-extra">Pending approvals</span>
    </div>

    <!-- DESIGNS -->
    <div class="stat">
        <div class="stat-icon">🛋</div>
        <h3><?php echo $totalDesigns; ?></h3>
        <p>Total Designs</p>
        <span class="stat-extra">User selections</span>
    </div>

</div>


<!-- RECENT MESSAGES -->
<!-- RECENT MESSAGES -->
<div class="card" style="margin-top:30px;">

<h3>Recent Messages</h3>

<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Date</th>
</tr>

<?php

$recentMessages = $conn->query("
SELECT full_name, email, message, created_at 
FROM contact_messages 
ORDER BY id DESC 
LIMIT 5
");

while($msg = $recentMessages->fetch_assoc()){
?>

<tr>

<td><?php echo htmlspecialchars($msg['full_name']); ?></td>

<td><?php echo htmlspecialchars($msg['email']); ?></td>

<td>
<?php echo substr(htmlspecialchars($msg['message']),0,50); ?>...
</td>

<td>
<?php echo date("d M Y", strtotime($msg['created_at'])); ?>
</td>

</tr>

<?php } ?>

</table>

</div>

<?php } ?>




<!-- USERS -->
 <?php if($pageSection == 'users'){ ?>
<div class="card">
<h3>Manage Users</h3>

<form method="GET">
<input type="text" name="search" placeholder="Search email...">
<button type="submit">Search</button>
</form>

<table>
<tr>
<th>ID</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>
</tr>
<?php while($u=$users->fetch_assoc()){ ?>
<tr>
<td><?php echo $u['id']; ?></td>
<td><?php echo htmlspecialchars($u['email']); ?></td>
<td><?php echo $u['role']; ?></td>
<td>
<a class="edit" href="edit_user.php?id=<?php echo $u['id']; ?>">Edit</a>
<a class="delete" 
href="admin.php?page=users&delete_user=<?php echo $u['id']; ?>" 
onclick="return confirm('Are you sure you want to delete this user?');">
Delete
</a>
</td>
</tr>
<?php } ?>
</table>

<div class="pagination">
<a href="?page=users&p=<?php echo $currentPage-1; ?>">Prev</a>
<a href="?page=users&p=<?php echo $currentPage+1; ?>">Next</a>
</div>
</div>
<?php } ?>



<!-- MESSAGES -->
<?php if($pageSection == 'messages'){ ?>
<div class="card">
<h3>Messages</h3>
<table>
<tr>
<th>ID</th>
<th>Email</th>
<th>Message</th>
<th>Action</th>
</tr>
<?php
$msg = $conn->query("SELECT * FROM contact_messages ORDER BY id DESC");
while($m=$msg->fetch_assoc()){
?>
<tr>
<td><?php echo $m['id']; ?></td>
<td><?php echo htmlspecialchars($m['email']); ?></td>
<td><?php echo htmlspecialchars($m['message']); ?></td>
<td>
<a class="delete" href="admin.php?page=messages&delete_message=<?php echo $m['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>
</div>
<?php } ?>


<!-- QUOTES SECTION -->
<?php if($pageSection == 'quotes'){ ?>

<div class="card">
<h3>Quotes</h3>

<table>
<tr>
<th>ID</th>
<th>User</th>
<th>Name</th>
<th>Type</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$query = "

SELECT h.id, u1.fullname AS username, h.name, h.status, 'Home' AS type
FROM homequote h
LEFT JOIN users u1 ON h.user_id = u1.id

UNION ALL

SELECT l.id, u2.fullname AS username, l.name, l.status, 'Layout' AS type
FROM layoutquote l
LEFT JOIN users u2 ON l.user_id = u2.id

UNION ALL

SELECT w.id, u3.fullname AS username, w.name, 
IFNULL(w.status,'Pending') AS status, 'Wardrobe' AS type
FROM wardrobe_quotes w
LEFT JOIN users u3 ON w.user_id = u3.id

UNION ALL

SELECT g.id, u4.fullname AS username, g.name, g.status, 'Get' AS type
FROM `get` g
LEFT JOIN users u4 ON g.user_id = u4.id

ORDER BY id DESC
";

$q = $conn->query($query);

while($row = $q->fetch_assoc()){ 

$status = strtolower(trim($row['status']));

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<?php 
echo !empty($row['username']) 
? htmlspecialchars($row['username']) 
: "Guest";
?>
</td>

<td><?php echo htmlspecialchars($row['name']); ?></td>

<td>
<span class="type-badge <?php echo strtolower($row['type']); ?>">
<?php echo htmlspecialchars($row['type']); ?>
</span>
</td>

<td>
<span class="status <?php echo $status; ?>">
<?php echo htmlspecialchars($row['status']); ?>
</span>
</td>

<td>

<a class="approve"
href="admin.php?page=quotes&approve=<?php echo $row['id']; ?>&type=<?php echo strtolower($row['type']); ?>">
Approve
</a>

<a class="reject"
href="admin.php?page=quotes&reject=<?php echo $row['id']; ?>&type=<?php echo strtolower($row['type']); ?>">
Reject
</a>

<a class="delete"
onclick="return confirm('Delete this quote?')"
href="admin.php?page=quotes&delete_quote=<?php echo $row['id']; ?>&type=<?php echo strtolower($row['type']); ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>
</div>

<?php } ?>


<!-- DESIGNS -->
 <?php if($pageSection == 'designs'){ ?>

<div class="card">
<h3>User Selected Designs</h3>

<table>
<tr>
<th>ID</th>
<th>User</th>
<th>Package</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php

$d = $conn->query("
SELECT d.id, d.package_name, d.price, u.email 
FROM user_designs d
LEFT JOIN users u ON d.user_id = u.id
ORDER BY d.id DESC
");

while($row = $d->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<?php 
if(!empty($row['email'])){
    echo htmlspecialchars($row['email']);
}else{
    echo "Unknown";
}
?>
</td>

<td><?php echo htmlspecialchars($row['package_name']); ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td>
<a class="delete"
href="admin.php?page=designs&delete_design=<?php echo $row['id']; ?>">
Delete
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

<?php } ?>




<div class="footer">
    © <?php echo date("Y"); ?> <span>BestInterior Admin</span> | 
    Designed with ❤️ | All Rights Reserved
</div>
</div>

<script>

/* =========================
   SIDEBAR TOGGLE (MOBILE)
========================= */
const menuToggle = document.getElementById("menuToggle");
const sidebar = document.querySelector(".sidebar");

menuToggle.addEventListener("click", function(){
    sidebar.classList.toggle("active");
});

/* Close sidebar when clicking outside */
document.addEventListener("click", function(e){

    if(window.innerWidth <= 768){

        if(!sidebar.contains(e.target) && !menuToggle.contains(e.target)){
            sidebar.classList.remove("active");
        }

    }

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.getElementById("darkToggle");

    if(toggle){
        toggle.addEventListener("click", function () {

            document.body.classList.toggle("dark");

            // Change icon
            if(document.body.classList.contains("dark")){
                toggle.textContent = "☀️";
            } else {
                toggle.textContent = "🌙";
            }

        });
    }

});
</script>

</body>
</html>