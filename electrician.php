<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "serviplus";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name'])) {
    // Basic Fields
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $service  = $_POST['service'];
    $date     = $_POST['date'];
    $time     = $_POST['time'];
    $message  = $_POST['message'] ?? '';
    
    // 🔥 Inko dhyan se dekhiye: Agar form se data nahi aaya toh default value set hogi
    $price    = (!empty($_POST['total_price'])) ? $_POST['total_price'] : 0.00;
    $lat      = (!empty($_POST['latitude'])) ? $_POST['latitude'] : '0.0000';
    $lon      = (!empty($_POST['longitude'])) ? $_POST['longitude'] : '0.0000';

    // SQL Query
    $sql = "INSERT INTO electrician_bookings 
            (name, email, phone, address, service_type, preferred_date, preferred_time, additional_details, total_price, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query Prepare Error (Check Column Names): " . $conn->error);
    }

    // "ssssssssdss" -> d is for double (price), s for strings
    $stmt->bind_param("ssssssssdss", 
        $name, $email, $phone, $address, $service, $date, $time, $message, $price, $lat, $lon
    );

    if ($stmt->execute()) {
        header("Location: full-suces-submit.html");
        exit;
    } else {
        die("Execution Error: " . $stmt->error);
    }
} else {
    echo "No Data Received.";
}
?>