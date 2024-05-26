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
            <li><a href="cars.php">informacje nt. pojazdu</a></li>
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
           Strona Główna
        </div>

        <div class="footer">
        <?php
            include_once("footer.php")
            ?>
        </div>

    </div>

</body>
</html>