<?php
// Error reporting on karein taaki galti turant dikhe
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serviplus";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic Form Fields
    $name     = $_POST['name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $phone    = $_POST['phone'] ?? '';
    $address  = $_POST['address'] ?? '';
    $service  = $_POST['service'] ?? '';
    $urgency  = $_POST['urgency'] ?? '';
    $message  = $_POST['message'] ?? '';

    // 🆕 Naye Fields (Hidden Inputs se)
    $price    = (!empty($_POST['total_price'])) ? $_POST['total_price'] : 0.00;
    $lat      = $_POST['latitude'] ?? '';
    $lon      = $_POST['longitude'] ?? '';

    // Validation
    if (empty($name) || empty($phone) || empty($service)) {
        die("⚠️ Required fields (Name, Phone, Service) are missing!");
    }

    // 4. Query Update (10 columns: added total_price, latitude, longitude)
    // Table name 'plumber' check kar lein, ya fir 'plumber_bookings' jo bhi aapne rakha ho
    $sql = "INSERT INTO plumber (name, email, phone, address, service, urgency, message, total_price, latitude, longitude) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    // "sssssssdss" -> 7 strings, 1 decimal/double (price), 2 strings (lat/lon)
    $stmt->bind_param("sssssssdss", 
        $name, $email, $phone, $address, $service, $urgency, $message, $price, $lat, $lon
    );

    if ($stmt->execute()) {
        header("Location: full-suces-submit.html");
        exit;
    } else {
        echo "<h2>Something went wrong in Database: " . $stmt->error . "</h2>";
    }

    $stmt->close();
} else {
    echo "⚠️ Form not submitted correctly!";
}

$conn->close();
?>