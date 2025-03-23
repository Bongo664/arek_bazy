<?php
session_start();

$host = 'localhost';
$nazwa_bazy = 'uzytkownicy';
$uzytkownik = 'root';
$haslo = '';
$polaczenie = new mysqli($host, $uzytkownik, $haslo, $nazwa_bazy);
if ($polaczenie->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $polaczenie->connect_error);
}

function pobierzLosoweZdjecieTatr() {
    $zdjecia = [
        'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Panorama_Dolina_Litworowa_a2.JPG/2880px-Panorama_Dolina_Litworowa_a2.JPG',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Wysoka_A1.jpg/1920px-Wysoka_A1.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/d/d5/Rysy_w_sierpniu.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Gra%C5%84_G%C5%82%C3%B3wna_Tatr.jpg/1920px-Gra%C5%84_G%C5%82%C3%B3wna_Tatr.jpg'
    ];
    return $zdjecia[array_rand($zdjecia)];
}

if (isset($_POST['wyloguj'])) {
    unset($_SESSION['zalogowany_uzytkownik']);
    unset($_SESSION['aktualne_zdjecie']);
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['zaloguj'])) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    $zapytanie = $polaczenie->prepare("SELECT haslo FROM uzytkownicy WHERE login = ?");
    $zapytanie->bind_param("s", $login);
    $zapytanie->execute();
    $wynik = $zapytanie->get_result();
    
    if ($wynik->num_rows > 0) {
        $row = $wynik->fetch_assoc();
        if (password_verify($haslo, $row['haslo'])) {
            $_SESSION['zalogowany_uzytkownik'] = $login;
        } else {
            echo "<p style='color: red;'>Błędny login lub hasło!</p>";
        }
    } else {
        echo "<p style='color: red;'>Błędny login lub hasło!</p>";
    }
    $zapytanie->close();
}

if (isset($_POST['dodaj_uzytkownika'])) {
    $nowy_login = $_POST['nowy_login'];
    $nowe_haslo = password_hash($_POST['nowe_haslo'], PASSWORD_DEFAULT);
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    
    $sprawdz = $polaczenie->prepare("SELECT login FROM uzytkownicy WHERE login = ?");
    $sprawdz->bind_param("s", $nowy_login);
    $sprawdz->execute();
    $wynik = $sprawdz->get_result();
    
    if ($wynik->num_rows > 0) {
        echo "<p style='color: red;'>Użytkownik o takim loginie już istnieje!</p>";
    } else {
        $zapytanie = $polaczenie->prepare("INSERT INTO uzytkownicy (login, haslo, imie, nazwisko) VALUES (?, ?, ?, ?)");
        $zapytanie->bind_param("ssss", $nowy_login, $nowe_haslo, $imie, $nazwisko);
        if ($zapytanie->execute()) {
            echo "<p style='color: green;'>Utworzono konto dla: $imie $nazwisko (login: $nowy_login)</p>";
        } else {
            echo "<p style='color: red;'>Nie udało się utworzyć konta!</p>";
        }
        $zapytanie->close();
    }
    $sprawdz->close();
}

if (isset($_POST['pokaz_zdjecie']) && isset($_SESSION['zalogowany_uzytkownik'])) {
    $zdjecie = pobierzLosoweZdjecieTatr();
    $_SESSION['aktualne_zdjecie'] = $zdjecie;
}

$zapytanie = $polaczenie->query("SELECT id, login, haslo FROM uzytkownicy");
while ($row = $zapytanie->fetch_assoc()) {
    if (strlen($row['haslo']) < 60) {
        $hashed_password = password_hash($row['haslo'], PASSWORD_DEFAULT);
        $update = $polaczenie->prepare("UPDATE uzytkownicy SET haslo = ? WHERE id = ?");
        $update->bind_param("si", $hashed_password, $row['id']);
        $update->execute();
        $update->close();
    }
}

$zapytanie->close();
$polaczenie->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #1a1a1a;
        }
        #kontener { 
            width: 80%; 
            margin: 20px auto;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            background-color: #2d2d2d;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            color: #ffffff;
        }
        header {
            text-align: center;
            padding: 10px;
            background-color: #1e3a6e;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        #menu { 
            float: left; 
            width: 30%;
            padding: 15px;
        }
        #tresc { 
            float: right; 
            width: 65%;
            padding: 15px;
        }
        footer { 
            clear: both;
            padding: 15px;
            border-top: 2px solid #333;
            margin-top: 20px;
            text-align: center;
        }
        input, button {
            margin: 5px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #444;
            background-color: #3d3d3d;
            color: #ffffff;
        }
        input::placeholder {
            color: #999;
        }
        button {
            background-color: #2d4a8a;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
        }
        button:hover {
            background-color: #1e3a6e;
        }
        .hidden {
            display: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            cursor: pointer;
            color: #4a90e2;
        }
        li:hover {
            text-decoration: underline;
            color: #2d4a8a;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logowanie_link').addEventListener('click', function() {
                pokazSekcje('logowanie');
            });
            document.getElementById('dodaj_uzytkownika_link').addEventListener('click', function() {
                pokazSekcje('dodaj_uzytkownika');
            });
        });

        function pokazSekcje(sekcja) {
            document.getElementById('logowanie').classList.add('hidden');
            document.getElementById('dodaj_uzytkownika').classList.add('hidden');
            document.getElementById(sekcja).classList.remove('hidden');
        }
    </script>
</head>
<body>
    <div id="kontener">
        <header>
            <h1>Panel Użytkownika</h1>
        </header>
        <div id="menu">
            <h2>Menu</h2>
            <ul>
                <li id="logowanie_link">Logowanie</li>
                <li id="dodaj_uzytkownika_link">Dodaj użytkownika</li>
            </ul>
        </div>
        <div id="tresc">
            <div id="logowanie" class="hidden">
                <h3>Logowanie</h3>
                <form method="POST">
                    <input type="text" name="login" placeholder="Wpisz login" required><br>
                    <input type="password" name="haslo" placeholder="Wpisz hasło" required><br>
                    <button type="submit" name="zaloguj">Zaloguj się</button>
                </form>
            </div>
            <div id="dodaj_uzytkownika" class="hidden">
                <h3>Rejestracja</h3>
                <form method="POST">
                    <input type="text" name="nowy_login" placeholder="Wybierz login" required><br>
                    <input type="password" name="nowe_haslo" placeholder="Wybierz hasło" required><br>
                    <input type="text" name="imie" placeholder="Podaj imię" required><br>
                    <input type="text" name="nazwisko" placeholder="Podaj nazwisko" required><br>
                    <button type="submit" name="dodaj_uzytkownika">Utwórz konto</button>
                </form>
            </div>
            <div id="powitanie">
                <h2>Witaj w panelu użytkownika</h2>
                <?php if (isset($_SESSION['zalogowany_uzytkownik'])): ?>
                    <p>Zalogowano jako: <?php echo htmlspecialchars($_SESSION['zalogowany_uzytkownik']); ?></p>
                    <div style="margin: 20px 0;">
                        <form method="POST" style="display: inline-block; margin-right: 10px;">
                            <button type="submit" name="pokaz_zdjecie">Losowe zdjęcie Tatr</button>
                        </form>
                        <form method="POST" style="display: inline-block;">
                            <button type="submit" name="wyloguj" style="background-color: #f44336;">Wyloguj się</button>
                        </form>
                    </div>
                    <?php if (isset($_SESSION['aktualne_zdjecie'])): ?>
                        <img src="<?php echo htmlspecialchars($_SESSION['aktualne_zdjecie']); ?>" 
                             width="400px" 
                             alt="Zdjęcie Tatr"
                             style="margin-top: 10px;">
                    <?php endif; ?>
                <?php else: ?>
                    <p>Zaloguj się, aby zobaczyć zdjęcia Tatr</p>
                <?php endif; ?>
            </div>
        </div>
        <footer>
            <p>© 2024 Panel Użytkownika - Wszystkie prawa zastrzeżone</p>
        </footer>
    </div>
</body>
</html>