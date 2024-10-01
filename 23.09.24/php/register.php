<?php
session_start();
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $query->bind_param('ss', $username, $hashed_password);
    
    if ($query->execute()) {
        $_SESSION['user_id'] = $conn->insert_id;
        header('Location: ../index.php');
        exit;
    } else {
        $error = 'Rejestracja nie powiodła się';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <div class="register-container">
        <form action="register.php" method="post">
            <h2>Rejestracja</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Zarejestruj</button>
        </form>
    </div>
</body>
</html>