<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Starbike Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/starbike.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="css/stardesign.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
  .star-section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 40px;
  max-width: 1400px;
  margin: 0 auto;
  flex-wrap: wrap;
}

.star-text {
  flex: 1 1 45%;
  padding-right: 20px;
}

.star-text h1 {
  font-size: 33px;
  margin-bottom: 15px;
}

.star-text p {
  font-size: 18px;
  margin-bottom: 10px;
  line-height: 1.6;
}

.star-button {
  display: inline-block;
  margin-top: 20px;
  padding: 12px 24px;
  background-color: #000;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.star-button:hover {
  background-color: #333;
}

.star-button span {
  margin-left: 8px;
}

.star-image {
  flex: 1 1 50%;
  text-align: center;
}

.star-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
  .why-starbike {
  background: linear-gradient(to bottom, #c40000, #640000);
  color: white;
  text-align: center;
  padding: 60px 20px;
}

.why-starbike h2 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 10px;
}

.why-starbike .subtitle {
  font-size: 18px;
  margin-bottom: 40px;
}

.features {
  display: flex;
  justify-content: center;
  align-items: stretch;
  gap: 30px;
  flex-wrap: wrap;
}

.feature {
  max-width: 250px;
  flex: 1 1 250px;
}

.feature .icon {
  font-size: 28px;
  margin-bottom: 12px;
  background: white;
  color: #c40000;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  margin: 0 auto 15px auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.feature h3 {
  font-size: 14px;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 10px;
}

.feature p {
  font-size: 14px;
  line-height: 1.5;
}

.divider {
  width: 1px;
  background-color: rgba(255, 255, 255, 0.2);
}
</style>
<body class="bg-gray-100 text-black">

  <!-- Topbar -->
  <header class="topbar">

    <!-- Menus dropdown -->
    <div class="menu-dropdown">
      <div class="dropdown">
        <button class="dropdown-btn">MOTORCYCLE <i class="fas fa-caret-down ml-1"></i></button>
        <div class="dropdown-content">
          <a href="1.motoraccessories.php">Accessories</a>
          <a href="2.motorunits.php">Units</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropdown-btn">BICYCLE <i class="fas fa-caret-down ml-1"></i></button>
        <div class="dropdown-content">
          <a href="3.bikeunits.php">Units</a> 
          <a href="4.bikeaccessories.php">Accessories</a>
          <a href="5.bikeparts.php">Parts</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropdown-btn">E-BIKE <i class="fas fa-caret-down ml-1"></i></button>
        <div class="dropdown-content">
          <a href="6.ebikeaccessories.php">Accessories</a>
          <a href="7.ebikeunits.php">Units</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropdown-btn">SHOP <i class="fas fa-caret-down ml-1"></i></button>
        <div class="dropdown-content">
          <a href="Shop.php">Shop</a>
          <a href="">Latest</a>
        </div>
      </div>

<?php session_start(); ?>
<div class="dropdown">
  <button class="dropdown-btn">SETTING <i class="fas fa-caret-down ml-1"></i></button>
  <div class="dropdown-content">
    <?php if (isset($_SESSION['user'])): ?>
      <a href="profile.php">Profile</a>
      <a href="logout.php">Logout</a>
      <a href="main.php#about">About</a>
    <?php else: ?>
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
      <a href="main.php#about">About</a>
    <?php endif; ?>
  </div>
</div>

    </div>

    <!-- Logo -->
    <div class="logo-container">
      <a href="main.php">
      <img src="img/starbike.png" alt="Starbike Logo" class="logo-img">
      </a>
    </div>

    <!-- Search Bar -->
  <form action="search.php" method="GET" class="relative">
  <input 
    type="search" 
    name="query" 
    placeholder="Search..." 
    class="search-input pl-10 pr-4 py-2"
  />
  <button type="submit" class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-black">
    <i class="fas fa-search"></i>
  </button>
</form>

    <!-- Auth Buttons

    <div class="logreg">
      <a href="login.php" class="auth-btn">Login</a>
      <a href="register.php" class="auth-btn">Register</a>
    </div>

    -->
    
  </header>

  <!-- Main Content -->
<main class="content">
<div class="max-w-screen-xl mx-auto px-4">
<!-- Shop Picture -->
<div class="image-main">
<a href="shop.php">
<img src="img/mainshop.jpg">
<div class="image-text">EXPLORE THE SHOP</div>
</a>
</div>
<!-- -  --  -- IMG 1  --  --  --  --  - -->

 <section class="star-section">
    <div class="star-text">
      <h1>Motorcycle</h1>
      <p>Sometimes you find yourself in the middle of nowhere. And sometimes, in the middle of nowhere, you find yourself</p>
      <a href="2.motorunits.php" class="star-button">RIDE WITH US <span>↗</span></a>
    </div>
    <div class="star-image">
      <img src="img/main1.jpg"/>
    </div>
  </section>
  

<!-- -  --  --  IMG 2 --  --  --  --  - -->
 <div class="section2">
    <div class="section-image2">
      <img src="img/main2.jpg" alt="Electric Motorcycle">
    </div>
    <div class="section-content2">
      <h2>Bicycle</h2>
      <p>
        Push beyond your limits. Every pedal forward is one less excuse. Believe, breathe, and ride toward the greatness inside you.
      </p>
      <button class="btn" onclick="document.location='3.bikeunits.php'">EXPLORE BICYCLE <span>&rarr;</span></button>
    </div>
  </div>

<!-- -  --  -- IMG 3 --  --  --  --  - -->

<section class="star-section">
    <div class="star-text">
      <h1>E-bike</h1>
      <p>Charge up, ride out, and leave nothing behind but tire tracks and a lighter carbon footprint. That’s the e-bike life.</p>
      <a href="7.ebikeunits.php" class="star-button">EXPLORE E-BIKE<span>↗</span></a>
    </div>
    <div class="star-image">
      <img src="img/main3.jpg"/>
    </div>
  </section>

<!-- -  --  --  --  --  --  --  - -->
  <section class="why-starbike">
  <div class="container" id="about">
    <h2>Why Starbike?</h2>
    <p class="subtitle">From our competitive pricing, unbeatable deals, and unmatched customer service – all are available to serve you!</p>
    
    <div class="features">
      <div class="feature">
        <div class="icon"><i class="fas fa-check-circle"></i></div>
        <h3>Trusted & Reliable</h3>
        <p>Dealer of major motorcycle brands<br>for more than 20 years.</p>
      </div>
      
      <div class="divider"></div>

      <div class="feature">
        <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
        <h3>Best Deals For You</h3>
        <p>Top-notch motorcycles at unbeatable<br>prices.</p>
      </div>
      
      <div class="divider"></div>

      <div class="feature">
        <div class="icon"><i class="fas fa-hand-holding-heart"></i></div>
        <h3>Excellent Service</h3>
        <p>Customer care that goes the extra<br>mile.</p>
      </div>
    </div>
  </div>
</section>
<!-- -  --  --  --  --  --  --  - -->

  <div class="cardground2">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-1">
      <a href="2.motorunits.php" class="card">
        <img src="img/logo1.png" alt="Motorcycles" class="card-img2">
        <div class="card-overlay"></div>
      </a>
      <a href="2.motorunits.php" class="card">
        <img src="img/logo2.png" alt="Helmets" class="card-img2">
        <div class="card-overlay"></div>
      </a>
      <a href="2.motorunits.php" class="card">
        <img src="img/logo3.png" alt="Top Box" class="card-img2">
        <div class="card-overlay"></div>
      </a>
      <a href="2.motorunits.php" class="card">
        <img src="img/logo4.png" alt="Bicycle" class="card-img2">
        <div class="card-overlay"></div>
      </a>
    </div>
</div>

<div class="inquiry-container">
  <div class="inquiry-left">
    <h2 class="inquiry-title">Inquiry Form</h2>
    <form class="inquiry-form">
      <input type="text" placeholder="Your name" required>
      <input type="email" placeholder="Your email" required>
      <input type="tel" placeholder="Your Phone Number" required>
      <textarea placeholder="Your message (optional)"></textarea>
      <button type="submit" class="submit-btn">SUBMIT</button>
    </form>
  </div>
  
  <div class="inquiry-right">
    <p><strong>Phone</strong><br>+639853666399</p>
    <p><strong>Email</strong><br>info@starbikeph.com</p>
    <p><strong>Social Media</strong></p>
    <div class="social-icons">
      <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
      <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
    </div>
    <p><strong>Address</strong><br>153 Quirino Avenue, Barangay Baclaran, Parañaque, Philippines</p>
    <div id="leaflet-map" class="leaflet-map"></div>
  </div>
</div>

</main>

<script>
  // Leaflet Map Setup
  var map = L.map('leaflet-map').setView([14.7251, 121.0389], 16); // Baclaran, Parañaque

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  L.marker([14.7251, 121.0389]).addTo(map)
    .bindPopup('Starbike Location')
    .openPopup();
</script>

  <script>
    // Extract query string value
    function getQueryParam(key) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(key);
    }

    window.addEventListener('load', () => {
      const targetId = getQueryParam('scroll');
      if (targetId) {
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
          // Add slight delay to allow full page render (optional)
          setTimeout(() => {
            targetEl.scrollIntoView({ behavior: 'smooth' });
          }, 100);
        }
      }
    });
  </script>

  </div>
</body>
</html>