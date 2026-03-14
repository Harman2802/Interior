<?php
session_start();

$user_id = null;

if(isset($_SESSION['user'])){
    $user_id = $_SESSION['user']['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bestinterior | Interior Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="index.css">
</head>
<body>

<!-- HEADER -->
<header class="header">

<div class="menu-toggle" id="menuToggle">☰</div>
  <div class="logo">
  <img src="images/logo.png" alt="BestArt Interior Design">

    <h2>Best<span>Art</span></h2>
  </div>

  <nav class="navbar">
    
  <a href="#home">Home</a>
  <a href="#about">About Us</a>
  <a href="#services">Services</a>
  <a href="#customize">Customize</a>
  <a href="#gallery">Gallery</a>
  <a href="#pack">Packages</a>
  <a href="#estimate">Estimate</a>
  <a href="#reviews">Reviews</a>
  <a href="#contact">Contact Us</a>

  <!-- PROFILE ICON -->
  <div class="user-menu">

  <div class="profile-circle" id="profileCircle">
   
 <?php if(isset($_SESSION['user'])){ ?>

    <?php if(!empty($_SESSION['user']['photo'])){ ?>
        <img src="<?php echo $_SESSION['user']['photo']; ?>?v=<?php echo time(); ?>" alt="profile">
    <?php } else { ?>
        <img src="images/user3.png" alt="profile">
    <?php } ?>

<?php } else { ?>
    <img src="images/user.jpg" alt="guest">
<?php } ?>
  </div>

  <div class="dropdown" id="dropdownMenu">

   <?php if(isset($_SESSION['user'])){ ?>

    <p class="welcome-text">
        <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
    </p>

    <?php if($_SESSION['user']['role'] == "admin"){ ?>
        <a href="admin.php">Admin Dashboard</a>
    <?php } else { ?>
        <a href="user-dashboard.php">My Profile</a>
    <?php } ?>

    <a href="settings.php">Settings</a>
    <a href="designs.php">Designs</a>
    <a href="logout.php">Logout</a>

<?php } else { ?>

    <a href="signup.php">Sign Up</a>
    <a href="login.php">Login</a>

<?php } ?>

  </div>
</div>


</nav>


</header>




<!-- SOCIAL ICONS -->
<div class="social-bar">
    <a href="https://www.facebook.com/BestArtInteriorDesign"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.linkedin.com/in/bestart-interior-design-720054281"><i class="fab fa-linkedin-in"></i></a>
    <a href="https://www.instagram.com/bestart_interior_design"><i class="fab fa-instagram"></i></a>
    <a href="https://wa.me/919876453585" target="_blank">
  <i class="fab fa-whatsapp"></i>
</a>
</div>

<!-- HERO SECTION -->
<section class="hero" id="home">
    
    <div class="hero-slider">

        <!-- Slide 1 -->
        
        <div class="slide active" style="background-image: url('images/service2.jpeg');">
            <div class="overlay"></div>
            <div class="content">
                <h1>Creating <span>Emotion</span></h1>
                <h2>Through Beautiful Interiors</h2>
                <a href="projects.php" class="btn">View Projects</a>
            </div>
        </div>
        
        <!-- Slide 2 -->
       <div class="slide" style="background-image: url('images/service1.jpg');">
            <div class="overlay"></div>
            <div class="content">
                <h1>100% <span>Customised</span></h1>
                <h2>Kitchen | Bedroom | Living | Dining</h2>
                <a href="pack.html" class="price-btn">Starting at 50k*</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide" style="background-image: url('images/service3.jpg');">
            <div class="overlay"></div>
            <div class="content">
                <h1>Luxury <span>3D Designs</span></h1>
                <h2>Modern & Elegant Concepts</h2>
                <a href="full-home.php" class="btn">Free Estimate</a>
            </div>
        </div>

    </div>

    <!-- Dots -->
    <div class="slider-dots">
        <span class="dot active" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>

</section>


<!-- ABOUT SECTION -->
<section class="about-section" id="about">
    <div class="about-container">

        <!-- LEFT IMAGE -->
        <div class="about-image">
            <img src="images/about.jpg" alt="Interior Design">

            <!-- QUOTE CARD -->
            <div class="quote-card">
    <p>
        BestArt completely transformed our office space into a modern and functional environment.
        Their attention to detail and design expertise exceeded our expectations.
    </p>

    <div class="author">
        <img src="images/user.jpg" alt="Interior Designer">
        <div>
            <h4>Emily Roberts</h4>
            <span>Founder & CEO, CreativeSpaces</span>
        </div>
    </div>
</div>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="about-content">
      <div class="about-header">
    <h2><span>About</span> Us</h2>
    <p>
        Rooted in design and driven by passion, we create timeless
        interiors that blend functionality with artistic elegance.
    </p>
</div>


            <p class="desc">
BestArt is a modern interior design platform that helps users visualize, plan,
and estimate interior designs digitally.  
Our goal is to simplify interior planning using 3D designs, smart room selection,
and transparent cost estimation.
</p>


            <!-- FEATURES -->
            <div class="features">
                <ul>
  <li>Helps users visualize interiors before construction</li>
  <li>Saves time & cost using digital planning</li>
  <li>Easy room-wise and style-wise selection</li>
</ul>

            </div>

            <!-- STATS -->
            <div class="stats">
    <div>
        <h3 class="counter" data-target="10">0</h3>
        <span>EXPERIENCE</span>
    </div>
    <div>
        <h3 class="counter" data-target="120">0</h3>
        <span>PROJECT</span>
    </div>
    <div>
        <h3 class="counter" data-target="98">0</h3>
        <span>SATISFACTION</span>
    </div>
</div>
       <a href="about.html" class="read-more-btn">Read More</a>

        </div>

    </div>
</section>


<!-- ------------------ SERVICES SECTION ------------------ -->

<section class="services" id="services">

    <div class="services-header">
    <h2><span>Our</span> Services</h2>
    <p>Premium architectural & interior solutions crafted with creativity and precision</p>
</div>


    <div class="services-grid">

    <a href="kitchen.html" class="service-card kitchen">
        <img src="images/k5.jpg" alt="Kitchen">
        <h2>KITCHEN</h2>
    </a>

    <a href="dining.html" class="service-card dining">
        <img src="images/service2.jpeg" alt="Dining">
        <h2>DINING</h2>
    </a>

    <div class="bottom-split">

        <a href="bedroom.html" class="service-card">
            <img src="images/b2.jpg" alt="Bedroom">
            <h2>BEDROOM</h2>
        </a>

        <a href="living.html" class="service-card">
            <img src="images/service3.jpg" alt="Living">
            <h2>LIVING</h2>
        </a>

    </div>

</div>

<div class="services-btn">
  <button class="primary-btn" onclick="openPopup()">
    ✨ Talk to Our Design Consultant
  </button>
</div>

<!-- POPUP -->
<div id="consultPopup" class="popup">
  <div class="popup-box">

    <span class="close-icon" onclick="closePopup()">×</span>

    <h2>Let's Design Your Dream Space</h2>
    <p>Our expert consultant will guide you with the best interior solutions.</p>

    <button class="whatsapp-btn" onclick="sendWhatsApp()">
      Chat on WhatsApp
    </button>

  </div>
</div>

</section>



<!----------Customize Section ---------->

<section class="customize-section" id="customize">
  <div class="container">

  <div class="services-header">
    <h2>Customize <span>Your Space</span></h2>
    <p>Enter your room size and choose the type of space to explore custom designs.</p>
  </div>
   <div class="customize-box">
  <input type="number" id="width" placeholder="Width (ft)" min="1" step="0.1">
  <input type="number" id="height" placeholder="Height (ft)" min="1" step="0.1">
  <button onclick="showRoomOptions()">Explore Designs</button>
</div>

    <!-- Room Type Options -->
   <div class="room-options" id="roomOptions">
  <button onclick="showDesigns('living')">Living Room</button>
  <button onclick="showDesigns('kitchen')">Kitchen</button>
  <button onclick="showDesigns('office')">Office</button>
  <button onclick="showDesigns('fullhouse')">Full House</button>
</div>

    <div id="priceEstimate" class="price-box"></div>
    <!-- Design Results -->
    <div class="design-results" id="designResults"></div>
  </div>
</section>


<!----------- GALLERY SECTION ---------->

<section class="gallery-modern" id="gallery">

  <div class="gallery-header">
    <h2><span>3D</span> Gallery</h2>
    <p>Explore our premium interior concepts crafted with passion & precision</p>
</div>


 <div class="gallery-filter-wrapper">
  <div class="gallery-filter">
    <div class="filter-indicator"></div>

    
    <button data-filter="living">Living</button>
    <button data-filter="bedroom">Bedroom</button>
    <button data-filter="kitchen">Kitchen</button>
    <button data-filter="office">Office</button>
  </div>
</div>


  <div class="gallery-grid">

<!-- ================= LIVING ROOM ================= -->

  <div class="gallery-card living" data-link="living1.php">

    <img src="images/service1.jpg" alt="">
    <span class="category">Living</span>
    <div class="card-content">
      <h4>Modern Living Room</h4>
      <p>Open concept layout with warm lighting and luxury sofas.</p>
    </div>
  </div>

  <div class="gallery-card living" data-link="living2.php">

    <img src="images/service2.jpeg" alt="">
    <span class="category">Living</span>
    <div class="card-content">
      <h4>Luxury Lounge</h4>
      <p>Premium marble flooring with designer ceiling lights.</p>
    </div>
  </div>

  <div class="gallery-card living" data-link="living3.php">

    <img src="images/service3.jpg" alt="">
    <span class="category">Living</span>
    <div class="card-content">
      <h4>Minimal Living Space</h4>
      <p>Neutral palette with elegant furniture arrangement.</p>
    </div>
  </div>

  <div class="gallery-card living" data-link="living4.php">

    <img src="images/about.jpg" alt="">
    <span class="category">Living</span>
    <div class="card-content">
      <h4>Contemporary Hall</h4>
      <p>Modern textures with smart lighting integration.</p>
    </div>
  </div>


  <!-- ================= BEDROOM ================= -->

  <div class="gallery-card bedroom" data-link="bedroom1.php">
    <img src="images/b1.jpg" alt="">
    <span class="category">Bedroom</span>
    <div class="card-content">
      <h4>Minimal Bedroom</h4>
      <p>Soft lighting and calming color tones for relaxation.</p>
    </div>
  </div>

  <div class="gallery-card bedroom" data-link="bedroom2.php">
    <img src="images/b2.jpg" alt="">
    <span class="category">Bedroom</span>
    <div class="card-content">
      <h4>Luxury Master Suite</h4>
      <p>Premium fabrics and elegant wall paneling design.</p>
    </div>
  </div>

  <div class="gallery-card bedroom" data-link="bedroom3.php">
    <img src="images/b3.jpg" alt="">
    <span class="category">Bedroom</span>
    <div class="card-content">
      <h4>Classic Bedroom</h4>
      <p>Timeless wooden finish with rich interior textures.</p>
    </div>
  </div>

  <div class="gallery-card bedroom" data-link="bedroom4.php">
    <img src="images/b4.jpg" alt="">
    <span class="category">Bedroom</span>
    <div class="card-content">
      <h4>Modern Grey Bedroom</h4>
      <p>Elegant grey theme with ambient side lighting.</p>
    </div>
  </div>


  <!-- ================= KITCHEN ================= -->

  <div class="gallery-card kitchen" data-link="kitchen1.php">
    <img src="images/k1.jpg" alt="">
    <span class="category">Kitchen</span>
    <div class="card-content">
      <h4>Smart Modular Kitchen</h4>
      <p>Functional storage with premium finish cabinets.</p>
    </div>
  </div>

  <div class="gallery-card kitchen" data-link="kitchen2.php">
    <img src="images/k2.jpg" alt="">
    <span class="category">Kitchen</span>
    <div class="card-content">
      <h4>Luxury Marble Kitchen</h4>
      <p>Elegant marble countertops with LED strip lighting.</p>
    </div>
  </div>

  <div class="gallery-card kitchen" data-link="kitchen3.php">
    <img src="images/k3.jpg" alt="">
    <span class="category">Kitchen</span>
    <div class="card-content">
      <h4>Minimal White Kitchen</h4>
      <p>Clean white palette with smart organization system.</p>
    </div>
  </div>

  <div class="gallery-card kitchen" data-link="kitchen4.php">
    <img src="images/k4.jpg" alt="">
    <span class="category">Kitchen</span>
    <div class="card-content">
      <h4>Contemporary Kitchen</h4>
      <p>Modern layout designed for comfort & efficiency.</p>
    </div>
  </div>


  <!-- ================= OFFICE ================= -->

  <div class="gallery-card office" data-link="office1.php">
    <img src="images/o1.jpg" alt="">
    <span class="category">Office</span>
    <div class="card-content">
      <h4>Corporate Office</h4>
      <p>Professional interior with ergonomic furniture setup.</p>
    </div>
  </div>

  <div class="gallery-card office" data-link="office2.php">
    <img src="images/o2.jpg" alt="">
    <span class="category">Office</span>
    <div class="card-content">
      <h4>Modern Workspace</h4>
      <p>Creative layout with natural lighting design.</p>
    </div>
  </div>

  <div class="gallery-card office" data-link="office3.php">
    <img src="images/o3.jpg" alt="">
    <span class="category">Office</span>
    <div class="card-content">
      <h4>Executive Cabin</h4>
      <p>Luxury executive seating with wooden panel design.</p>
    </div>
  </div>

  <div class="gallery-card office" data-link="office4.php">
    <img src="images/service1.jpg" alt="">
    <span class="category">Office</span>
    <div class="card-content">
      <h4>Creative Studio</h4>
      <p>Modern open workspace for productivity & collaboration.</p>
    </div>
  </div>

</div>
</section>



<!------------------ WHY CHOOSE US ------------------->

<section class="why-choose-modern">

    <div class="why-header">
        <h2>
            WHY <span>CHOOSE</span> US
        </h2>
        <p>Transforming Spaces, Elevating Lifestyles</p>
    </div>

    <div class="why-grid">

        <div class="why-card">
            <div class="icon"><i class="fas fa-paint-roller"></i></div>
            <h3>Innovative Designs</h3>
            <p>Custom interiors that reflect your personality and style.</p>
        </div>

        <div class="why-card">
            <div class="icon"><i class="fas fa-users"></i></div>
            <h3>Expert Team</h3>
            <p>2000+ designers and project managers with years of experience.</p>
        </div>

        <div class="why-card">
            <div class="icon"><i class="fas fa-search"></i></div>
            <h3>Attention to Detail</h3>
            <p>146 quality checks to ensure every detail is perfect.</p>
        </div>

        <div class="why-card">
            <div class="icon"><i class="fas fa-clock"></i></div>
            <h3>Timely Delivery</h3>
            <p>Move into your dream space in just 45 days.</p>
        </div>

        <div class="why-card">
            <div class="icon"><i class="fas fa-leaf"></i></div>
            <h3>Sustainable Choices</h3>
            <p>Eco-friendly materials for beautiful and responsible designs.</p>
        </div>

        <div class="why-card">
            <div class="icon"><i class="fas fa-handshake"></i></div>
            <h3>Customer Satisfaction</h3>
            <p>100,000+ happy homes across 100+ cities worldwide.</p>
        </div>

    </div>

</section>




<!------------------ PACKAGES SECTION ------------------->
<section class="packages" id="pack">
    <div class="section-header">
        <h2>PACKAGE <span>OFFERS</span></h2>
        <p>Choose the perfect package for your interior needs</p>
    </div>

    <div class="package-container">

        <!-- Card 1 -->
        <div class="package-card" onclick="openPopup('Essential Package','Essential woodwork for 2BHK homes including kitchen, wardrobe and storage units.')">
            <img src="images/k5.jpg">
            <div class="package-details">
                <h3>EVERYTHING ESSENTIAL</h3>
                <p><span class="old-price">₹20k</span> ₹15.50k*</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="package-card" onclick="openPopup('Eleganza Classic','Premium interior woodwork for 3BHK homes with modern finish and storage solutions.')">
            <img src="images/b4.jpg">
            <div class="package-details">
                <h3>ELEGANZA CLASSIC</h3>
                <p><span class="old-price">₹55.84k</span> ₹30.41k*</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="package-card" onclick="openPopup('Eleganza Plus','Complete interior solution with wardrobes, modular kitchen, and décor enhancements.')">
            <img src="images/k2.jpg">
            <div class="package-details">
                <h3>ELEGANZA PLUS</h3>
                <p><span class="old-price">₹1.03L</span> ₹50.82k*</p>
            </div>
        </div>

    </div>
</section>


<!-- POPUP MODAL -->
<div class="popup" id="packagePopup">
    <div class="popup-box">
        <span class="close-btn" onclick="closePopup()">✕</span>
        <h2 id="popupTitle"></h2>
        <p id="popupDesc"></p>
        <button class="popup-btn">Book Consultation</button>
    </div>
</div>



<!------------------ ESTIMATE SECTION ------------------->

<section class="estimate-section" id="estimate">

    <div class="estimate-header">
        <h2>
            Get the estimate for your 
            <span id="estimate-text">Wardrobe</span>
        </h2>
        <p>Calculate the approximate cost of doing up your home interiors</p>
    </div>

    <div class="estimate-grid">

        <!-- Card 1 -->
        <div class="estimate-card">

            <!-- Calculator Icon Link -->
            <a href="full-home.php" class="calc-icon">
                <i class="fas fa-calculator"></i>
            </a>

            <!-- Main Icon -->
            <div class="card-icon">
                <i class="fas fa-home"></i>
            </div>

            <h3>Full Home Interior</h3>
            <p>Know the estimate price for your full home interiors</p>

            <!-- Button Link -->
            <a href="full-home.php" class="estimate-btn">
                CALCULATE <i class="fas fa-chevron-right"></i>
            </a>

        </div>

        <!-- Card 2 -->
        <div class="estimate-card">

            <a href="layout.php" class="calc-icon">
                <i class="fas fa-calculator"></i>
            </a>

            <div class="card-icon">
                <i class="fas fa-utensils"></i>
            </div>

            <h3>Kitchen</h3>
            <p>Get an approximate costing for your kitchen interior.</p>

            <a href="layout.php" class="estimate-btn">
                CALCULATE <i class="fas fa-chevron-right"></i>
            </a>

        </div>

        <!-- Card 3 -->
        <div class="estimate-card">

            <a href="wardrobe.php" class="calc-icon">
                <i class="fas fa-calculator"></i>
            </a>

            <div class="card-icon">
                <i class="fas fa-door-closed"></i>
            </div>

            <h3>Wardrobe</h3>
            <p>Our estimate for your dream wardrobe</p>

            <a href="wardrobe.php" class="estimate-btn">
                CALCULATE <i class="fas fa-chevron-right"></i>
            </a>

        </div>

    </div>

</section>



<!--------------contact us ------------------->
<section class="contact-cta" id="contact">

    <div class="contact-overlay">
        <div class="contact-content">
            <h2>Let’s Design Your Dream Space</h2>
            <p>
                Ready to transform your home interiors?  
                Get in touch with our experts today and receive a personalized consultation.
            </p>

            <a href="contact.html" class="contact-btn">
                CONTACT US
            </a>
        </div>
    </div>

</section>



<!--------------- project completion ------------------->

<section class="project-completion">

    <div class="project-header">
        <h2>PROJECT COMPLETION IN <span>40 WORKING DAYS*</span></h2>
    </div>

    <div class="project-steps">

        <div class="step">
            <div class="circle"><i class="fas fa-users"></i></div>
            <p>Talk to our Interior Designer<br>& Get an Estimate</p>
        </div>

        <div class="arrow">→</div>

        <div class="step">
            <div class="circle"><i class="fas fa-file-signature"></i></div>
            <p>Detailed Drawing<br>and Approval</p>
        </div>

        <div class="arrow">→</div>

        <div class="step">
            <div class="circle"><i class="fas fa-industry"></i></div>
            <p>Production at Own<br>Factories</p>
        </div>

        <div class="arrow">→</div>

        <div class="step">
            <div class="circle"><i class="fas fa-truck"></i></div>
            <p>Material Delivery<br>& Execution</p>
        </div>

        <div class="arrow">→</div>

        <div class="step">
            <div class="circle"><i class="fa-regular fa-handshake"></i></div>
            <p>On Time Project<br>Hand Over</p>
        </div>

    </div>

</section>


<!------------Modern Review Section------------>
<section class="reviews" id="reviews">
    <div class="reviews-header">
        <h2>
            WHAT OUR <span>CLIENTS SAY</span>
        </h2>
        <p>Real feedback from our valued customers</p>
    </div>

    <div class="reviews-grid">

        <!-- Review 1 -->
        <div class="review-card">
            <p>
                "BestArt transformed my living room into a stunning space. The design team was professional and attentive to my needs. Highly recommend!"
            </p>
            <div class="reviewer">
                <img src="images/user.jpg" alt="Reviewer">
                <div>
                    <h4>Emily R.</h4>
                    <span>Homeowner</span>
                </div>
            </div>
        </div>

        <!-- Review 2 -->
        <div class="review-card">
            <p>
                "The 3D designs provided by BestArt helped me visualize my dream kitchen perfectly. The execution was flawless and on time."
            </p>
            <div class="reviewer">
                <img src="images/user3.png" alt="Reviewer">
                <div>
                    <h4>Michael S.</h4>
                    <span>Client</span>
                </div>
            </div>
        </div>

        <!-- Review 3 -->
        <div class="review-card">
            <p>
                "I am extremely satisfied with the interior design services from BestArt. The team was creative, responsive, and delivered exactly what I wanted."
            </p>
            <div class="reviewer">
                <img src="images/user.jpg" alt="Reviewer">
                <div>
                    <h4>Sophia L.</h4>
                    <span>Homeowner</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!------------------ FOOTER ------------------>
<footer class="footer">

  <div class="footer-container">

    <!-- Column 1 -->
    <div class="footer-col">
      <h3>About Company</h3>
      <p class="footer-about">
        We create modern and luxurious interior spaces designed to reflect
        your lifestyle and personality.
      </p>
    </div>

    <!-- Column 2 -->
    <div class="footer-col">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="privacy.html">Privacy Policy</a></li>
        <li><a href="terms.html">Terms & Conditions</a></li>
      </ul>
    </div>

    <!-- Column 3 -->
    <div class="footer-col">
      <h3>Contact Info</h3>
      <ul>
        <li><i class="fas fa-envelope"></i> A_username@gmail.com</li>
        <li><i class="fas fa-phone"></i> +95 922 902 539</li>
        <li><i class="fas fa-map-marker-alt"></i> Garden Town Punjab</li>
      </ul>
    </div>

    <!-- Column 4 -->
    <div class="footer-col">
      <h3>Follow Us</h3>
      <div class="social-icons">
  <a href="https://www.facebook.com/yourpage" target="_blank">
    <i class="fab fa-facebook-f"></i>
  </a>

  <a href="https://www.instagram.com/yourusername" target="_blank">
    <i class="fab fa-instagram"></i>
  </a>

  <a href="https://www.linkedin.com/company/yourcompany" target="_blank">
    <i class="fab fa-linkedin-in"></i>
  </a>

  <a href="https://twitter.com/yourusername" target="_blank">
    <i class="fab fa-twitter"></i>
  </a>
</div>

    </div>

  </div>

  <div class="footer-bottom">
    © <span id="year"></span> Best Art | All Rights Reserved.
  </div>

</footer>


<script src="index.js"></script>

</body>
</html>
