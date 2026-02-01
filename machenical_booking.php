<?php
$host = "localhost";
$username = "root";      // change if using live server
$password = "";          // change if using live server
$database = "serviplus";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic Details
    $full_name      = $_POST['name'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $bike_model     = $_POST['bike'];
    $city           = $_POST['city'];
    $address        = $_POST['full_address'];
    $country        = $_POST['country'];
    $service_type   = $_POST['service']; // HTML select name="service"
    $preferred_date = $_POST['date'];
    $notes          = $_POST['notes'];

    // 🆕 Naye Fields (Price aur Location)
    // Inhe isset se check karna zaroori hai taaki error na aaye
    $total_price    = isset($_POST['total_price']) ? $_POST['total_price'] : 0.00;
    $latitude       = isset($_POST['latitude']) ? $_POST['latitude'] : NULL;
    $longitude      = isset($_POST['longitude']) ? $_POST['longitude'] : NULL;

    // SQL Query: 13 columns total
    $sql = "INSERT INTO machenical_booking 
            (full_name, email, phone, bike_model, city, address, country, service_type, preferred_date, notes, total_price, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Bind Parameters 
    // "ssssssssss d d d" -> 10 Strings, 1 Double/Decimal (price), 2 Doubles (lat/long)
    // Agar coordinates empty hain toh 's' (string) ya 'd' (double) handle ho jayenge
    $stmt->bind_param("ssssssssssdss", 
        $full_name, 
        $email, 
        $phone, 
        $bike_model, 
        $city, 
        $address, 
        $country, 
        $service_type, 
        $preferred_date, 
        $notes, 
        $total_price, 
        $latitude, 
        $longitude
    );

    // ✅ Redirect on success, show error otherwise
    if ($stmt->execute()) {
        header("Location: full-suces-submit.html");
        exit;
    } else {
        echo "<h2>Something went wrong in Database: " . $stmt->error . "</h2>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>