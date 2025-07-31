
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
  .sidebar h3{
    margin-bottom: 5px;
  }
 .container {
  display: flex;
}

.sidebar {
  width: 280px;
  height: 950px;
  background: white;
  padding: 20px;
  border-right: 1px solid #ddd;
}

.search-bar {
  display: flex;
  margin-bottom: 20px;
}

.search-bar input {
  flex: 1;
  border: 1px solid #ccc;
  border-radius: 4px 0 0 4px;
}

.search-bar button {
  padding: 8px 12px;
  background: black;
  color: white;
  border: none;
  border-radius: 0 4px 4px 0;
}

.category-list {
  list-style: none;
  padding-left: 0;
}

.category-list li {
  margin-bottom: 10px;
}

.category-list a {
  color: #0a1d4e;
  text-decoration: none;
  font-weight: 500;
}

.shop-content {
  flex: 1;
  padding: 30px;
}

.shop-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

.shop-header h2 {
  font-size: 24px;
}

.sort-box {
  display: flex;
  align-items: center;
  gap: 20px;
}

.sort-box select {
  padding: 6px 10px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 30px;
}

.product-card {
  background: white;
  padding: 15px;
  text-align: center;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  transition: 0.3s;
}

.product-card:hover {
  transform: translateY(-4px);
}

.product-card img {
  width: 100%;
  height: 180px;
  object-fit: contain;
  margin-bottom: 10px;
}

.product-type {
  font-size: 14px;
  color: gray;
  margin-bottom: 5px;
}

.product-name {
  font-size: 16px;
  color: #0a1d4e;
  font-weight: bold;
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

<div class="container">

  <!-- Sidebar -->
  <aside class="sidebar">
    <form class="search-bar">
      <input type="text" placeholder="Search products..." />
      <button><i class="fas fa-search"></i></button>
    </form>

    <h3>Categories:</h3>
    <ul class="category-list">
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;Motorcycle:</h3>
      <li><a href="2.motorunits.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Units (4)</a>
      <li><a href="1.motoraccessories.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories (4)</a></li>

      <h3>&nbsp;&nbsp;&nbsp;&nbsp;Bicycle:</h3>
      <li><a href="3.bikeunits.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Units (4)</a></li>
      <li><a href="4.bikeaccessories.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories (4)</a></li>
      <li><a href="5.bikeparts.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parts (4)</a></li>

      <h3>&nbsp;&nbsp;&nbsp;&nbsp;E-Bike:</h3>
      <li><a href="6.ebikeaccessories.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories (4)</a></li>
      <li><a href="7.ebikeunits.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Units (4)</a></li>

      <!-- Add more categories as needed -->
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="shop-content">
    <div class="shop-header">
      <h2>Starbike Shop</h2>
      <div class="sort-box">
        <span>Showing all 8 results</span>
        <select>
          <option>Default sorting</option>
          <option>Sort by price</option>
          <option>Sort by rating</option>
        </select>
      </div>
    </div>

    <div class="product-grid">
      <!-- Product Card 
       
      <div class="product-card">
        <img src="img/helmet.jpg" alt="Helmet">
        <p class="product-type">Full face</p>
        <h4 class="product-name">Nutshells Cyclone</h4>
      </div>-->

      <!-- Add more cards as needed -->
    </div>
  </main>

</div>

</main>
</body>
</html>
