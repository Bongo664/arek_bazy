<?php
$host = 'localhost';
$dbname = 'mojsklepik';
$user = 'root';
$password = '';

$polaczenie = new mysqli($host, $user, $password, $dbname);
if ($polaczenie->connect_error) {
    die("Błąd połączenia z bazą danych: " . $polaczenie->connect_error);
}

if (isset($_POST['wyborKategorii'])) {
    $wybranaKategoria = $_POST['wyborKategorii'];
} else {
    $wybranaKategoria = '1';
}


$sql = "SELECT src, opis FROM produkty WHERE kategoria = ?";
$stmt = $polaczenie->prepare($sql);
$stmt->bind_param("s", $wybranaKategoria);
$stmt->execute();
$wynik = $stmt->get_result();

$produkty = [];
while ($row = $wynik->fetch_assoc()) {
    $produkty[] = $row;
}

$stmt->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklepik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #kontener {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        #glowna {
            display: flex;
            flex: 1;
        }
        #menu {
            width: 20%;
            background-color: #444;
            color: white;
            padding: 10px;
        }
        #menu select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        #content {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .produkt {
            text-align: center;
            margin: 10px;
        }
        .produkt img {
            max-width: 200px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="kontener">
        <header>
            <h1>Witamy w naszym sklepiku</h1>
        </header>
        <div id="glowna">
            <div id="menu">
                <h2>Wybierz kategorię</h2>
                <form method="POST">
                    <select name="wyborKategorii" onchange="this.form.submit()">
                        <option value="1" <?php echo $wybranaKategoria === '1' ? 'selected' : ''; ?>>Kategoria 1</option>
                        <option value="2" <?php echo $wybranaKategoria === '2' ? 'selected' : ''; ?>>Kategoria 2</option>
                        <option value="3" <?php echo $wybranaKategoria === '3' ? 'selected' : ''; ?>>Kategoria 3</option>
                    </select>
                </form>
            </div>
            <div id="content">
                <?php foreach ($produkty as $produkt): ?>
                    <div class="produkt">
                        <img src="<?php echo $produkt['src']; ?>" alt="<?php echo $produkt['opis']; ?>">
                        <p><?php echo $produkt['opis']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <footer>
            <p>© 2025 Sklepik - Wszystkie prawa zastrzeżone</p>
        </footer>
    </div>
</body>
</html>
<?php
$polaczenie->close();
?>