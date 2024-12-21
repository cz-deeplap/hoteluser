<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";

// สร้างการเชื่อมต่อ MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
