<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quote Submitted</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
  font-family: Arial, Helvetica, sans-serif;
  background:#f6f7fb;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}

.card{
  background:#fff;
  padding:30px;
  border-radius:14px;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
  width:360px;
  text-align:center;
}

.success{
  font-size:50px;
  color:#4CAF50;
}

h2{
  margin:10px 0;
}

.summary{
  text-align:left;
  margin-top:20px;
  background:#f9f9ff;
  padding:15px;
  border-radius:10px;
  line-height:1.6;
}

.btn{
  display:inline-block;
  margin-top:20px;
  padding:12px 20px;
  background:#6c63ff;
  color:#fff;
  text-decoration:none;
  border-radius:25px;
}
</style>
</head>
<body>

<div class="card">

<div class="success">✓</div>

<h2>Quote Submitted!</h2>
<p>Our design team will contact you soon.</p>

<div class="summary" id="summaryBox">
Loading design data...
</div>

<a href="index.php" class="btn">Back to Home</a>

</div>

<script>
const design = localStorage.getItem("selectedDesign");
const area = localStorage.getItem("selectedArea");
const price = localStorage.getItem("estimatedPrice");

const summaryBox = document.getElementById("summaryBox");

/* PRICE ANIMATION FUNCTION */
function animateValue(element, endValue){
  let start = 0;
  const duration = 600;
  const stepTime = 15;
  const increment = Math.ceil(endValue / (duration / stepTime));

  const timer = setInterval(() => {
    start += increment;
    if(start >= endValue){
      start = endValue;
      clearInterval(timer);
    }
    element.innerText = "₹" + start.toLocaleString();
  }, stepTime);
}

if(design){
  summaryBox.innerHTML = `
    <b>Selected Design:</b> ${design}<br><br>
    <b>Area:</b> ${area ? area + " sq ft" : "Not selected"}<br><br>
    <b>Estimated Price:</b> <span id="price">₹0</span>
  `;

  const priceElement = document.getElementById("price");
  animateValue(priceElement, parseInt(price || 0));

}else{
  summaryBox.innerHTML = "No design data found.";
}

/* CLEAR STORAGE */
localStorage.removeItem("selectedDesign");
localStorage.removeItem("selectedArea");
localStorage.removeItem("estimatedPrice");
</script>

</body>
</html>