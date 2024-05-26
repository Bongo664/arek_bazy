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
        <br>
        <div class="wynik">
            <h4>Wynik Kalkulatora</h4>
            <div id="wynikcalc">
                
            </div>
        </div>
    </div>

    <div class="window">

        <div class="header">
            <?php
            include_once("header.php")
            ?>
        </div>

        <div class="content">
            <div class="calcForm">
                <form id="formCalc">
                    <label for="paliwo">Spalanie na litra/100km</label>
                    <input type="number" min=0 id="paliwo"><br>

                    <label for="paliwo">Pokonany dystans</label>
                    <input type="number" min=0 id="dystans"><br>

                    <label for="paliwo">Cena paliwa zł</label>
                    <input type="number" min=0 id="cena">

                </form>
                <button class="btnOblicz" onclick="oblicz();">oblicz</button>
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