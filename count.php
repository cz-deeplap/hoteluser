<?php
include_once('../connect.php');

function getCount($conn, $sql) {
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Get count of standard rooms with status 'ว่าง'
$sql = "SELECT COUNT(*) AS count FROM rooms WHERE rmtype = 'standard' AND status = 'ว่าง'";
$standardCount = getCount($conn, $sql);

// Get count of sweet rooms with status 'ว่าง'
$sql = "SELECT COUNT(*) AS count FROM rooms WHERE rmtype = 'sweet' AND status = 'ว่าง'";
$sweetCount = getCount($conn, $sql);

// Get count of VIP rooms with status 'ว่าง'
$sql = "SELECT COUNT(*) AS count FROM rooms WHERE rmtype = 'vip' AND status = 'ว่าง'";
$vipCount = getCount($conn, $sql);

?>
