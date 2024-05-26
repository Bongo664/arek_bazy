
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt webowy</title>
    <script src="skrypt.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="menu">
        <h3>Menu</h3>    
        <ul>
            <li><a href="calc.php">Kalkulator spalania</a></li>
            <li><a href="cars.php">Informacje nt. pojazdu</a></li>
            <li><a href="contact.php">Kontakt</a></li>
        </ul>
    </div>

    <div class="window">

        <div class="header">
            <?php
            include_once("header.php")
            ?>
        </div>

        <div class="content">
        <h2>Formularz kontaktowy</h2>
            <div class="contact-form">
                
                <form method="post">
                    <label for="first_name">Imię:</label>
                    <input type="text" id="first_name" name="first_name" required>

                    <label for="last_name">Nazwisko:</label>
                    <input type="text" id="last_name" name="last_name" required>

                    <input type="submit" value="Wyślij">
                </form>

                <?php
                    include_once("connect.php");

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                    
                        $zapytanie = "INSERT INTO kontakt (imie, nazwisko) VALUES ('$first_name', '$last_name')";
                    
                        if (mysqli_query($conn, $zapytanie)) {
                            echo "<h2>Dziękujemy za kontakt!</h2>";
                            echo "<p>Imię: $first_name</p>";
                            echo "<p>Nazwisko: $last_name</p>";
                        } else {
                            echo "Błąd: " . mysqli_error($conn);
                        }
                    }
                ?>

            </div>
        </div>

        <div class="footer">
        <?php
            include_once("footer.php")
            ?>
        </div>

    </div>

</body>
</html>