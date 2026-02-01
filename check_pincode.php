<?php
header('Content-Type: application/json');
$host = "localhost"; $dbname = "serviplus"; $dbuser = "root"; $dbpass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    
    $pincode = $_GET['pincode'] ?? '';
    $lat = $_GET['lat'] ?? '';
    $lng = $_GET['lng'] ?? '';

    if (!empty($lat) && !empty($lng)) {
        // COORDINATE SEARCH: 10 KM Radius mein experts dhoondhna
        $sql = "SELECT id, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance 
                FROM employer WHERE is_online = 1 HAVING distance < 10 ORDER BY distance LIMIT 5";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lat, $lng, $lat]);
    } else {
        // PINCODE SEARCH: Normal matching
        $stmt = $pdo->prepare("SELECT id FROM employer WHERE pincode = ? AND is_online = 1");
        $stmt->execute([$pincode]);
    }

    $experts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($experts) > 0) {
        echo json_encode(['available' => true, 'count' => count($experts)]);
    } else {
        echo json_encode(['available' => false, 'message' => 'No experts nearby.']);
    }
} catch (Exception $e) {
    echo json_encode(['available' => false, 'message' => $e->getMessage()]);
}
?>