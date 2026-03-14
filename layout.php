<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BestArt Kitchen Layout</title>

<style>
body{
    margin:0;
    font-family:Segoe UI, sans-serif;
    background:#f4f4f4;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 40px;
    background:#fff;
    border-bottom:1px solid #eee;
}

.logo{
    font-weight:700;
    font-size:20px;
    letter-spacing:2px;
}

.logo span{
    color:#f4a23a;
}

.steps{
    display:flex;
    gap:40px;
    font-size:14px;
}

.steps div{
    color:#1c1a1a;
}

.steps .active{
    color:#f4a23a;
    font-weight:600;
}
.step-title{
    text-align:center;
    margin-bottom:25px;
}

/* CONTAINER */
.measure-box{
    background:#fafafa;
    padding:30px;
    border-radius:12px;
}

.measure-box .layout-preview {
    width: 100%;
    height: 100px;
    margin-bottom: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #eef0f5;
    border-radius: 6px;
}

.measure-box .note {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 15px;
    text-align: center;
}

.measure-row {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.measure-row label {
    width: 20px;
    font-weight: bold;
}

.measure-row input[type="number"] {
    flex: 1;
    padding: 18px 10px;
    margin: 0 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.measure-row input[type="number"]:focus {
    outline: none;
    border-color: #4A90E2;
    box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
}

.measure-row span {
    font-size: 0.9rem;
    color: #333;
    width: 25px;
    text-align: left;
}
/* PREVIEW AREA */
.layout-preview{
    background:#f3e6e6;
    padding:30px;
    border-radius:8px;
    display:flex;
    justify-content:center;
    margin-bottom:20px;
}

.shape{
    position:relative;
    width:200px;
    height:120px;
}

.box-a{
    position:absolute;
    left:40px;
    top:40px;
    width:40px;
    height:70px;
    border:2px solid #d8a5a5;
    display:flex;
    align-items:center;
    justify-content:center;
}

.box-b{
    position:absolute;
    left:40px;
    top:0;
    width:120px;
    height:40px;
    border:2px solid #d8a5a5;
    display:flex;
    align-items:center;
    justify-content:center;
}
.box-line{
    width:150px;
    height:35px;
    border:2px solid #d8a5a5;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:5px auto;
}

.top{ margin-bottom:10px; }
.bottom{ margin-top:10px; }

.box-c{
    position:absolute;
    left:120px;
    top:40px;
    width:40px;
    height:70px;
    border:2px solid #d8a5a5;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* NOTE */
.note{
    background:#f2dfb3;
    padding:10px;
    border-radius:6px;
    text-align:center;
    margin:15px 0 25px;
    font-size:14px;
}

/* INPUT ROW */
.measure-row{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:15px;
}

.measure-row label{
    width:20px;
    font-weight:600;
}

.measure-row select{
    flex:1;
    padding:10px;
    border-radius:6px;
    border:1px solid #ddd;
}
/* CARD */
.wrapper{
    display:flex;
    justify-content:center;
    margin-top:40px;
}

.card{
    background:#fff;
    width:800px;
    padding:40px;
    border-radius:12px;
    box-shadow:0 4px 18px rgba(0,0,0,.08);
}

/* GRID */
.layout-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.layout-item{
    border:2px solid #eee;
    border-radius:12px;
    padding:20px;
    text-align:center;
    cursor:pointer;
    transition:.25s;
}

.layout-item:hover{
    border-color:#f4a23a;
}

.layout-item.selected{
    border-color:#f4a23a;
    background:#fff7ec;
}

.layout-item img{
    width:100%;
    height:110px;
    object-fit:contain;
}
/* STEP TITLE */
.step-title{
    text-align:center;
    margin-bottom:10px;
    font-size:28px;
    font-weight:600;
}

.subtitle{
    color:#777;
    margin-bottom:30px;
}

/* GRID */
.package-grid{
    display:flex;
    gap:24px;
    justify-content:center;
    align-items:stretch;
    flex-wrap:nowrap;
}

/* equal width cards */
.package-card{
    width:300px;
}

/* CARD */
.package-card{
    background:#fff;
    border-radius:18px;
    padding:14px;
    cursor:pointer;
    transition:0.35s ease;
    border:2px solid transparent;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
    position:relative;
}

/* HOVER EFFECT */
.package-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(0,0,0,0.08);
}

/* SELECTED CARD */
.package-card.selected{
    border-color:#e56b6f;
    box-shadow:0 10px 30px rgba(229,107,111,0.25);
}

/* IMAGE */
.pkg-img{
    width:100%;
    border-radius:14px;
    margin-bottom:12px;
    height:170px;
    object-fit:cover;
}

/* TITLE */
.package-card h3{
    margin:8px 0 5px;
    font-weight:600;
}

/* PRICE */
.price{
    font-size:24px;
    font-weight:700;
    color:#e56b6f;
    margin-bottom:10px;
}

/* FEATURES */
.features{
    list-style:none;
    padding-left:0;
    text-align:left;
}

.features li{
    position:relative;
    padding-left:24px;
    margin-bottom:8px;
    color:#555;
    font-size:14px;
}

.features li::before{
    content:"✔";
    position:absolute;
    left:0;
    color:#3cad46;
    font-weight:bold;
}

/* OPTIONAL SELECT BADGE */
.package-card.selected::after{
    content:"SELECTED";
    position:absolute;
    top:12px;
    right:12px;
    background:#e56b6f;
    color:white;
    font-size:11px;
    padding:4px 8px;
    border-radius:20px;
}
.quote-card{
    max-width:420px;
    margin:0 auto;
    background:#fff;
    padding:25px;
    border-radius:12px;
}

.input-field,
.phone-field{
    display:flex;
    align-items:center;
    border:1px solid #e5e5e5;
    border-radius:6px;
    margin-bottom:12px;
    padding:0 12px;
    background:#fff;
}

.input-field input,
.phone-field input{
    width:100%;
    border:none;
    padding:14px 6px;
    outline:none;
}

.country-code{
    display:flex;
    align-items:center;
    gap:6px;
    padding-right:10px;
    border-right:1px solid #eee;
}

.checkbox{
    display:flex;
    align-items:center;
    gap:10px;
    margin:15px 0;
    cursor:pointer;
}

.checkmark{
    width:14px;
    height:14px;
    border:2px solid #e56b6f;
    border-radius:4px;
}

.terms{
    font-size:13px;
    color:#777;
}

/* ================= CITY MODAL ================= */

#cityModal {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
  animation: fadeIn 0.3s ease;
}

.city-item {
  padding: 10px;
  cursor: pointer;
  transition: 0.2s;
}

.city-item:hover {
  background: #f1f3ff;
}

.city-item.selected {
  background: #6c63ff;
  color: white;
}
.city-sheet{
  width:100%;
  max-width:500px;
  background:#fff;
  border-radius:20px 20px 0 0;
  padding:20px;
  max-height:75vh;
  overflow-y:auto;
}

.city-header{
  display:flex;
  gap:10px;
  margin-bottom:15px;
}

#citySearch{
  flex:1;
  padding:10px;
  border:1px solid #ddd;
  border-radius:8px;
}

.footer-nav{
    display:flex;
    justify-content:space-between;
    margin-top:30px;
}

button{
    border:none;
    padding:12px 26px;
    border-radius:30px;
    cursor:pointer;
}

.next-btn{
    background:#f4a23a;
    color:white;
}

.back-btn{
    background:#eee;
}

/* STEP CONTENT */
.step{
    display:none;
}

.step.active{
    display:block;
}

.center{
    text-align:center;
    padding:40px;
    color:#777;
}
/* =========================
   FOOTER
========================= */
.footer{
    margin-top:40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.back{
    color:#d84f57;
    font-weight:600;
    cursor:pointer;
}

.next{
    background:#d84f57;
    border:none;
    padding:14px 40px;
    border-radius:30px;
    color:#fff;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.next:disabled{
    background:#ccc;
    cursor:not-allowed;
}



</style>
</head>
<body>

<div class="header">
    <div class="logo">Best<span>Art</span></div>

    <div class="steps">
        <div class="active" id="s1">LAYOUT</div>
        <div id="s2">MEASUREMENTS</div>
        <div id="s3">PACKAGE</div>
        <div id="s4">QUOTE</div>
    </div>

    <div id="progressText">1/4</div>
</div>

<div class="wrapper">
<div class="card">

<!-- STEP 1 -->
<div class="step active" id="step1">
<h2>Select Kitchen Layout</h2>

<div class="layout-grid">
<div class="layout-item" data-value="L">
<img src="images/k2.webp">
<p>L-shaped</p>
</div>

<div class="layout-item" data-value="STRAIGHT">
<img src="images/kc2.jpg">
<p>Straight</p>
</div>

<div class="layout-item" data-value="U">
<img src="images/kc3.jpg">
<p>U-shaped</p>
</div>

<div class="layout-item" data-value="PARALLEL">
<img src="images/kc4.jpg">
<p>Parallel</p>
</div>
</div>
</div>

<!-- STEP 2 -->
<div class="step" id="step2">

<h2 class="step-title">Now review the measurements for accuracy</h2>

<div class="measure-box">

    <!-- LAYOUT PREVIEW -->
    <div class="layout-preview">
        <div class="shape" id="layoutShape"></div>
    </div>

    <div class="note">
        Enter your measurement in feet
    </div>

    <!-- A -->
    <div class="measure-row" id="rowA">
        <label>A</label>
        <input type="number" name="measurement_a" min="1" max="100" placeholder="Enter value">
        <span>ft.</span>
    </div>

    <!-- B -->
    <div class="measure-row" id="rowB">
        <label>B</label>
        <input type="number" name="measurement_b" min="1" max="100" placeholder="Enter value">
        <span>ft.</span>
    </div>

    <!-- C -->
    <div class="measure-row" id="rowC">
        <label>C</label>
        <input type="number" name="measurement_c" min="1" max="100" placeholder="Enter value">
        <span>ft.</span>
    </div>

</div>

</div>

<!-- STEP 3 -->
<div class="step" id="step3">

<h2 class="step-title">Pick Your Package</h2>
<p class="subtitle" style="text-align:center;">Select one package to continue</p>

<div class="package-grid">

  <!-- Essentials -->
  <div class="package-card" data-package="essential">
    <img src="images/service1.jpg" class="pkg-img">
    <h3>Essentials</h3>
    <div class="price">₹10k</div>

    <ul class="features">
      <li>Basic design support</li>
      <li>Standard materials</li>
      <li>2 room coverage</li>
    </ul>
  </div>

  <!-- Premium -->
  <div class="package-card" data-package="premium">
    <img src="images/about.jpg" class="pkg-img">
    <h3>Premium</h3>
    <div class="price">₹30k</div>

    <ul class="features">
      <li>Full home design</li>
      <li>Premium materials</li>
      <li>3D visualization</li>
    </ul>
  </div>

  <!-- Luxe -->
  <div class="package-card" data-package="luxe">
    <img src="images/service3.jpg" class="pkg-img">
    <h3>Luxe</h3>
    <div class="price">₹50k</div>

    <ul class="features">
      <li>Luxury interiors</li>
      <li>Custom furniture</li>
      <li>Dedicated designer</li>
    </ul>
  </div>

</div>

</div>


<!-- STEP 4 -->
<div class="step" id="step4">

<h2 class="step-title">Your Estimate is almost ready</h2>

<div class="measure-box quote-card">

<form id="quoteForm">

<div class="input-field">
  <input id="name" type="text" placeholder="Name" required />
</div>

<div class="input-field">
  <input id="email" type="email" placeholder="Email ID" required />
</div>

<div class="phone-field">
  <div class="country-code">
    <span class="flag">🇮🇳</span>
    <span class="code">+91</span>
  </div>
  <input id="phone" type="tel" placeholder="Phone number" maxlength="10" />
</div>

<label class="checkbox">
  <input type="checkbox" checked>
  
  Send me updates on WhatsApp
</label>

 <!-- City text input -->
  <div class="input-field">
    <input id="city" name="city" type="text" placeholder="Enter your city" required />
  </div>

<p class="terms">
By submitting this form, you agree to the
<span>privacy policy</span> & <span>terms and conditions</span>.
</p>

</form>
</div>
</div>


<div class="footer">
    <div class="back" id="backBtn">BACK</div>
    <button class="next" id="nextBtn" disabled>NEXT</button>
</div>

</div>
</div>




<script>
let currentStep = 1;
let selectedLayout = null;
let selectedPackage = null;
let selectedCity = localStorage.getItem("selectedCity") || "";

/* ===============================
   SHOW STEP
================================= */
function showStep(step) {
    document.querySelectorAll(".step").forEach(s => s.classList.remove("active"));
    document.getElementById("step" + step).classList.add("active");

    document.querySelectorAll(".steps div").forEach(s => s.classList.remove("active"));
    document.getElementById("s" + step).classList.add("active");

    document.getElementById("progressText").innerText = step + "/4";

    if(step === 2) updateMeasurementUI(selectedLayout);

    updateNextButton();
}

/* ===============================
   UPDATE NEXT BUTTON
================================= */
function updateNextButton() {
    const btn = document.getElementById("nextBtn");

    if(currentStep === 1){
        btn.disabled = !selectedLayout;
        return;
    }

    if(currentStep === 2){
        const a = document.querySelector("#rowA input").value.trim();
        const b = document.querySelector("#rowB input").value.trim();
        const c = document.querySelector("#rowC input").value.trim();

        if(selectedLayout === "STRAIGHT") btn.disabled = !a;
        else if(selectedLayout === "L" || selectedLayout === "PARALLEL") btn.disabled = !(a && b);
        else if(selectedLayout === "U") btn.disabled = !(a && b && c);

        return;
    }

    if(currentStep === 4){
        const name  = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const city  = selectedCity;

        btn.disabled = !(name && email && phone && city);
        btn.innerText = "CONFIRM";
        return;
    }

    btn.disabled = false;
}

/* ===============================
   STEP 2: Measurement input listeners
================================= */
document.querySelectorAll("#rowA input, #rowB input, #rowC input").forEach(el => {
    el.addEventListener("input", updateNextButton);
});

/* ===============================
   NEXT / BACK
================================= */
function nextStep() {
    // Step 1 validation
    if(currentStep === 1 && !selectedLayout){
        alert("Please select a layout");
        return;
    }

    // Step 4 form submission
    if(currentStep === 4){
        const name  = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const whatsapp = document.querySelector(".checkbox input")?.checked ? "yes" : "no";

        if(!name || !email || !phone || !selectedCity){
            alert("Please fill all required fields");
            return;
        }

        const formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("phone", phone);
        formData.append("city", selectedCity);
        formData.append("whatsapp", whatsapp);

        formData.append("layout", selectedLayout);
        formData.append("package", selectedPackage ? `${selectedPackage} (${selectedLayout} layout)` : `No package selected (${selectedLayout} layout)`);

        // Add measurements and convert empty values to 0
        let a = parseInt(document.querySelector("#rowA input").value.trim()) || 0;
        let b = parseInt(document.querySelector("#rowB input").value.trim()) || 0;
        let c = parseInt(document.querySelector("#rowC input").value.trim()) || 0;

        if(selectedLayout === "STRAIGHT") { b = 0; c = 0; }
        if(selectedLayout === "L" || selectedLayout === "PARALLEL") { c = 0; }

        formData.append("measurement_a", a);
        formData.append("measurement_b", b);
        formData.append("measurement_c", c);

        fetch("save_layout_quote.php", { method: "POST", body: formData })
.then(res => res.text())
.then(response => {
    response = response.trim();
    if(response === "success"){
        localStorage.setItem("selectedLayout", selectedLayout);
        localStorage.setItem("selectedPackage", selectedPackage || "");
        localStorage.setItem("selectedCity", selectedCity);
        window.location.href = "layout-conf.php";
    } else if(response === "not_logged_in"){
        alert("Please login first");
        window.location.href = "login.php";
    } else {
        alert("Database Error: " + response);
    }
})
.catch(()=> alert("Server connection failed"));

        return;
    }

    if(currentStep < 4) currentStep++;
    showStep(currentStep);
}

function prevStep() {
    if(currentStep > 1){
        currentStep--;
        showStep(currentStep);
    }
}

/* ===============================
   STEP 1: Layout Selection
================================= */
document.querySelectorAll(".layout-item").forEach(item => {
    item.addEventListener("click", () => {
        document.querySelectorAll(".layout-item").forEach(i => i.classList.remove("selected"));
        item.classList.add("selected");
        selectedLayout = item.dataset.value;
        updateNextButton();
    });
});

/* ===============================
   STEP 2: Update Measurement UI
================================= */
function updateMeasurementUI(layout) {
    const rowA = document.getElementById("rowA");
    const rowB = document.getElementById("rowB");
    const rowC = document.getElementById("rowC");
    const shape = document.getElementById("layoutShape");

    rowA.style.display = "flex";
    rowB.style.display = "none";
    rowC.style.display = "none";
    shape.innerHTML = "";

    if(layout === "STRAIGHT") shape.innerHTML = `<div class="box-line">A</div>`;
    else if(layout === "L") { rowB.style.display = "flex"; shape.innerHTML = `<div class="box-a">A</div><div class="box-b">B</div>`; }
    else if(layout === "PARALLEL") { rowB.style.display = "flex"; shape.innerHTML = `<div class="box-line top">A</div><div class="box-line bottom">B</div>`; }
    else if(layout === "U") { rowB.style.display = "flex"; rowC.style.display = "flex"; shape.innerHTML = `<div class="box-a">A</div><div class="box-b">B</div><div class="box-c">C</div>`; }

    updateNextButton();
}

/* ===============================
   STEP 3: Package Selection
================================= */
document.querySelectorAll(".package-card").forEach(card => {
    card.addEventListener("click", () => {
        document.querySelectorAll(".package-card").forEach(c => c.classList.remove("selected"));
        card.classList.add("selected");
        selectedPackage = card.dataset.package;
        updateNextButton();
    });
});

/* ===============================
   STEP 4: Form input listeners
================================= */
// Listen for real-time changes in city input too
['name','email','phone','city'].forEach(id => {
    const el = document.getElementById(id);
    if(el) el.addEventListener('input', () => {
        if(id === 'city') selectedCity = el.value.trim();
        updateNextButton();
    });
});

/* ===============================
   BUTTON EVENTS
================================= */
document.getElementById("nextBtn").addEventListener("click", nextStep);
document.getElementById("backBtn").addEventListener("click", prevStep);

/* ===============================
   INIT
================================= */
showStep(1);

</script>

</body>
</html>