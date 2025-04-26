<?php
header('Content-Type: application/json');

$host = 'localhost';
$db   = 'login_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo json_encode(['message' => 'Database connection failed']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$email = $conn->real_escape_string($data['email']);
$password = $conn->real_escape_string($data['password']);

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Login data saved successfully']);
} else {
    echo json_encode(['message' => 'Failed to save login data']);
}

$conn->close();
?>