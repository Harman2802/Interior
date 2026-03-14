<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt | Package Details</title>
<style>
/* RESET & BODY */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #e0f7e9, #f4f6f8);
    padding: 40px 20px;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* CONTAINER */
.container {
    max-width: 600px;
    width: 100%;
    background: #fff;
    padding: 40px 30px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

/* HEADER */
h2 {
    color: #00c853;
    font-size: 2rem;
    margin-bottom: 20px;
    position: relative;
}

h2::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: #00e676;
    margin: 10px auto 0;
    border-radius: 2px;
}

/* PACKAGE PRICE */
.price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #111;
    margin: 15px 0 25px;
}

/* DESCRIPTION */
p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
}

/* BUTTON */
.button {
    display: inline-block;
    padding: 15px 35px;
    background: linear-gradient(135deg, #00c853, #00e676);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    text-decoration: none;
    margin-top: 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 6px 20px rgba(0,200,83,0.3);
}

.button:hover {
    background: linear-gradient(135deg, #00e676, #00c853);
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0,200,83,0.4);
}

/* BUTTON SHIMMER EFFECT */
.button::after {
    content: '';
    position: absolute;
    top: 0; left: -75%;
    width: 50%;
    height: 100%;
    background: rgba(255,255,255,0.25);
    transform: skewX(-25deg);
    transition: all 0.5s;
}

.button:hover::after {
    left: 125%;
}

/* RESPONSIVE */
@media(max-width:600px){
    .container{
        padding: 30px 20px;
    }
    h2{
        font-size:1.75rem;
    }
    .button{
        padding: 12px 28px;
        font-size: 0.95rem;
    }
}
</style>
</head>
<body>

<div class="container">
    <h2 id="package-name">Package Name</h2>
    <p class="price">₹<span id="package-price"></span></p>
    <p>Thank you for selecting your interior design package. Our team will contact you soon for the next steps. Stay tuned for an amazing transformation of your home!</p>
    <a href="index.php" class="button">Back to Home</a>
</div>

<script>

const name = localStorage.getItem("selectedPackage");
const price = localStorage.getItem("selectedPrice");

if(!name || !price){
    alert("No package selected!");
    window.location.href="index.php";
}

document.getElementById("package-name").textContent = name;
document.getElementById("package-price").textContent = price;

/* SAVE TO DATABASE */

fetch("save_design.php",{
method:"POST",
headers:{
"Content-Type":"application/json"
},
body:JSON.stringify({
package:name,
price:price
})
});

localStorage.removeItem("selectedPackage");
localStorage.removeItem("selectedPrice");

</script>

</body>
</html>