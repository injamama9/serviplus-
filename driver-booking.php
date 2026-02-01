<?php
$conn = new mysqli("localhost", "root", "", "serviplus");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data receive karte waqt dhyan rakhein
    $name          = $conn->real_escape_string($_POST['name']);
    $email         = $conn->real_escape_string($_POST['email']); // HTML name="email"
    $phone         = $conn->real_escape_string($_POST['phone']); // HTML name="phone"
    $bike          = $conn->real_escape_string($_POST['bike']);
    $service       = $conn->real_escape_string($_POST['service']);
    $pickup_date   = $conn->real_escape_string($_POST['pickup_date']);
    $pickup_time   = $conn->real_escape_string($_POST['pickup_time']);
    $full_address  = $conn->real_escape_string($_POST['full_address']);
    $total_price   = $_POST['total_price']; // Database column: total_price
    $latitude      = $_POST['latitude'];
    $longitude     = $_POST['longitude'];

    // INSERT Query - Sequence check karein (Column Name aur Variable match hone chahiye)
    $sql = "INSERT INTO driver_bookings 
            (name, email, phone, bike, service, pickup_date, pickup_time, full_address, total_price, latitude, longitude) 
            VALUES 
            ('$name', '$email', '$phone', '$bike', '$service', '$pickup_date', '$pickup_time', '$full_address', '$total_price', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        header("Location: full-suces-submit.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>