<?php
session_start();
include('config.php'); // Aapki database connection file ka naam yahan likhein

// Check karein ki employer login hai aur coordinates mil rahe hain
if (isset($_SESSION['employer_id']) && isset($_GET['lat']) && isset($_GET['lng'])) {
    
    $emp_id = $_SESSION['employer_id'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    // Employer table mein latitude aur longitude update karein
    $sql = "UPDATE employer SET latitude = ?, longitude = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddi", $lat, $lng, $emp_id);

    if ($stmt->execute()) {
        echo "Location Updated Successfully";
    } else {
        echo "Error updating location";
    }
    
    $stmt->close();
} else {
    echo "Invalid Request";
}
?>