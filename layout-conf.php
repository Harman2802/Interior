<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Quote Submitted</title>

<style>

body{
font-family:Segoe UI;
background:#f5f6fa;
margin:0;
display:flex;
align-items:center;
justify-content:center;
height:100vh;
}

.card{
background:white;
padding:40px;
border-radius:14px;
width:500px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
text-align:center;
}

.success{
font-size:60px;
color:#4CAF50;
margin-bottom:10px;
}

h2{
margin-bottom:10px;
}

.info{
text-align:left;
margin-top:25px;
background:#fafafa;
padding:20px;
border-radius:10px;
}

.info p{
margin:8px 0;
font-size:15px;
}

.label{
font-weight:600;
color:#333;
}

.btn{
display:inline-block;
margin-top:25px;
padding:12px 30px;
background:#f4a23a;
color:white;
border-radius:30px;
text-decoration:none;
font-weight:600;
}

</style>
</head>

<body>

<div class="card">

<div class="success">✔</div>

<h2>Your Quote Request Submitted</h2>

<p>Our designer will contact you shortly.</p>

<div class="info">

<p><span class="label">Layout:</span> <span id="layout"></span></p>

<p><span class="label">Package:</span> <span id="package"></span></p>

<p><span class="label">City:</span> <span id="city"></span></p>

<p><span class="label">Measurements:</span> <span id="measurements"></span></p>

</div>

<a href="index.php" class="btn">Back to Home</a>

</div>

<script>

/* GET DATA FROM LOCALSTORAGE */

let layout = localStorage.getItem("selectedLayout") || "Not selected";
let pkg = localStorage.getItem("selectedPackage") || "No package selected";
let city = localStorage.getItem("selectedCity") || "";

/* SHOW DATA */

document.getElementById("layout").innerText = layout;
document.getElementById("package").innerText = pkg;
document.getElementById("city").innerText = city;

/* MEASUREMENTS */

let a = localStorage.getItem("measurement_a") || "";
let b = localStorage.getItem("measurement_b") || "";
let c = localStorage.getItem("measurement_c") || "";

let text = "";

if(a) text += "A: " + a + " ft ";
if(b) text += " | B: " + b + " ft ";
if(c) text += " | C: " + c + " ft ";

document.getElementById("measurements").innerText = text || "Standard Size";

</script>

</body>
</html>