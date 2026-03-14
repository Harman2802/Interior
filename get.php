<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BestArt | Quote</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ================= GLOBAL ================= */
*{margin:0;padding:0;box-sizing:border-box;}
body{
  font-family:'Poppins',sans-serif;
  background:linear-gradient(135deg,#f4f6f9,#e8edf5);
  color:#333;
}

/* ================= HEADER ================= */
.header{
  padding:15px 60px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  background:#fff;
  box-shadow:0 5px 20px rgba(0,0,0,0.05);
}
.logo{display:flex;align-items:center;gap:10px;}
.logo img{width:40px;}
.logo span{color:#6c63ff;}

.navbar{display:flex;gap:25px;}
.navbar a{
  text-decoration:none;
  font-size:14px;
  color:#555;
  transition:.3s;
}
.navbar a:hover{color:#6c63ff;}
.signup-btn{
  padding:8px 18px;
  background:#6c63ff;
  color:#fff !important;
  border-radius:25px;
}

/* ================= WRAPPER ================= */
.wrapper{
  display:flex;
  justify-content:center;
  padding:80px 20px 140px;
}

/* ================= CARD ================= */
.quote-card{
  width:100%;
  max-width:420px;
  background:#fff;
  padding:35px 28px;
  border-radius:20px;
  box-shadow:0 15px 40px rgba(0,0,0,0.08);
  animation:fadeUp .6s ease;
}
.quote-card h2{
  text-align:center;
  margin-bottom:25px;
}

/* ================= INPUTS ================= */
.input-field{margin-bottom:18px;}
.input-field input{
  width:100%;
  padding:14px;
  border-radius:12px;
  border:1px solid #ddd;
  font-size:14px;
  outline:none;
  transition:.3s;
}
.input-field input:focus{
  border-color:#6c63ff;
  box-shadow:0 0 0 3px rgba(108,99,255,.1);
}

/* PHONE */
.phone-field{
  display:flex;
  align-items:center;
  border:1px solid #ddd;
  border-radius:12px;
  padding:6px 10px;
  margin-bottom:18px;
}
.phone-field input{
  border:none;
  flex:1;
  padding:10px;
  outline:none;
}
.country-code{
  display:flex;
  align-items:center;
  gap:6px;
  padding-right:10px;
  border-right:1px solid #ddd;
}
.country-code img{width:18px;}

/* CHECKBOX */
.checkbox{
  display:flex;
  align-items:center;
  gap:8px;
  font-size:13px;
  margin-bottom:18px;
}
.checkbox input{accent-color:#6c63ff;}

/* TERMS */
.terms{
  font-size:11px;
  color:#777;
  line-height:1.5;
}
.terms span{color:#6c63ff;}

/* FOOTER BUTTON */
.footer{
  position:fixed;
  bottom:0;
  width:100%;
  background:#fff;
  padding:15px 60px;
  display:flex;
  justify-content:space-between;
  box-shadow:0 -5px 20px rgba(0,0,0,0.05);
}
.back{
  color:#888;
  cursor:pointer;
}
.next{
  padding:12px 30px;
  border-radius:30px;
  border:none;
  background:#6c63ff;
  color:#fff;
  font-weight:600;
  cursor:pointer;
}
.next:disabled{
  background:#c7c7c7;
  cursor:not-allowed;
}

/* CITY MODAL */
.city-modal {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.4);
  display: none;
  justify-content: center;
  align-items: center; /* CENTER MODAL */
}

.city-sheet {
  background: #fff;
  width: 90%;
  max-width: 380px;
  border-radius: 16px;
  padding: 20px;
  animation: fadeUp 0.3s ease;
}.city-item{
  padding:10px;
  border-radius:8px;
  cursor:pointer;
}
.city-item:hover{background:#f1f1ff;}
.city-item.selected{
  background:#6c63ff;
  color:#fff;
}

@keyframes fadeUp{
  from{opacity:0;transform:translateY(25px);}
  to{opacity:1;transform:translateY(0);}
}

</style>
</head>
<body>

<!-- HEADER -->
<header class="header">
  <div class="logo">
    <img src="images/logo.png">
    <h2>Best<span>Art</span></h2>
  </div>
</header>

<!-- FORM -->
<div class="wrapper">
<div class="quote-card">
<h2>Your Estimate is almost ready</h2>

<form id="quoteForm" method="POST" action="save_get.php">

<!-- Hidden input for selected design -->
<input type="hidden" id="selectedDesignInput" name="selectedDesign">

<div class="input-field">
<input id="name" name="name" type="text" placeholder="Name" required>
</div>

<div class="input-field">
<input id="email" name="email" type="email" placeholder="Email ID" required>
</div>

<div class="phone-field">
<div class="country-code">
<img src="https://flagcdn.com/w20/in.png">
<span>+91</span>
</div>

<input id="phone" name="phone" type="tel" maxlength="10" placeholder="Phone number" required>
</div>

<label class="checkbox">
<input type="checkbox" name="whatsapp" checked>
Send me updates on WhatsApp
</label>

<div class="input-field">
<input id="city" name="city" type="text" placeholder="Enter your city" required />
</div>

<p class="terms">
By submitting this form, you agree to our
<span>privacy policy</span> & <span>terms</span>.
</p>

</form>
</div>
</div>

<!-- BUTTON BAR -->
<div class="footer">
<div class="back" onclick="window.history.back()">BACK</div>
<button class="next" id="nextBtn" disabled>NEXT</button>
</div>



<script>
/* ===== CHECK DESIGN DATA ===== */
const selectedDesign = localStorage.getItem("selectedDesign");
const selectedDesignInput = document.getElementById("selectedDesignInput");

if(!selectedDesign){
  alert("Please select design first");
  window.location.href="index.php";
} else {
  selectedDesignInput.value = selectedDesign;
}

/* ===== FORM VALIDATION ===== */
const nextBtn = document.getElementById("nextBtn");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("phone");
const cityInput = document.getElementById("city");

phoneInput.addEventListener("input", () => {
  phoneInput.value = phoneInput.value.replace(/\D/g, "");
});

function validate(){
  const valid =
    nameInput.value.trim().length > 1 &&
    emailInput.checkValidity() &&
    phoneInput.value.length === 10 &&
    cityInput.value.trim() !== "";
  nextBtn.disabled = !valid;
}

[nameInput, emailInput, phoneInput, cityInput]
.forEach(el => el.addEventListener("input", validate));

/* Trigger validation on page load in case fields are pre-filled */
window.onload = function(){
  validate(); // ensure button state
  const design = localStorage.getItem("selectedDesign");
  const room = localStorage.getItem("roomType");
  const area = localStorage.getItem("selectedArea");
  const price = localStorage.getItem("estimatedPrice");

  if(design) document.getElementById("design").value = design;
  if(room) document.getElementById("room").value = room;
  if(area) document.getElementById("area").value = area;
  if(price) document.getElementById("price").value = price;
}

nextBtn.addEventListener("click", () => {
  if(!nextBtn.disabled){
    document.getElementById("quoteForm").submit();
  }
});
</script>


</body>
</html>