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

<?php
include_once("connect.php");
?>

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
        <?php include_once("header.php"); ?>
    </div>

    <div class="content">
        <div class="formCars">
            <form method="post">
                <h3>Wybierz pojazd z listy:</h3>
                <select name="car_id" onchange="this.form.submit()">
                    <option value="">Wybierz...</option>
                    <?php
                    $zapytanie = "SELECT ids, nazwa FROM samochody";
                    $result = mysqli_query($conn, $zapytanie);
                    while ($wiersz = mysqli_fetch_array($result)) {
                        $ids = $wiersz['ids'];
                        $nazwa = $wiersz['nazwa'];
                        echo "<option value=\"$ids\">$nazwa</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
        <div class="sigma">
            <?php
            if (isset($_POST['car_id']) && $_POST['car_id'] != '') {
                $car_id = $_POST['car_id'];
                $zapytanie = "SELECT nazwa, opis FROM samochody WHERE ids = '$car_id'";
                $result = mysqli_query($conn, $zapytanie);

                if (mysqli_num_rows($result) > 0) {
                    $wiersz = mysqli_fetch_array($result);
                    $nazwa = $wiersz['nazwa'];
                    $opis = $wiersz['opis'];
                    echo "<h1>$nazwa</h1><br><h3>$opis</h3>";
                } else {
                    echo "<h3>Nie znaleziono informacji o wybranym pojeździe.</h3>";
                }
            }
            ?>
        </div>
    </div>

    <div class="footer">
        <?php include_once("footer.php"); ?>
    </div>

</div>

</body>
</html>
