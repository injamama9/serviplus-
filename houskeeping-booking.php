<?php
// 1. Database Configuration
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "serviplus"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Form Submission Handle Karein
if (isset($_POST['submit_booking'])) {
    
    // Data Capture
    $first_name     = $_POST['first_name'];
    $last_name      = $_POST['last_name'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $service_type   = $_POST['service_type'];
    $property_size  = $_POST['property_size'];
    $booking_date   = $_POST['booking_date'];
    $booking_time   = $_POST['booking_time'];
    $address        = $_POST['address'];
    $special_notes  = $_POST['special_notes'];

    // 🔥 NAYE FIELDS (Price aur Location)
    $total_price    = isset($_POST['total_price']) ? $_POST['total_price'] : 0.00;
    $latitude       = isset($_POST['latitude']) ? $_POST['latitude'] : NULL;
    $longitude      = isset($_POST['longitude']) ? $_POST['longitude'] : NULL;

    // 3. Database mein Save karein (Using Prepared Statements for Security)
    $sql = "INSERT INTO housekeeping (first_name, last_name, email, phone, service_type, property_size, booking_date, booking_time, address, special_notes, total_price, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    // "ssssssssss dss" -> 10 Strings, 1 Double/Decimal, 2 Strings
    $stmt->bind_param("ssssssssssdss", 
        $first_name, $last_name, $email, $phone, $service_type, 
        $property_size, $booking_date, $booking_time, $address, 
        $special_notes, $total_price, $latitude, $longitude
    );

    if ($stmt->execute()) {
        
        // 4. Email Notification Setup (Optional)
        $to = "mdinjamama9@gmail.com"; 
        $subject = "New Housekeeping Booking: ₹" . $total_price;
        
        $message = "
        <html>
        <head><title>New Booking Details</title></head>
        <body>
            <h2>Booking Details</h2>
            <p><strong>Name:</strong> $first_name $last_name</p>
            <p><strong>Total Price:</strong> ₹$total_price</p>
            <p><strong>Location:</strong> $latitude, $longitude</p>
            <p><strong>Service:</strong> $service_type ($property_size)</p>
            <p><strong>Date/Time:</strong> $booking_date at $booking_time</p>
            <p><strong>Address:</strong> $address</p>
        </body>
        </html>";

        $headers = "MIME-Version: 1.0\r\nContent-type:text/html;charset=UTF-8\r\nFrom: <mdinjamama9@gmail.com>\r\n";
        mail($to, $subject, $message, $headers);

        // Success Redirect
        echo "<script>window.location.href = 'full-suces-submit.html';</script>";
        exit;

    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>