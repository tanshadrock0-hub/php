<?php
$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['name']) || empty($data['email'])) {
    echo json_encode([
        "message" => "Name and email are required"
    ]);
} else {
    echo json_encode([
        "message" => "Thank you " . $data['name'] . "! We received your message."
    ]);
}
?>