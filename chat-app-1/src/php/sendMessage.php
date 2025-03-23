<?php

$host = 'localhost';
$dbname = 'chat_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Message cannot be empty.']);
        exit;
    }

    $message = $conn->real_escape_string($message);

    $sql = "INSERT INTO messages (message) VALUES ('$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Wiadomość wysłana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>