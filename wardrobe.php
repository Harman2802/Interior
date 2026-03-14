<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wardrobe Height</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
body{
  margin:0;
  font-family: "Segoe UI", sans-serif;
  background:#f6f7fb;
  color:#333;
}

/* HEADER */
.header{
  display:flex;
  align-items:center;
  padding:18px 40px;
  background:#fff;
  border-bottom:1px solid #eee;
  position:relative;
}

.logo{
  font-size:22px;
  font-weight:700;
}
.logo span{ color:#e05a5a; }

/* PAGE LAYOUT */
/* PROGRESS BAR */ .progress { display: flex; align-items: center; justify-content: space-between; width: 100%; } /* EACH STEP */ .progress-step { text-align: center; flex: 1; font-size: 12px; color: #aaa; } /* CIRCLE */ .progress-step .circle { width: 28px; height: 28px; border-radius: 50%; background: #ddd; margin: auto; margin-bottom: 6px; } /* ACTIVE STEP */ .progress-step.active .circle { background: #e05a5a; } .progress-step.active { color: #e05a5a; font-weight: bold; }
/* ===== STEP WRAPPER ===== */
.step-content {
  max-width: 950px;
  margin: 60px auto;
  padding: 20px;
  animation: fadeIn .35s ease;
}

/* ===== CARD (STEP 1) ===== */
.card {
  background: #ffffff;
  padding: 40px;
  border-radius: 18px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
}

/* ===== HEADINGS ===== */
h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 25px;
}

/* ===== HEIGHT OPTIONS ===== */
.option {
  display: flex;
  align-items: center;
  padding: 16px 18px;
  border-radius: 12px;
  border: 1px solid #e5e7eb;
  margin-bottom: 14px;
  cursor: pointer;
  transition: all 0.25s ease;
  background: #fff;
  font-weight: 500;
}

.option:hover {
  border-color: #e05a5a;
  background: #fff8f8;
  transform: translateY(-2px);
}

.option input {
  margin-right: 12px;
  accent-color: #e05a5a;
  transform: scale(1.1);
}

/* ===== TYPE GRID (STEP 2) ===== */
.type-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 25px;
  margin-top: 30px;
}
/* SELECTED STATE FOR STEP 2 */
#step2 .type-card.selected {
  border: 2px solid #e05a5a;
  box-shadow: 0 12px 28px rgba(224, 90, 90, 0.18);
  transform: translateY(-4px);
}
/* ===== TYPE CARD ===== */
.type-card {
  border-radius: 18px;
  overflow: hidden;
  border: 1px solid #e5e7eb;
  background: #fff;
  cursor: pointer;
  transition: all 0.3s ease;
}

.type-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 35px rgba(0, 0, 0, 0.08);
  border-color: #e05a5a;
}

.type-card input {
  display: none;
}

.type-content {
  padding: 18px;
  text-align: center;
}

.type-content img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 14px;
  margin-bottom: 14px;
}

.type-content h3 {
  font-size: 18px;
  font-weight: 600;
  margin: 8px 0;
}

/* ===== FOOTER ===== */
.footer {
  margin-top: 35px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* ===== BUTTONS ===== */
.backBtn {
  background: #eef1f6;
  border: none;
  padding: 13px 28px;
  border-radius: 10px;
  font-weight: 500;
  cursor: pointer;
  transition: 0.25s;
}

.backBtn:hover {
  background: #dfe3ea;
}

.nextBtn {
  background: #d1d5db;
  color: #fff;
  border: none;
  padding: 13px 30px;
  border-radius: 10px;
  font-weight: 500;
  transition: 0.3s ease;
  cursor: not-allowed;
}

.nextBtn.enabled {
  background: linear-gradient(135deg, #e05a5a, #ff7878);
  cursor: pointer;
  box-shadow: 0 10px 20px rgba(224, 90, 90, 0.3);
}

/* ===== ANIMATION ===== */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* MOBILE */
@media(max-width:768px){
  #step2{
    grid-template-columns:1fr;
  }

  #step2 .footer{
    grid-column:span 1;
  }
}
/*===step 3====*/
/* ===== STEP 3 ===== */

#step3 {
  max-width: 950px;
  margin: 60px auto;
  padding: 20px;
}

#step3 h2 {
  text-align: center;
  font-size: 26px;
  margin-bottom: 30px;
  font-weight: 600;
}

/* GRID */
.finish-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

/* CARD */
.finish-card {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 16px;
  padding: 16px;
  cursor: pointer;
  transition: 0.3s;
  text-align: center;
}

.finish-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 35px rgba(0,0,0,0.08);
}

.finish-card input {
  display: none;
}

.finish-card img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  border-radius: 12px;
  margin-bottom: 12px;
}

.finish-card h3 {
  margin-bottom: 6px;
}

.finish-card p {
  font-size: 14px;
  color: #777;
}

/* SELECTED */
.finish-card.selected {
  border: 2px solid #e05a5a;
  box-shadow: 0 12px 28px rgba(224,90,90,0.18);
}

/* FOOTER */
.footer {
  display: flex;
  justify-content: space-between;
  margin-top: 30px;
}

/* MOBILE */
@media (max-width: 768px) {
  .finish-grid {
    grid-template-columns: 1fr;
  }
}
/*===step 4====*/
#step4 h2 {
  text-align: center;
  font-size: 26px;
  margin-bottom: 20px;
  font-weight: 600;
}
#step4 {
  max-width: 900px;
  margin: auto;
}

.note {
  background: #fff4cc;
  padding: 12px;
  border-radius: 6px;
  font-size: 14px;
  margin-bottom: 25px;
  text-align: center;
}

.material-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}

/* MATERIAL CARD */
.material-card {
  border: 1px solid #e6e6e6;
  border-radius: 12px;
  overflow: hidden;
  background: #fff;
  cursor: pointer;
  transition: 0.25s;
}

.material-card input {
  display: none;
}

.material-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 24px rgba(0,0,0,0.08);
}

.material-content {
  padding: 16px;
}

.material-content img {
  width: 100%;
  height: 170px;
  object-fit: cover;
  border-radius: 8px;
  margin: 10px 0;
}

.meta {
  font-size: 13px;
  color: #666;
}

/* SELECTED STATE */
.material-card.selected {
  border: 2px solid #e05a5a;
  box-shadow: 0 12px 28px rgba(224, 90, 90, 0.15);
}

/* STEP 5 */
#step5 {
  max-width: 950px;
  margin: auto;
  text-align: center;
}

.accessories-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 26px;
  margin-top: 25px;
}

.acc-card {
  position: relative;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e6e6e6;
  cursor: pointer;
  transition: 0.25s;
}

.acc-card input {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 18px;
  height: 18px;
}

.acc-card img {
  width: 100%;
  height: 170px;
  object-fit: cover;
}

.acc-title {
  padding: 12px;
  font-weight: 500;
}

/* HOVER */
.acc-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 24px rgba(0,0,0,0.08);
}

/* SELECTED */
.acc-card.selected {
  border: 2px solid #e05a5a;
  box-shadow: 0 12px 28px rgba(224,90,90,0.15);
}

/* MOBILE */
@media(max-width:768px){
  .accessories-grid{
    grid-template-columns:1fr;
  }
}
/* STEP 6 */
/* STEP TITLE */
.step-title {
  text-align: center;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 30px;
  color: #333;
}

/* OPTIONS WRAPPER */
.quote-options {
  max-width: 420px;
  margin: auto;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

/* CARD */
.quote-card {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 18px;
  border-radius: 10px;
  border: 1px solid #eee;
  background: #fff;
  cursor: pointer;
  transition: 0.25s;
  font-size: 16px;
}

.quote-card:hover {
  border-color: #e45757;
}

/* RADIO */
.quote-card input {
  accent-color: #e45757;
  transform: scale(1.2);
}

/* SELECTED STATE */
.quote-card.selected {
  border: 2px solid #e45757;
  background: #fff6f6;
}

/* final quote form */
/* =========================
   STEP 7 - FINAL QUOTE FORM
========================= */

#step7 {
  max-width: 950px;
  margin: 60px auto;
  padding: 20px;
}

#step7 .step-title {
  text-align: center;
  font-size: 26px;
  font-weight: 600;
  margin-bottom: 30px;
}

/* FORM CARD */
#step7 .measure-box {
  max-width: 420px;
  margin: auto;
  background: #fff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.06);
}

/* INPUT WRAPPER */
#step7 .input-field,
#step7 .phone-field {
  display: flex;
  align-items: center;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  margin-bottom: 16px;
  padding: 0 14px;
  background: #fff;
  transition: 0.25s ease;
}

/* INPUT FOCUS EFFECT */
#step7 .input-field:focus-within,
#step7 .phone-field:focus-within {
  border-color: #e56b6f;
  box-shadow: 0 0 0 3px rgba(229,107,111,0.15);
}

/* INPUT */
#step7 input {
  width: 100%;
  border: none;
  padding: 14px 6px;
  font-size: 14px;
  outline: none;
  background: transparent;
}

/* PHONE */
#step7 .country-code {
  display: flex;
  align-items: center;
  gap: 6px;
  padding-right: 10px;
  border-right: 1px solid #eee;
  font-weight: 500;
}

/* CHECKBOX */
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

/* TERMS */
#step7 .terms {
  font-size: 12px;
  color: #777;
  line-height: 1.5;
}

/* =========================
   CITY MODAL
========================= */

.city-modal {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.35);
  display: none;
  justify-content: center;
  align-items: flex-end;
  z-index: 9999;
}

.city-sheet {
  width: 100%;
  max-width: 420px;
  background: white;
  border-radius: 20px 20px 0 0;
  padding: 20px;
  max-height: 60vh;
  overflow-y: auto;
  animation: slideUp .25s ease;
}

@keyframes slideUp {
  from { transform: translateY(100%); }
  to { transform: translateY(0); }
}

.sheet-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 600;
  margin-bottom: 15px;
}

#citySearch {
  width: 100%;
  padding: 12px;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  margin-bottom: 15px;
  outline: none;
}

#citySearch:focus {
  border-color: #e56b6f;
}

/* CITY ITEMS */
.city-item {
  padding: 12px;
  border-radius: 8px;
  cursor: pointer;
  transition: 0.2s;
}

.city-item:hover {
  background: #f7f7f7;
}

.city-item.selected {
  background: #fdecee;
  color: #e56b6f;
  font-weight: 600;
}


</style>
</head>

<body>
<div class="header">
    <div class="logo">Best<span>Art</span></div>

    <div class="progress">

        <div class="progress-step active" data-step="1">
            <div class="circle"></div>
            <span>LENGTH</span>
        </div>

        <div class="progress-step" data-step="2">
            <div class="circle"></div>
            <span>TYPE</span>
        </div>

        <div class="progress-step" data-step="3">
            <div class="circle"></div>
            <span>FINISH</span>
        </div>

        <div class="progress-step" data-step="4">
            <div class="circle"></div>
            <span>MATERIAL</span>
        </div>

        <div class="progress-step" data-step="5">
            <div class="circle"></div>
            <span>ACCESSORIES</span>
        </div>

        <div class="progress-step" data-step="6">
            <div class="circle"></div>
            <span>GET QUOTE</span>
        </div>

<div id="progressText">1/6</div>
    </div>
</div>

 <!-- STEP 1 -->
  <div class="step-content" id="step1">
    <div class="card">
      <h2>What is the height of your wardrobe?</h2>

      <label class="option">
        <input type="radio" name="height" value="4"> 4 ft
      </label>

      <label class="option">
        <input type="radio" name="height" value="6"> 6 ft
      </label>

      <label class="option">
        <input type="radio" name="height" value="7"> 7 ft
      </label>

      <label class="option">
        <input type="radio" name="height" value="9"> 9 ft
      </label>

      <div class="footer">
        <button class="backBtn" onclick="prevStep()">BACK</button>
        <button class="nextBtn" onclick="nextStep()" disabled>NEXT</button>
      </div>
    </div>
  </div>

  <!-- STEP 2 -->
  <div class="step-content" id="step2" style="display:none;">
    <h2>Select the type of wardrobe</h2>

    <div class="type-grid">

      <label class="type-card">
        <input type="radio" name="wardrobeType" value="Sliding">
        <div class="type-content">
          <img src="images/sl.jpg">
          <h3>Sliding</h3>
        </div>
      </label>

      <label class="type-card">
        <input type="radio" name="wardrobeType" value="Swing">
        <div class="type-content">
          <img src="images/sw.jpg">
          <h3>Swing</h3>
        </div>
      </label>

    </div>

    <div class="footer">
      <button class="backBtn" onclick="prevStep()">BACK</button>
      <button class="nextBtn" onclick="nextStep()" disabled>NEXT</button>
    </div>
  </div>

<!-- STEP 3 -->
<div class="step-content" id="step3">

  <h2>Select wardrobe finish</h2>

  <div class="finish-grid">

    <label class="finish-card">
      <input type="radio" name="finish" value="Laminate">
      <img src="images/f1.jpg">
      <h3>Laminate Finish</h3>
      <p>Durable and budget-friendly surface finish.</p>
    </label>

    <label class="finish-card">
      <input type="radio" name="finish" value="Acrylic">
      <img src="images/f2.jpg">
      <h3>Acrylic Finish</h3>
      <p>Glossy premium finish with modern look.</p>
    </label>

    <label class="finish-card">
      <input type="radio" name="finish" value="Glass">
      <img src="images/f3.jpg">
      <h3>Glass Finish</h3>
      <p>Elegant and luxurious wardrobe appearance.</p>
    </label>

  </div>

  <div class="footer">
    <button class="backBtn" onclick="prevStep()">BACK</button>
    <button class="nextBtn" onclick="nextStep()" disabled>NEXT</button>
  </div>

</div>

<!-- STEP 4 -->
<div class="step-content" id="step4">
  <h2>Select your preferred core material</h2>

  <div class="note">
    Your core material options will depend on the finish you have chosen.
  </div>

  <div class="material-grid">

    <!-- MDF -->
    <label class="material-card">
      <input type="radio" name="material" value="MDF">

      <div class="material-content">
        <h3>MDF</h3>
        <p>Seamless, free of knots, and has high resistance to wear & tear.</p>

        <img src="images/m1.jpg">

        <div class="meta">
          <div><strong>Price :</strong> ₹₹</div>
          <div><strong>Pro Tip :</strong> Ideal for smooth cabinet finishes.</div>
        </div>
      </div>
    </label>

    <!-- HDF -->
    <label class="material-card">
      <input type="radio" name="material" value="HDF">
      <div class="material-content">
        <h3>HDF / HMR</h3>
        <p>Highly dense board with strong screw-holding capacity.</p>

        <img src="images/m1.jpg">

        <div class="meta">
          <div><strong>Price :</strong> ₹₹₹</div>
          <div><strong>Pro Tip :</strong> Great for heavy-duty wardrobes.</div>
        </div>
      </div>
    </label>

  </div>

  <div class="footer">
    <button class="backBtn" onclick="prevStep()">BACK</button>
    <button class="nextBtn" onclick="nextStep()" disabled>NEXT</button>
  </div>
</div>

 <!-- STEP 5 -->
<div class="step-content" id="step5">

  <h2>Add your preferred accessories (optional)</h2>

  <div class="accessories-grid">

    <label class="acc-card">
      <input type="checkbox" value="Loft">
      <img src="images/a1.jpeg">
      <div class="acc-title">Loft</div>
    </label>

    <label class="acc-card">
      <input type="checkbox" value="Single Drawer">
      <img src="images/a2.jpg">
      <div class="acc-title">Single full-size drawer</div>
    </label>

    <label class="acc-card">
      <input type="checkbox" value="Half Drawer">
      <img src="images/a3.jpg">
      <div class="acc-title">1 half-drawer</div>
    </label>

    <label class="acc-card">
      <input type="checkbox" value="Two Drawer">
      <img src="images/a4.jpg">
      <div class="acc-title">2 half-drawers</div>
    </label>

    <label class="acc-card">
      <input type="checkbox" value="Wicker">
      <img src="images/a5.jpg">
      <div class="acc-title">Wicker pull out</div>
    </label>

  </div>

  <div class="footer">
    <button class="backBtn" onclick="prevStep()">BACK</button>
    <button class="nextBtn" onclick="nextStep()">NEXT</button>
  </div>

</div>

 <!-- STEP 6 -->
<div class="step-content" id="step6" style="display:none;">

  <h2 class="step-title">
    When will you require our home interior services?
  </h2>

  <div class="quote-options">

    <label class="quote-card">
      <input type="radio" name="requireTime" value="Within 6 months">
      <span>Within 6 months</span>
    </label>

    <label class="quote-card">
      <input type="radio" name="requireTime" value="After 6 months">
      <span>After 6 months</span>
    </label>

    <label class="quote-card">
      <input type="radio" name="requireTime" value="No requirement">
      <span>No requirement</span>
    </label>

  </div>

  <div class="footer">
    <button class="backBtn" onclick="prevStep()">BACK</button>
    <button class="nextBtn" onclick="nextStep()" disabled>NEXT</button>
  </div>

</div>

<!-- STEP FINAL QUOTE -->
<div class="step-content" id="step7" style="display:none;">

  <h2 class="step-title">Your Estimate is almost ready</h2>

  <div class="measure-box">

    <form id="quoteForm">

  <div class="input-field">
    <input id="name" name="name" type="text" placeholder="Name" required />
  </div>

  <div class="input-field">
    <input id="email" name="email" type="email" placeholder="Email ID" required />
  </div>

  <div class="phone-field">
    <div class="country-code">
      <span class="flag">🇮🇳</span>
      <span class="code">+91</span>
    </div>
    <input id="phone" name="phone" type="tel" placeholder="Phone number" maxlength="10" required />
  </div>

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
 

  <div class="footer">
    <button class="backBtn" onclick="prevStep()">BACK</button>
    <button type="submit" form="quoteForm" class="nextBtn" id="quoteNext" disabled>
  SUBMIT
</button>
  </div>

</div>

<!-- Script for option selection -->
 
<script>
let currentStep = 1;
const totalSteps = 7;

/* SHOW STEP */
function showStep(step) {

  /* SHOW STEP */
  document.querySelectorAll(".step-content")
    .forEach(s => s.style.display = "none");

  document.getElementById("step" + step).style.display = "block";

  currentStep = step;

  /* UPDATE PROGRESS BAR */
  document.querySelectorAll(".progress-step")
    .forEach(p => p.classList.remove("active"));

  const activeProgress = document.querySelector(
    `.progress-step[data-step="${step}"]`
  );

  if (activeProgress) {
    activeProgress.classList.add("active");
  }

  /* UPDATE TEXT COUNTER */
  document.getElementById("progressText").innerText =
    step + "/" + totalSteps;

  updateNextButton();
}

/* NEXT */
function nextStep() {
  if (currentStep < totalSteps) {
    showStep(currentStep + 1);
  }
}

/* BACK */
function prevStep() {
  if (currentStep > 1) {
    showStep(currentStep - 1);
  }
}

/* UPDATE NEXT BUTTON */
function updateNextButton() {

  const activeStep = document.getElementById("step" + currentStep);
  const btn = activeStep.querySelector(".nextBtn");

  if (!btn) return;

  // STEP 5 is optional → always enabled
  if (currentStep === 5) {
    btn.disabled = false;
    btn.classList.add("enabled");
    return;
  }

  // For other steps (radio required)
  let selected = activeStep.querySelector("input[type=radio]:checked");

  if (selected) {
    btn.disabled = false;
    btn.classList.add("enabled");
  } else {
    btn.disabled = true;
    btn.classList.remove("enabled");
  }
}

/* STEP 1 HEIGHT */
document.querySelectorAll('input[name="height"]').forEach(input => {
  input.addEventListener("change", updateNextButton);
});

/* STEP 2 TYPE */
document.querySelectorAll('#step2 .type-card').forEach(card => {

  card.addEventListener("click", function () {

    // Remove previous selection
    document.querySelectorAll('#step2 .type-card')
      .forEach(c => c.classList.remove("selected"));

    // Add selected class
    card.classList.add("selected");

    // Check radio
    card.querySelector("input").checked = true;

    // Update next button
    updateNextButton();
  });

});

/* STEP 3 FINISH */
document.querySelectorAll('#step3 .finish-card').forEach(card => {

  card.addEventListener("click", function () {

    document.querySelectorAll('#step3 .finish-card')
      .forEach(c => c.classList.remove("selected"));

    card.classList.add("selected");

    card.querySelector("input").checked = true;

    updateNextButton();
  });

});

/* STEP 4 MATERIAL */
let selectedMaterial = null;

document.querySelectorAll('input[name="material"]').forEach(input => {

  const card = input.closest(".material-card");

  card.addEventListener("click", function () {

    document.querySelectorAll(".material-card")
      .forEach(c => c.classList.remove("selected"));

    card.classList.add("selected");
    input.checked = true;

    selectedMaterial = input.value;

    updateNextButton();
  });

});
/* STEP 5 ACCESSORIES */
let selectedAccessories = [];

document.querySelectorAll(".acc-card input").forEach(input => {

  input.addEventListener("change", function () {

    const card = this.closest(".acc-card");

    if (this.checked) {
      card.classList.add("selected");
      selectedAccessories.push(this.value);
    } else {
      card.classList.remove("selected");
      selectedAccessories =
        selectedAccessories.filter(v => v !== this.value);
    }

    console.log(selectedAccessories);
  });

});
if (currentStep === 5) {
  const nextBtn = document.querySelector("#step5 .nextBtn");
  if (nextBtn) nextBtn.disabled = false;
}
/* STEP 6 REQUIREMENT */
document.querySelectorAll('#step6 .quote-card').forEach(card => {

  card.addEventListener("click", function () {

    document.querySelectorAll('#step6 .quote-card')
      .forEach(c => c.classList.remove("selected"));

    card.classList.add("selected");

    card.querySelector("input").checked = true;

    updateNextButton();
  });

});
/* STEP 6 REQUIRE TIME */
document.querySelectorAll('input[name="requireTime"]').forEach(input => {
  input.addEventListener("change", function () {

    // highlight selected card
    document.querySelectorAll('#step6 .quote-card')
      .forEach(c => c.classList.remove("selected"));

    this.closest(".quote-card").classList.add("selected");

    // enable next button
    updateNextButton();
  });
});


/* FINAL QUOTE VALIDATION */

const quoteInputs = [
  document.getElementById("name"),
  document.getElementById("email"),
  document.getElementById("phone"),
  document.getElementById("city")
];

quoteInputs.forEach(input => {
  input.addEventListener("input", validateQuoteForm);
});

function validateQuoteForm() {

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const city = document.getElementById("city").value.trim();

  const btn = document.getElementById("quoteNext");

  if (name && email && phone.length === 10 && city) {
    btn.disabled = false;
    btn.classList.add("enabled");
  } else {
    btn.disabled = true;
    btn.classList.remove("enabled");
  }
}

/* INITIAL LOAD */
showStep(1);
</script>


<script>
document.getElementById("quoteForm").addEventListener("submit", function(e) {

  e.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const city = document.getElementById("city").value.trim();

  if (!name || !email || phone.length !== 10 || !city) {
    alert("Please fill all required fields.");
    return;
  }

  const height = document.querySelector('input[name="height"]:checked')?.value;
  const type = document.querySelector('input[name="wardrobeType"]:checked')?.value;
  const finish = document.querySelector('input[name="finish"]:checked')?.value;
  const material = document.querySelector('input[name="material"]:checked')?.value;
  const requireTime = document.querySelector('input[name="requireTime"]:checked')?.value;

  let accessories = [];
  document.querySelectorAll('#step5 input[type="checkbox"]:checked')
    .forEach(el => accessories.push(el.value));

  const formData = new FormData();
  formData.append("name", name);
  formData.append("email", email);
  formData.append("phone", phone);
  formData.append("city", city);
  formData.append("height", height);
  formData.append("type", type);
  formData.append("finish", finish);
  formData.append("material", material);
  formData.append("accessories", accessories.join(", "));
  formData.append("requireTime", requireTime);

  fetch("save_wardrobe.php", {
  method: "POST",
  body: formData
})
.then(response => response.text())
.then(data => {

  data = data.trim();   // remove spaces and new lines
  console.log("Server response:", data);

  if (data === "success") {
      window.location.href = "wardrobe-result.php";
  } else if (data === "login_required") {
      alert("Please login first.");
      window.location.href = "login.php";
  } else if (data === "missing_fields") {
      alert("Please fill all required fields.");
  } else {
      alert("Database error.");
      console.log(data);
  }

})
.catch(error => {
  alert("Server error.");
  console.error(error);
});

});
</script>

</body>
</html>