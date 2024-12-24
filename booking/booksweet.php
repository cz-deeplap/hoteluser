<?php

require_once('../count.php');

session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php');
    exit();
}

// Database connection class
class DB_con {
    private $dbcon;

    public function __construct() {
        $conn = mysqli_connect('localhost', 'root', '', 'db_project');
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    public function insertBooking($firstname, $lastname, $phone, $checkin, $checkout, $price, $roomtype, $bankSlipName) {
        $query = "INSERT INTO tb_booking (firstname, lastname, phone, checkin, checkout, price, roomtype, bank_slip) 
                  VALUES ('$firstname', '$lastname', '$phone', '$checkin', '$checkout', '$price', '$roomtype', '$bankSlipName')";
        return mysqli_query($this->dbcon, $query);
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $price = $_POST['price'];
    $roomtype = $_POST['roomtype'];

    // Handle file upload
    $bankSlip = $_FILES['bank_slip'];
    $uploadDir = '../uploads/';  // Upload directory (relative to this file)
    $bankSlipName = basename($bankSlip['name']);  // Only store the file name

    // Check if the uploads directory exists, if not, create it
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create the directory with proper permissions
    }

    // Move the file to the uploads directory
    if (move_uploaded_file($bankSlip['tmp_name'], $uploadDir . $bankSlipName)) {
        // Insert booking data into the database
        $db = new DB_con();
        $result = $db->insertBooking($firstname, $lastname, $phone, $checkin, $checkout, $price, $roomtype, $bankSlipName);

        if ($result) {
            echo "<script>alert('Booking successful!'); window.location.href = '../success.php';</script>";
        } else {
            echo "<script>alert('Error while booking. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload bank slip. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Booking</title>
  <link rel="stylesheet" href="../css/rswt.css">
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="../dashboard.html">Home</a></li>
          <li><a href="../contact.php">Contact</a></li>
          <li><a href="javascript:history.go(-2)">Back</a></li>
          <li><a style="color: #ff5d5d;" href="../logout.php">Logout</a></li>
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
      <h4>Room available <?php echo $sweetCount ?>/20</h4>
      <p>
        Discover the perfect romantic getaway in our Sweet Room, designed for love and intimacy. Experience luxurious amenities, elegant décor, and stunning views, creating the ideal atmosphere for your special moments together. Book now for an unforgettable stay.
      </p>
      <ul class="features">
        <li>✔ Free Wi-Fi</li>
        <li>✔ Car Parking</li>
        <li>✔ Duo Bed</li>
      </ul>
    </div>
  </section>

  <section class="form-section">
    <div class="container-1">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="firstname">First Name:</label>
          <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" required>
        </div>

        <div class="form-group">
          <label for="lastname">Last Name:</label>
          <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" required>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" required>
        </div>

        <div class="form-group">
          <label for="checkin">Check-in Date:</label>
          <input type="date" id="checkin" name="checkin" required>
        </div>

        <div class="form-group">
          <label for="checkout">Check-out Date:</label>
          <input type="date" id="checkout" name="checkout" required>
        </div>

        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" id="price" name="price" readonly>
          <input type="hidden" id="roomtype" name="roomtype" value="sweet" readonly>
        </div>

        <div class="form-group">
          <label for="bank_account">Kasikorn Bank : 11111-1111-111</label><br>
          <label for="bank_account">Name : Adam Mafuck</label><br>
          <label for="bank_slip">Upload Bank Slip:</label>
          <input type="file" id="bank_slip" name="bank_slip" accept="image/*" required>
        </div>

        <button type="submit" class="btn">Confirm Booking</button>
      </form>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
  </footer>
  <script>
  // Function to calculate the price based on the date range
  function calculatePrice() {
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;

    if (checkin && checkout) {
      const checkinDate = new Date(checkin);
      const checkoutDate = new Date(checkout);

      // Calculate the difference in time
      const timeDiff = checkoutDate - checkinDate;
      const dayDiff = timeDiff / (1000 * 3600 * 24); // Convert time difference to days

      if (dayDiff > 0) {
        // Price per day (1500)
        const price = dayDiff * 1500;
        document.getElementById('price').value = price;
      } else {
        document.getElementById('price').value = 0; // Set to 0 if the dates are invalid
      }
    }
  }

  // Add event listeners to the date inputs to recalculate the price
  document.getElementById('checkin').addEventListener('change', calculatePrice);
  document.getElementById('checkout').addEventListener('change', calculatePrice);

  function smoothScrollToForm() {
    const formSection = document.querySelector('.form-section');
    if (formSection) {
      let targetPosition = formSection.offsetTop;  // Get the position of the form section
      let currentPosition = window.pageYOffset;  // Get the current scroll position
      let distance = targetPosition - currentPosition;  // Calculate the distance to scroll
      let step = distance / 100;  // Define how much to scroll per step (more steps = slower scroll)
      
      function scrollStep() {
        currentPosition += step;  // Increment current position by step
        window.scrollTo(0, currentPosition);  // Scroll to the new position
        if ((step > 0 && currentPosition < targetPosition) || (step < 0 && currentPosition > targetPosition)) {
          requestAnimationFrame(scrollStep);  // Continue scrolling until the target is reached
        }
      }
      requestAnimationFrame(scrollStep);  // Start the scrolling animation
    }
  }

  // Scroll to the form section and focus on the first input field when the page loads
  window.onload = function() {
    smoothScrollToForm();  // Trigger the smooth scroll
    document.getElementById('firstname').focus();  // Focus on the first input field
  };
  </script>
</body>
</html>
