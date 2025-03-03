<?php
$host = 'localhost';
$db = 'chat_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY created_at DESC LIMIT 100";
$result = $conn->query($sql);

$messages = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo htmlspecialchars($row["message"]) . " <small>(" . $row["created_at"] . ")</small>";
        echo "</div>";
    }
}

$conn->close();
?>