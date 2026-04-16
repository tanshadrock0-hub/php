<?php
$conn = new mysqli("127.0.0.1", "root", "", "cv_database");

$sql = "SELECT * FROM contacts ORDER BY id DESC";
$result = $conn->query($sql);

$contacts = [];

while ($row = $result->fetch_assoc()) {
 $contacts[] = $row;
}

echo json_encode($contacts);
?>