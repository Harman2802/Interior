
/*...........login...........*/

const profileCircle = document.getElementById("profileCircle");
const dropdown = document.getElementById("dropdownMenu");

profileCircle.addEventListener("click", function(e){
    e.stopPropagation();
    dropdown.classList.toggle("active");
});

document.addEventListener("click", function(){
    dropdown.classList.remove("active");
});

/*...........logout...........*/
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


/*...........slider home...........*/

let slides = document.querySelectorAll('.slide');
let dots = document.querySelectorAll('.dot');
let indes = 0;

function showSlide(i){
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    slides[i].classList.add('active');
    dots[i].classList.add('active');
}

function nextSlide(){
    indes++;
    if(indes >= slides.length){
        indes = 0;
    }
    showSlide(indes);
}

function currentSlide(i){
    index = i;
    showSlide(indes);
}

setInterval(nextSlide, 3000);




/*................ about us............. */

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    const target = +counter.getAttribute('data-target');
    let count = 0;
    const speed = 80; // smaller = faster

    const updateCount = () => {
        const increment = target / speed;

        if (count < target) {
            count += increment;
            counter.innerText = Math.ceil(count);
            setTimeout(updateCount, 30);
        } else {
            counter.innerText = target;
        }
    };

    updateCount();
});






/*...........services section animation........... */

function openPopup(){
  document.getElementById("consultPopup").style.display = "flex";
}

function closePopup(){
  document.getElementById("consultPopup").style.display = "none";
}

function sendWhatsApp(){
  const phone = "919592290249"; // replace with your number
  const message = "Hello, I want to talk to a design consultant.";
  window.open("https://wa.me/" + phone + "?text=" + encodeURIComponent(message), "_blank");
}




/*...........Customize Section...........*/


const widthInput = document.getElementById("width");
const heightInput = document.getElementById("height");

/* Prevent typing negative sign */
[widthInput, heightInput].forEach(input => {
  input.addEventListener("input", () => {
    if (input.value < 0) {
      input.value = "";
    }
  });
});

function showRoomOptions() {
  const width = parseFloat(widthInput.value);
  const height = parseFloat(heightInput.value);

  if (!width || width <= 0) {
    alert("Please enter valid positive width");
    return;
  }

  if (!height || height <= 0) {
    alert("Please enter valid positive height");
    return;
  }

  // If valid → continue
  alert("Width: " + width + " ft\nHeight: " + height + " ft");
}




/*............Customize Section..............*/

let area = 0;
let selectedDesignData = null;
let selectedCard = null;

function showRoomOptions() {

  const w = document.getElementById("width").value;
  const h = document.getElementById("height").value;

  if (!w || !h) {
    alert("Enter room size");
    return;
  }

  area = w * h;

  localStorage.setItem("selectedArea", area);

  document.getElementById("roomOptions").style.display = "block";
  document.getElementById("designResults").innerHTML = "";
  document.getElementById("priceEstimate").innerHTML = "";
}

function showDesigns(type) {

  const container = document.getElementById("designResults");
  const priceBox = document.getElementById("priceEstimate");

  container.innerHTML = "";
  priceBox.innerHTML = "";
  priceBox.classList.remove("show");

  selectedDesignData = null;
  selectedCard = null;

  /* ===== DESIGN DATA ===== */
  const designs = {

    living: [
      { img: "images/l1.jpg", label: "Compact Living", price: 450 },
      { img: "images/l2.jpg", label: "Luxury Living", price: 900 }
    ],

    kitchen: [
      { img: "images/k1.jpg", label: "Modern Kitchen", price: 650 },
      { img: "images/k2.jpg", label: "Premium Kitchen", price: 950 }
    ],

    office: [
      { img: "images/o1.jpg", label: "Professional Office", price: 720 },
      { img: "images/o2.jpg", label: "Executive Office", price: 980 }
    ],

    fullhouse: [
      { img: "images/f1.jpg", label: "Standard Full House", price: 1200 },
      { img: "images/f2.jpg", label: "Luxury Full House", price: 1800 }
    ]
  };

  /* ✅ SAFETY CHECK */
  if (!designs[type]) {
    console.error("Design type not found:", type);
    return;
  }

  /* ===== CREATE CARDS ===== */
  designs[type].forEach(d => {

    const card = document.createElement("div");
    card.className = "design-card";

    card.innerHTML = `
      <img src="${d.img}" alt="">
      <div class="design-info">
        <h4>${d.label}</h4>
        <button class="quote-btn" disabled>Get Quote</button>
      </div>
    `;

    const btn = card.querySelector(".quote-btn");

    card.onclick = function () {

      document.querySelectorAll(".design-card").forEach(c => {
        c.classList.remove("selected");
        c.querySelector(".quote-btn").disabled = true;
      });

      card.classList.add("selected");
      btn.disabled = false;

      selectedDesignData = d;

      const total = area * d.price;

      priceBox.innerHTML =
        "Estimated Cost: ₹" + total.toLocaleString();

      priceBox.classList.add("show");
    };

    btn.onclick = function (e) {
      e.stopPropagation();

      const total = area * selectedDesignData.price;

      localStorage.setItem("selectedDesign", selectedDesignData.label);
      localStorage.setItem("roomType", type);
      localStorage.setItem("selectedArea", area);
      localStorage.setItem("estimatedPrice", total);

      window.location.href = "get.php";
    };

    container.appendChild(card);
  });
}






/* ..............gallery filter........... */

const buttons = document.querySelectorAll(".gallery-filter button");
const cards = document.querySelectorAll(".gallery-card");
const indicator = document.querySelector(".filter-indicator");

// Move sliding indicator
function moveIndicator(button) {
    if (!indicator) return;
    indicator.style.width = button.offsetWidth + "px";
    indicator.style.left = button.offsetLeft + "px";
}

// Set first button active automatically
window.addEventListener("load", () => {
    if (buttons.length > 0) {
        buttons[0].classList.add("active");
        moveIndicator(buttons[0]);
        filterCards(buttons[0].dataset.filter);
    }
});

// Filter function
function filterCards(filter) {
    cards.forEach(card => {
        if (card.classList.contains(filter)) {
            card.classList.remove("hide");
        } else {
            card.classList.add("hide");
        }
    });
}

// Button click
buttons.forEach(button => {
    button.addEventListener("click", () => {

        // Remove active from all
        buttons.forEach(btn => btn.classList.remove("active"));

        // Add active to clicked
        button.classList.add("active");

        moveIndicator(button);

        const filter = button.dataset.filter;
        filterCards(filter);

    });
});





// ================= CARD REDIRECT =================

cards.forEach(card => {
    card.addEventListener("click", () => {
        const link = card.dataset.link;   // uses data-link="page.html"
        if (link) {
            window.location.href = link;
        }
    });
});





//================= TESTIMONIALS SLIDER =================
const words = ["Wardrobe", "Kitchen", "Full Home"];
const textElement = document.getElementById("estimate-text");

let index = 0;

function changeText() {
    textElement.classList.remove("fade-in");
    textElement.classList.add("fade-out");

    setTimeout(() => {
        index = (index + 1) % words.length;
        textElement.textContent = words[index];

        textElement.classList.remove("fade-out");
        textElement.classList.add("fade-in");
    }, 400);
}

setInterval(changeText, 2500);






/*...........footer year update...........*/
document.getElementById("year").textContent = new Date().getFullYear();



