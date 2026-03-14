<?php
include "db.php";

$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if(isset($_POST['update'])){

$email = $_POST['email'];
$role = $_POST['role'];

$conn->query("UPDATE users SET email='$email', role='$role' WHERE id=$id");

header("Location: admin.php?page=users");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#667eea,#764ba2);
}

/* FORM BOX */

.form-box{
background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
padding:40px;
width:420px;
border-radius:16px;
box-shadow:0 15px 35px rgba(0,0,0,0.25);
color:white;
animation:fadeIn .6s ease;
}

.form-box h2{
text-align:center;
margin-bottom:25px;
font-weight:600;
}

/* LABEL */

label{
font-size:14px;
opacity:.9;
}

/* INPUTS */

input,select{
width:100%;
padding:12px;
margin-top:6px;
margin-bottom:18px;
border:none;
border-radius:8px;
outline:none;
font-size:14px;
background:rgba(255,255,255,0.9);
transition:.3s;
}

input:focus,select:focus{
box-shadow:0 0 0 2px #fff;
}

/* BUTTON */

button{
width:100%;
padding:12px;
border:none;
border-radius:8px;
background:linear-gradient(45deg,#00c6ff,#0072ff);
color:white;
font-size:15px;
font-weight:600;
cursor:pointer;
transition:.3s;
}

button:hover{
transform:translateY(-2px);
box-shadow:0 8px 18px rgba(0,0,0,0.25);
}

/* BACK BUTTON */

.back{
display:inline-block;
margin-top:15px;
color:white;
text-decoration:none;
font-size:14px;
opacity:.8;
}

.back:hover{
opacity:1;
}

/* ANIMATION */

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(20px);
}
to{
opacity:1;
transform:translateY(0);
}
}

</style>

</head>

<body>

<div class="form-box">

<h2>Edit User</h2>

<form method="POST">

<label>Email</label>
<input type="email" name="email" value="<?php echo $user['email']; ?>" required>

<label>Role</label>
<select name="role">

<option value="user" <?php if($user['role']=='user') echo 'selected'; ?>>User</option>

<option value="admin" <?php if($user['role']=='admin') echo 'selected'; ?>>Admin</option>

</select>

<button type="submit" name="update">Update User</button>

</form>

<a class="back" href="admin.php?page=users">← Back to Users</a>

</div>

</body>
</html>