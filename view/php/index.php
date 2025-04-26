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

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(['message' => 'Login successful']);
} else {
    echo json_encode(['message' => 'Invalid email or password']);
}

$conn->close();
?>
