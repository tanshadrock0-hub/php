<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Connect to database
$conn = new mysqli("127.0.0.1", "root", "", "cv_database");

if ($conn->connect_error) {
    echo json_encode(["message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['name'])) {
    echo json_encode(["message" => "Name is required."]);
    exit();
}

$name = $conn->real_escape_string($data['name']);
$sql = "INSERT INTO contacts (name) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "message" => "Thank you " . $data['name'] . "! Your data has been saved."
    ]);
} else {
    echo json_encode(["message" => "Error saving data."]);
}
?>