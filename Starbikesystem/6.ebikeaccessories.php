
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Starbike Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/starbike.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="css/stardesign.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  padding: 40px;
}

.product-card {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
  text-align: center;
  padding: 20px;
  transition: 0.3s ease-in-out;
}

.product-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 5px;
}

.product-card h2 {
  font-size: 18px;
  margin: 10px 0;
}

.product-card .price {
  font-size: 20px;
  color: #e60000;
  font-weight: bold;
}

.product-card .discount {
  text-decoration: line-through;
  color: #999;
  font-size: 14px;
  margin-left: 8px;
}

.product-card .rating {
  margin-top: 5px;
  color: #ffc107;
  font-size: 14px;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
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

<section class="product-grid">
    <!-- E-Bike Helmet -->
    <div class="product-card">
      <img src="img/helmet3.jpg" alt="E-Bike Helmet">
      <h2>E-Bike Helmet</h2>
      <p class="price">₱1,199 <span class="discount">₱1,399</span></p>
      <p class="rating"><i class="fas fa-star"></i> 4.6 (88)</p>
    </div>

    <!-- E-Bike Gloves -->
    <div class="product-card">
      <img src="img/gloves3.jpg" alt="E-Bike Gloves">
      <h2>E-Bike Gloves</h2>
      <p class="price">₱399 <span class="discount">₱499</span></p>
      <p class="rating"><i class="fas fa-star"></i> 4.4 (62)</p>
    </div>

    <!-- Knee Guards -->
    <div class="product-card">
      <img src="img/knee3.jpg" alt="Knee Guards">
      <h2>Knee Guards</h2>
      <p class="price">₱699 <span class="discount">₱799</span></p>
      <p class="rating"><i class="fas fa-star"></i> 4.5 (78)</p>
    </div>

    <!-- Body Armor -->
    <div class="product-card">
      <img src="img/bodyarm3.jpg" alt="E-Bike Body Armor">
      <h2>Body Protection</h2>
      <p class="price">₱2,199 <span class="discount">₱2,499</span></p>
      <p class="rating"><i class="fas fa-star"></i> 4.7 (91)</p>
    </div>
  </section>

</main>
</body>
</html>
