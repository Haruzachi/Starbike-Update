<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user']['id'];
$stmt = $conn->prepare("SELECT username, email, role FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "<p class='text-center mt-10'>User not found.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Starbike Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/starbike.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="css/stardesign.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black">

<header class="topbar">
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
        <a href="#">Latest</a>
      </div>
    </div>

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

  <div class="logo-container">
    <a href="main.php">
      <img src="img/starbike.png" alt="Starbike Logo" class="logo-img">
    </a>
  </div>

  <form action="search.php" method="GET" class="relative">
    <input type="search" name="query" placeholder="Search..." class="search-input pl-10 pr-4 py-2" />
    <button type="submit" class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-black">
      <i class="fas fa-search"></i>
    </button>
  </form>
</header>

<main class="content">
  <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">User Profile</h2>
    <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
  </div>
</main>

</body>
</html>