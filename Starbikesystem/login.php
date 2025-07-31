<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $errors[] = "Email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];

                    // Redirect based on role
                    if ($user['role'] === 'admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: main.php");
                    }
                    exit;
                } else {
                    $errors[] = "Incorrect password.";
                }
            } else {
                $errors[] = "No account found with that email.";
            }
            $stmt->close();
        } else {
            $errors[] = "Database error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Starbike Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/starbike.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="css/stardesign.css">
  <link rel="stylesheet" href="css/loginform.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
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
      <div class="dropdown">
        <button class="dropdown-btn">SETTING <i class="fas fa-caret-down ml-1"></i></button>
        <div class="dropdown-content">
          <a href="login.php">Login</a>
          <a href="register.php">Register</a>
          <a href="main.php#about">About</a>
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
<main>
  <div class="max-w-screen-xl mx-auto px-4">
  <div class="container">
    <div class="login-box">
        <h2>Login</h2>

        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>
</div>
</main>
</body>
</html>
