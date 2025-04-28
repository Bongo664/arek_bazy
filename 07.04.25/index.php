<?php
session_start();

$host = 'localhost';
$nazwa_bazy = 'przedmioty';
$uzytkownik = 'root';
$haslo = '';
$polaczenie = new mysqli($host, $uzytkownik, $haslo, $nazwa_bazy);
if ($polaczenie->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $polaczenie->connect_error);
}

$sql = "SELECT * FROM prze";
$wynik = $polaczenie->query($sql);

if(isset($_POST['przedmioty'])) {
    $_SESSION['zaznaczone'] = $_POST['przedmioty'];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if(isset($_SESSION['zaznaczone'])) {
    $wybrane = "SELECT * FROM prze WHERE IDP IN (" . implode(',', $_SESSION['zaznaczone']) . ")";
    $wybrane_wynik = $polaczenie->query($wybrane);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklepik</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { 
            border-collapse: collapse;
            position: absolute;
            top: 10%;
            left: 47.75%;
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        td, th { 
            border: 1px solid black; 
            padding: 5px; 
        }
        #glowna {
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="kontener">
        <header>
            <h1>Baner</h1>
        </header>
        <div id="glowna">
            <div id="menu">
                <h2>Menu</h2>
                <form method="post">
                    <?php
                    if ($wynik->num_rows > 0) {
                        while($wiersz = $wynik->fetch_assoc()) {
                            echo '<div class="checkbox-item">';
                            echo '<input type="checkbox" id="przedmiot_' . $wiersz['IDP'] . '" name="przedmioty[]" value="' . $wiersz['IDP'] . '">';
                            echo '<label for="przedmiot_' . $wiersz['IDP'] . '">' . $wiersz['przedmiot'] . '</label>';
                            echo '</div>';
                        }
                    }
                    ?>
                    <input type="submit" value="Pokaż wybrane">
                </form>
            </div>
            <?php
                if(isset($wybrane_wynik) && $wybrane_wynik->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Przedmiot</th></tr>";
                    while($wiersz = $wybrane_wynik->fetch_assoc()) {
                        echo "<tr><td>{$wiersz['przedmiot']}</td></tr>";
                    }
                    echo "</table>";
                }
                ?>
        </div>
        <div>
        </div>
        <footer>
            <p>wxretyuhjiko</p>
        </footer>
    </div>
</body>
</html>