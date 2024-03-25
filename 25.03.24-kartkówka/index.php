<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("polaczenie.php");
    ?>
    <form action="delete.php" method="post">
        <select name="select" onchange="this.form.submit()">
            <option value="">-- Wybierz --</option>
            <?php
                $zapytanie = "SELECT idu,imie,nazwisko FROM uczniowie";
                foreach($polaczenie->query($zapytanie) as $wiersz){
                   $idu = $wiersz['idu'];
                   $imie = $wiersz['imie'];
                   $nazwisko = $wiersz['nazwisko'];
                   echo <<<TX
                   <option value="$idu">$imie $nazwisko</option>
                   TX;
                }
            ?>
        </select>
    </form>
    <?php 
    $polaczenie = null;
    ?>
</body>
</html>