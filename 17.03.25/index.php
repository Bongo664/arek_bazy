<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inf.03 - funkcja kwadratowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Witaj na naszej stronie</h2>
    </header>
    
    <section class="main">
        <section class="lewa">
           <ul>
                <li><a href="index.php?menu=1">Delta</a></li>
                <li><a href="index.php?menu=2">X1, X2</a></li>
                <li><a href="index.php?menu=3">FORM A, B, C</a></li>
           </ul>
        </section>

        <section class="prawa">
            <?php
                // Włącz pokazywanie błędów
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if (isset($_GET['menu']) && !empty($_GET['menu'])) {
                    $nrmenu = $_GET['menu'];

                    // Połączenie z bazą danych
                    $conn = new mysqli("localhost", "root", "", "f_kw");

                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                        die("Błąd połączenia: " . $conn->connect_error);
                    }

                    switch ($nrmenu) {
                        case '1':
                            echo "<h3>Delta</h3>";

                            $zap_o_delte = $conn->query("SELECT b*b-4*a*c AS delta FROM dane");

                            echo "<ul>";
                            $i = 0;
                            while ($row = $zap_o_delte->fetch_assoc()) {
                                $i++;
                                echo "<li>Delta $i = {$row['delta']}</li>";
                            }
                            echo "</ul>";
                            break;

                        case '2':
                            echo "<h3>X1, X2</h3>";

                            $zap_o_x1x2 = $conn->query("SELECT (-b - SQRT(b*b - 4*a*c)) / (2*a) AS x1, 
                                                               (-b + SQRT(b*b - 4*a*c)) / (2*a) AS x2 
                                                        FROM dane
                                                        WHERE (b*b - 4*a*c) >= 0 AND 2*a <> 0");

                            echo "<ul>";
                            $i = 0;
                            while ($row = $zap_o_x1x2->fetch_assoc()) {
                                $i++;
                                echo "<li>nr $i: x1 = {$row['x1']}, x2 = {$row['x2']}</li>";
                            }
                            echo "</ul>";
                            break;

                        case '3':
                            echo "<h3>Dodaj A, B, C</h3>";
                            echo "
                                <form action='index.php' method='post'>
                                    a: <input type='number' name='a' required /> <br/>
                                    b: <input type='number' name='b' required /> <br/>
                                    c: <input type='number' name='c' required /> <br/>
                                    <input type='submit' name='submit' value='Wyślij do bazy' />
                                </form>
                            ";
                            break;

                        default:
                            echo "<h3>Nie ma takiego numeru</h3>";
                    }
                    $conn->close();
                }

                // Obsługa formularza dodawania danych
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    $a = $_POST['a'];
                    $b = $_POST['b'];
                    $c = $_POST['c'];

                    // Ponowne połączenie z bazą
                    $conn = new mysqli("localhost", "root", "", "f_kw");

                    if ($conn->connect_error) {
                        die("Błąd połączenia: " . $conn->connect_error);
                    }

                    // Wstawienie do bazy (zabezpieczenie przed SQL Injection)
                    $stmt = $conn->prepare("INSERT INTO dane (a, b, c) VALUES (?, ?, ?)");
                    $stmt->bind_param("iii", $a, $b, $c);

                    if ($stmt->execute()) {
                        echo "<p>Dane zostały dodane pomyślnie!</p>";
                    } else {
                        echo "<p>Błąd dodawania danych: " . $conn->error . "</p>";
                    }

                    $stmt->close();
                    $conn->close();
                }
            ?>
        </section>
    </section>

    <footer>
        <p>Copyright by klasa 3CT</p>
    </footer>
</body>
</html>
