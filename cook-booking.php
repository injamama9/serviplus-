<?php
// PHPMailer Namespace ko include karein (File ke sabse upar)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$password = ""; 
$database = "serviplus"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name           = $_POST['name'] ?? '';
    $email          = $_POST['email'] ?? '';
    $phone          = $_POST['phone'] ?? '';
    $district       = $_POST['district'] ?? '';
    $full_address   = $_POST['full_address'] ?? '';
    $country        = $_POST['country'] ?? ''; 
    $service_type   = $_POST['service_type'] ?? ''; 
    $event_date     = $_POST['event-date'] ?? '';
    $guests         = $_POST['guests'] ?? 0;
    $message        = $_POST['message'] ?? '';
    $price          = (!empty($_POST['total_price'])) ? $_POST['total_price'] : 0.00;
    $lat            = $_POST['latitude'] ?? '';
    $lon            = $_POST['longitude'] ?? '';

    // Step 1: Booking Insert Karein
    $sql = "INSERT INTO cook_bookings 
            (name, email, phone, district, full_address, country, service_type, event_date, guests, message, total_price, latitude, longitude) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssisdss", 
        $name, $email, $phone, $district, $full_address, $country, 
        $service_type, $event_date, $guests, $message, $price, $lat, $lon
    );

    if ($stmt->execute()) {
        $booking_id = $conn->insert_id; // Naya Booking ID lein

        // --- 🚀 NOTIFICATION LOGIC START ---
        // 2. District/Pincode aur Category se Employers dhoondhein
        // Note: 'employer' table mein 'service_category' aur 'district' columns hone chahiye
     // --- 🚀 NOTIFICATION LOGIC START ---
// 2. 'pin_code' column use karein jo aapne employer table mein banaya hai
// Ye query customer ke Lat/Lon se 10 KM ke radius mein Employers dhoondhti hai
$emp_sql = "SELECT email, name, 
    ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) 
    * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) 
    * sin( radians( latitude ) ) ) ) AS distance 
    FROM employer 
    WHERE service_category = 'Cook' 
    HAVING distance < 10 
    ORDER BY distance";

$emp_stmt = $conn->prepare($emp_sql);
// Hum 3 baar lat/lon pass karte hain formula calculate karne ke liye
$emp_stmt->bind_param("ddd", $lat, $lon, $lat); 
$emp_stmt->execute();
$result = $emp_stmt->get_result();


        // --- 🚀 NOTIFICATION LOGIC END ---

        header("Location: full-suces-submit.html");
        exit;
    } else {
        echo "<h2>❌ Database Error: " . $stmt->error . "</h2>";
    }
    $stmt->close();
}
$conn->close();
?>