<?php
session_start();
if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php'); 
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wiin Phetchaburi</title>
  <link rel="stylesheet" href="../css/rswt.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="../dashboard.html">Home</a></li>
          <li><a href="../contact.html">Contact Us</a></li>
          <li><a style="color: #ff5d5d;"href="../logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <h2>Stylish Simplicity of a Hotel</h2>
      <a href="#rooms" class="btn">Book Now</a>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>Sweet Room</h2>
      <p>
        Discover the perfect romantic getaway in our Sweet Room, designed for love and intimacy. Experience luxurious amenities, elegant décor, and stunning views, creating the ideal atmosphere for your special moments together. Book now for an unforgettable stay.
      </p>
      <ul class="features">
        <li>✔ Free Wi-Fi</li>
        <li>✔ Car Parking</li>
        <li>✔ Duo Bed</li>
        <li>✔ Swimming Pool</li>
      </ul>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
