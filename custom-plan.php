<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Request Custom Interior Plan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
font-family: Arial, sans-serif;
background:#f4f4f4;
margin:0;
padding:0;
}

.form-section{
padding:60px 20px;
display:flex;
justify-content:center;
}

.form-box{
background:white;
padding:40px;
width:600px;
border-radius:10px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.form-box h2{
text-align:center;
margin-bottom:25px;
}

.form-box input,
.form-box textarea,
.form-box select{
width:100%;
padding:12px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:6px;
font-size:15px;
}

.form-box textarea{
height:120px;
resize:none;
}

.form-box button{
width:100%;
padding:14px;
background:#c89b3c;
border:none;
color:white;
font-size:16px;
border-radius:6px;
cursor:pointer;
}

.form-box button:hover{
background:#a67c2e;
}

.back-btn{
display:inline-block;
margin-bottom:15px;
text-decoration:none;
color:#333;
font-weight:bold;
}

</style>
</head>

<body>

<section class="form-section">

<div class="form-box">

<a href="index.php" class="back-btn">← Back</a>

<h2>Request Custom Interior Plan</h2>

<form action="submit-custom.php" method="POST">

<input type="text" name="name" placeholder="Your Name" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="tel" name="phone" placeholder="Phone Number" required>

<select name="service">
<option value="">Select Service</option>
<option>Kitchen Upgrade</option>
<option>Wardrobe Design</option>
<option>Storage Upgrade</option>
<option>Lighting Improvement</option>
<option>Full Room Renovation</option>
</select>

<textarea name="details" placeholder="Describe your requirement..."></textarea>

<button type="submit">Submit Request</button>

</form>

</div>
</section>

</body>
</html>