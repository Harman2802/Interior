<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BHK Type - BestArt</title>

<style>
/* =========================
   GLOBAL
========================= */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI",sans-serif;
}

body{
    background:linear-gradient(to right,#f4f6fb,#eef1f8);
}

/* =========================
   TOP HEADER
========================= */
.top-bar{
    background:white;
    padding:22px 50px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    border-bottom:1px solid #eee;
}

.logo{
    font-weight:700;
    letter-spacing:2px;
    font-size:18px;
}

.progress-wrapper{
    width:600px;
}

.progress-bar{
    position:relative;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.progress-line{
    position:absolute;
    top:9px;
    left:0;
    right:0;
    height:2px;
    background:#e5e5e5;
}

.progress-fill{
    position:absolute;
    top:9px;
    left:0;
    height:2px;
    background:#6b5a64;
    width:0%;
    transition:0.4s ease;
}

/* STEP */
.step{
    text-align:center;
    z-index:2;
    position:relative;
}

.circle{
    width:22px;
    height:22px;
    border-radius:50%;
    border:2px solid #ddd;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    transition:0.3s;
}

.label{
    font-size:12px;
    margin-top:6px;
    color:#888;
}

.step.active .circle{
    border:6px solid #6b5a64;
    transform:scale(1.2);
}

.step.done .circle{
    background:#6b5a64;
    border:2px solid #6b5a64;
    color:white;
    font-size:12px;
}

/* =========================
   MAIN CARD WRAPPER
========================= */
.wrapper{
    display:flex;
    justify-content:center;
    margin-top:70px;
    padding:0 20px;
}

.card{
    width:100%;
    max-width:1000px;   /* wider for step 3 */
    background:#fff;
    padding:50px;
    border-radius:18px;
    box-shadow:0 20px 50px rgba(0,0,0,0.06);
    transition:0.3s ease;
}

.card h2{
    text-align:center;
    margin-bottom:10px;
    font-size:26px;
    font-weight:600;
}

.card p{
    text-align:center;
    font-size:14px;
    color:#777;
    margin-bottom:35px;
}

/* =========================
   STEP 1 OPTIONS
========================= */
.option{
    border:1px solid #e8e8e8;
    border-radius:12px;
    margin-bottom:16px;
    transition:0.25s ease;
}

.option:hover{
    box-shadow:0 6px 18px rgba(0,0,0,0.05);
}

.option-header{
    padding:18px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    cursor:pointer;
}

.option-header input{
    accent-color:#d84f57;
    margin-right:10px;
}

.sub-options{
    display:none;
    padding:18px;
    border-top:1px solid #eee;
    gap:18px;
}

.option.active .sub-options{
    display:flex;
}

.sub-card{
    flex:1;
    border:1px solid #ddd;
    padding:18px;
    border-radius:10px;
    cursor:pointer;
    transition:0.25s ease;
}

.sub-card:hover{
    transform:translateY(-3px);
}

.sub-card.active{
    border:2px solid #d84f57;
    background:#fff4f4;
}

/* =========================
   STEP 2 - ROOM DESIGN
========================= */
.room{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 22px;
    border:1px solid #e5e5e5;
    border-radius:12px;
    margin-bottom:18px;
    transition:0.3s;
}

.room:hover{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

.controls{
    display:flex;
    align-items:center;
    gap:18px;
}

.btn{
    width:36px;
    height:36px;
    border-radius:50%;
    border:none;
    background:#d84f57;
    color:#fff;
    font-size:18px;
    cursor:pointer;
    transition:0.2s;
}

.btn:hover{
    background:#b63a42;
}

.count{
    font-weight:600;
    font-size:16px;
}
.option {
    cursor: pointer;
}

/* =========================
   STEP 3 - PACKAGE
========================= */
.package-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:35px;
}

.package-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    cursor:pointer;
    transition:0.35s ease;
    border:2px solid transparent;
    box-shadow:0 15px 35px rgba(0,0,0,0.05);
    display:flex;
    flex-direction:column;
}

.package-card:hover{
    transform:translateY(-8px);
}

.package-card.selected{
    border-color:#6c63ff;
    box-shadow:0 20px 45px rgba(108,99,255,0.25);
}

.pkg-img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:14px;
    margin-bottom:18px;
}

.package-card h3{
    font-size:20px;
    margin-bottom:6px;
}

.price{
    font-size:26px;
    font-weight:bold;
    color:#6c63ff;
    margin-bottom:18px;
}

.features{
    list-style:none;
    padding-left:0;
    margin-top:auto;
}

.features li{
    position:relative;
    padding-left:26px;
    margin-bottom:10px;
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

/* =========================
   STEP 4 - GET QUOTE
========================= */

.input-field,
.phone-field{
    display:flex;
    align-items:center;
    border:1px solid #e5e5e5;
    border-radius:12px;
    margin-bottom:16px;
    padding:0 14px;
    transition:0.3s;
}

.input-field:focus-within,
.phone-field:focus-within{
    border-color:#d84f57;
    box-shadow:0 4px 12px rgba(216,79,87,0.15);
}

.input-field input,
.phone-field input{
    width:100%;
    border:none;
    padding:14px 6px;
    outline:none;
    font-size:14px;
    background:transparent;
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
    margin:20px 0;
    font-size:14px;
}

.checkbox input{
    display:none;
}

.checkmark{
    width:16px;
    height:16px;
    border:2px solid #d84f57;
    border-radius:4px;
    position:relative;
}

.checkmark::after{
    content:"";
    position:absolute;
    display:none;
    left:4px;
    top:1px;
    width:4px;
    height:8px;
    border:solid #d84f57;
    border-width:0 2px 2px 0;
    transform:rotate(45deg);
}

.checkbox input:checked + .checkmark::after{
    display:block;
}
.popup{
    position: fixed;
    top: 30px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 30px;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    animation: slideDown 0.4s ease;
    z-index: 1000;
    opacity: 1;
    transition: opacity 0.4s ease;
}

.popup.success{ background: #00c853; }
.popup.error{ background: #ff1744; }

@keyframes slideDown{
    from{ top: -100px; opacity:0; }
    to{ top: 30px; opacity:1; }
}

</style>
</head>

<body>

<!-- HEADER -->
<div class="top-bar">

    <div class="logo">BestArt</div>

    <div class="progress-wrapper">

        <div class="progress-bar">
            <div class="progress-line"></div>
            <div class="progress-fill" id="fill"></div>

            <div class="step" data-step="1">
                <div class="circle"></div>
                <div class="label">BHK TYPE</div>
            </div>

            <div class="step" data-step="2">
                <div class="circle"></div>
                <div class="label">ROOMS TO DESIGN</div>
            </div>

            <div class="step" data-step="3">
                <div class="circle"></div>
                <div class="label">PACKAGE</div>
            </div>

            <div class="step" data-step="4">
                <div class="circle"></div>
                <div class="label">GET QUOTE</div>
            </div>
        </div>

    </div>

    <div class="counter"><span id="counter">1</span>/4</div>

</div>

<!-- CARD -->
<div class="wrapper">
<div class="card">

<!-- ================= STEP 1 ================= -->
<div id="step1Section">

<h2>Select your BHK type</h2>
<p>To know more about this, <span>click here</span></p>

<!-- 1 BHK -->
<div class="option">
    <div class="option-header">
        <label>
            <input type="radio" name="bhk" value="1">
            1 BHK
        </label>
    </div>
</div>

<!-- 2 BHK -->
<div class="option expandable">
    <div class="option-header">
        <label>
            <input type="radio" name="bhk" value="2">
            2 BHK
        </label>
        <span class="arrow">⌃</span>
    </div>

    <div class="sub-options">
        <div class="sub-card" data-size="Small">
            Small <small>Below 800 sq ft</small>
        </div>
        <div class="sub-card" data-size="Large">
            Large <small>Above 800 sq ft</small>
        </div>
    </div>
</div>

<!-- 3 BHK -->
<div class="option expandable">
    <div class="option-header">
        <label>
            <input type="radio" name="bhk" value="3">
            3 BHK
        </label>
        <span class="arrow">⌃</span>
    </div>

    <div class="sub-options">
        <div class="sub-card" data-size="Small">
            Small <small>Below 1200 sq ft</small>
        </div>
        <div class="sub-card" data-size="Large">
            Large <small>Above 1200 sq ft</small>
        </div>
    </div>
</div>

<!-- 4 BHK -->
<div class="option expandable">
    <div class="option-header">
        <label>
            <input type="radio" name="bhk" value="4">
            4 BHK
        </label>
        <span class="arrow">⌃</span>
    </div>

    <div class="sub-options">
        <div class="sub-card" data-size="Small">
            Small <small>Below 1800 sq ft</small>
        </div>
        <div class="sub-card" data-size="Large">
            Large <small>Above 1800 sq ft</small>
        </div>
    </div>
</div>

<!-- 5 BHK -->
<div class="option">
    <div class="option-header">
        <label>
            <input type="radio" name="bhk" value="5">
            5 BHK+
        </label>
    </div>
</div>

</div>

<!-- ================= STEP 2 ================= -->
<div id="step2Section" style="display:none;">

<h2>Select Rooms to Design</h2>
<p>You can adjust room quantities</p>

<div class="room" data-room="living">
    Living Room
    <div class="controls">
        <button class="btn minus">−</button>
        <div class="count">1</div>
        <button class="btn plus">+</button>
    </div>
</div>

<div class="room" data-room="kitchen">
    Kitchen
    <div class="controls">
        <button class="btn minus">−</button>
        <div class="count">1</div>
        <button class="btn plus">+</button>
    </div>
</div>

<div class="room" data-room="bedroom">
    Bedroom
    <div class="controls">
        <button class="btn minus">−</button>
        <div class="count">1</div>
        <button class="btn plus">+</button>
    </div>
</div>

<div class="room" data-room="bathroom">
    Bathroom
    <div class="controls">
        <button class="btn minus">−</button>
        <div class="count">1</div>
        <button class="btn plus">+</button>
    </div>
</div>

<div class="room" data-room="dining">
    Dining
    <div class="controls">
        <button class="btn minus">−</button>
        <div class="count">1</div>
        <button class="btn plus">+</button>
    </div>
</div>

</div>

<!-- ================= STEP 3 ================= -->
<div id="step3Section" style="display:none;">

<h2>Pick Your Package</h2>
<p>Select one package to continue</p>

<div class="package-grid">

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

<!-- ================= STEP 4 ================= -->
<div id="step4Section" style="display:none;">

<h2>Your Estimate is almost ready</h2>
<p>Please fill your details to get final quote</p>

<form onsubmit="return false;">

<div class="input-field">
  <input id="name" type="text" placeholder="Name" required />
</div>

<div class="input-field">
  <input id="email" type="email" placeholder="Email ID" required />
</div>

<div class="phone-field">
  <div class="country-code">
    <span class="flag">
      <img src="https://flagcdn.com/w20/in.png">
    </span>
    <span class="code">+91</span>
  </div>
  <input id="phone" type="tel" placeholder="Phone number" maxlength="10" required />
</div>

<label class="checkbox">
  <input type="checkbox" checked>
  <span class="checkmark"></span>
  Send me updates on WhatsApp
</label>

 <!-- City text input -->
  <div class="input-field">
    <input id="city" name="city" type="text" placeholder="Enter your city" required />
  </div>

</form>

</div>



<!-- FOOTER -->
<div class="footer">
    <div class="back" id="backBtn">BACK</div>
    <button class="next" id="nextBtn" disabled>NEXT</button>
</div>

</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       GLOBAL VARIABLES
    ===================================================== */
    let currentStep = 1;
    let selectedBHK = null;
    let selectedSize = null;
    let selectedPackage = null;

    let roomsData = {
        living: 1,
        kitchen: 1,
        bedroom: 1,
        bathroom: 1,
        dining: 1
    };

    const step1Section = document.getElementById("step1Section");
    const step2Section = document.getElementById("step2Section");
    const step3Section = document.getElementById("step3Section");
    const step4Section = document.getElementById("step4Section");

    const nextBtn = document.getElementById("nextBtn");
    const backBtn = document.getElementById("backBtn");

    const steps = document.querySelectorAll(".step");
    const fill = document.getElementById("fill");
    const counter = document.getElementById("counter");

    /* =====================================================
       STEP SYSTEM
    ===================================================== */
    function hideAllSteps() {
        [step1Section, step2Section, step3Section, step4Section]
        .forEach(sec => { if (sec) sec.style.display = "none"; });
    }

    function updateStepper() {
        steps.forEach(step => {
            const num = parseInt(step.dataset.step);
            const circle = step.querySelector(".circle");

            step.classList.remove("active", "done");
            if (circle) circle.innerHTML = "";

            if (num < currentStep) {
                step.classList.add("done");
                if (circle) circle.innerHTML = "✔";
            }
            else if (num === currentStep) {
                step.classList.add("active");
            }
        });

        if (fill) {
            fill.style.width = ((currentStep - 1) / (steps.length - 1)) * 100 + "%";
        }

        if (counter) counter.textContent = currentStep;
    }

    function showStep(step) {
        currentStep = step;
        hideAllSteps();

        if (step === 1) {
            if(step1Section) step1Section.style.display = "block";
            nextBtn.textContent = "NEXT";
            nextBtn.disabled = true;
        }

        if (step === 2) {
            if(step2Section) step2Section.style.display = "block";
            nextBtn.textContent = "CONTINUE";
            nextBtn.disabled = false;
        }

        if (step === 3) {
            if(step3Section) step3Section.style.display = "block";
            nextBtn.textContent = "NEXT";
            nextBtn.disabled = false;
        }

        if (step === 4) {
            if(step4Section) step4Section.style.display = "block";
            nextBtn.textContent = "SUBMIT";
            validateForm();
        }

        updateStepper();
    }

    /* =====================================================
       STEP 1 — BHK SELECTION
    ===================================================== */
    document.querySelectorAll(".option").forEach(option => {
        option.addEventListener("click", function () {
            const radio = this.querySelector("input[name='bhk']");
            radio.checked = true;

            selectedBHK = radio.value;
            selectedSize = null;

            document.querySelectorAll(".option").forEach(opt => opt.classList.remove("active"));
            document.querySelectorAll(".sub-card").forEach(card => card.classList.remove("active"));

            this.classList.add("active");

            if (this.classList.contains("expandable")) nextBtn.disabled = true;
            else nextBtn.disabled = false;
        });
    });

    document.querySelectorAll(".sub-card").forEach(card => {
        card.addEventListener("click", function (e) {
            e.stopPropagation();
            selectedSize = this.dataset.size;

            document.querySelectorAll(".sub-card").forEach(c => c.classList.remove("active"));
            this.classList.add("active");

            nextBtn.disabled = false;
        });
    });

    /* =====================================================
       PACKAGE SELECTION
    ===================================================== */
    document.querySelectorAll(".package-card").forEach(card => {
        card.addEventListener("click", function () {
            document.querySelectorAll(".package-card").forEach(c => c.classList.remove("selected"));
            this.classList.add("selected");
            selectedPackage = this.dataset.package;
            nextBtn.disabled = false;
        });
    });

    /* =====================================================
       ROOM COUNTER
    ===================================================== */
    document.querySelectorAll(".room").forEach(room => {
        const key = room.dataset.room;
        const minus = room.querySelector(".minus");
        const plus = room.querySelector(".plus");
        const countEl = room.querySelector(".count");

        minus.addEventListener("click", () => {
            let count = parseInt(countEl.textContent);
            if (count > 0) count--;
            countEl.textContent = count;
            roomsData[key] = count;
        });

        plus.addEventListener("click", () => {
            let count = parseInt(countEl.textContent);
            count++;
            countEl.textContent = count;
            roomsData[key] = count;
        });
    });

    /* =====================================================
       FORM VALIDATION
    ===================================================== */
    function validateForm() {
        const name = document.getElementById("name")?.value.trim();
        const email = document.getElementById("email")?.value.trim();
        const phone = document.getElementById("phone")?.value.trim();
        const city = document.getElementById("city")?.value.trim();

        if (currentStep === 4) {
            nextBtn.disabled = !(name && email?.includes("@") && phone?.length === 10 && city);
        }
    }

    document.addEventListener("input", validateForm);

    /* =====================================================
       SHOW POPUP FUNCTION
    ===================================================== */
    function showPopup(message, type) {
        const existingPopup = document.getElementById("popup-msg");
        if (existingPopup) existingPopup.remove();

        const popup = document.createElement("div");
        popup.id = "popup-msg";
        popup.className = `popup ${type}`;
        popup.innerText = message;
        document.body.appendChild(popup);

        setTimeout(() => {
            popup.style.opacity = "0";
            setTimeout(() => popup.remove(), 400);
        }, 3000);
    }

    /* =====================================================
       NEXT BUTTON
    ===================================================== */
    nextBtn.addEventListener("click", function () {

        if (currentStep === 1) {
            if (!selectedBHK) return;
            const activeOption = document.querySelector(".option.active");
            if (activeOption.classList.contains("expandable") && !selectedSize) return;
            showStep(2);
        }

        else if (currentStep === 2) showStep(3);
        else if (currentStep === 3) showStep(4);
        else if (currentStep === 4) {
            const name  = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const city  = document.getElementById("city").value.trim();
            const whatsapp = document.querySelector(".checkbox input").checked ? "yes" : "no";

            if (!name || !email || !phone || !city) {
                showPopup("Please fill all fields", "error");
                return;
            }

            const formData = new FormData();
            formData.append("name", name);
            formData.append("email", email);
            formData.append("phone", phone);
            formData.append("city", city);
            formData.append("whatsapp", whatsapp);
            formData.append("bhk", selectedBHK);
            formData.append("size", selectedSize);

            // Send room counts
            formData.append("living", roomsData.living);
            formData.append("kitchen", roomsData.kitchen);
            formData.append("bedroom", roomsData.bedroom);
            formData.append("bathroom", roomsData.bathroom);
            formData.append("dining", roomsData.dining);

            if (selectedPackage) formData.append("package", selectedPackage);

           fetch("home_savequote.php", {
    method: "POST",
    body: formData
})
.then(res => res.text())
.then(response => {
    if(response.trim() === "success"){
        if(selectedPackage) localStorage.setItem("selectedPackage", selectedPackage);
        window.location.href = "fullhome-result.php";
    } else if(response.trim() === "not_logged_in") {
        // Show popup first
        showPopup("Please login first", "error");
        // Redirect after 2 seconds
        setTimeout(() => {
            window.location.href = "login.php";
        }, 2000);
    } else {
        showPopup("Database Error: " + response, "error");
    }
})
.catch(() => {
    showPopup("Server connection failed", "error");
});
        }
    });

    /* =====================================================
       BACK BUTTON
    ===================================================== */
    if (backBtn) {
        backBtn.addEventListener("click", function () {
            if (currentStep === 4) showStep(3);
            else if (currentStep === 3) showStep(2);
            else if (currentStep === 2) showStep(1);
            else window.location.href = "index.php";
        });
    }

    /* INIT */
    showStep(1);
});
</script>


</body>
</html>