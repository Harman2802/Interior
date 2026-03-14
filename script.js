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

/*...........services section popup........... */
function openPopup(){
  document.getElementById("consultPopup").style.display = "flex";
}

function closePopup(){
  document.getElementById("consultPopup").style.display = "none";
}

function sendWhatsApp(){
  const phone = "919592290249"; // your number

  const message = "Hello, I want to talk to a design consultant.";
  window.open("https://wa.me/" + phone + "?text=" + encodeURIComponent(message), "_blank");
}


/* ..............why choose us section animation........... */

const track = document.querySelector(".why-track");

let scrollAmount = 0;

function autoSlide() {
    scrollAmount += 1;
    track.style.transform = `translateX(-${scrollAmount}px)`;

    if (scrollAmount >= track.scrollWidth / 2) {
        scrollAmount = 0;
    }

    requestAnimationFrame(autoSlide);
}

autoSlide();


/* ..............gallery filter........... */

const buttons = document.querySelectorAll(".gallery-filter button");
const cards = document.querySelectorAll(".gallery-card");
const indicator = document.querySelector(".filter-indicator");

// Move sliding indicator
function moveIndicator(button) {
    indicator.style.width = button.offsetWidth + "px";
    indicator.style.left = button.offsetLeft + "px";
}

// Set initial position
window.addEventListener("load", () => {
    const activeBtn = document.querySelector(".gallery-filter button.active");
    if (activeBtn) moveIndicator(activeBtn);
});

// Filter Click
buttons.forEach(button => {
    button.addEventListener("click", () => {

        // Change active button
        document.querySelector(".gallery-filter button.active").classList.remove("active");
        button.classList.add("active");

        moveIndicator(button);

        const filter = button.dataset.filter;

        cards.forEach(card => {
            if (filter === "all" || card.classList.contains(filter)) {
                card.classList.remove("hide");
            } else {
                card.classList.add("hide");
            }
        });

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

//..................Projectr complition scroll animation.............

document.addEventListener("DOMContentLoaded", function () {

    const steps = document.querySelectorAll(".step");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add("active");
                }, index * 200);  // delay effect
            }
        });
    }, {
        threshold: 0.3
    });

    steps.forEach(step => {
        observer.observe(step);
    });

});


/*...........footer year update...........*/
document.getElementById("year").textContent = new Date().getFullYear();