<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polaczenie przez PDO</title>
</head>
<body>
<?php include_once("polaczenie.php");?>
    <div class="box">
        <?php $zapytanie = "SELECT imie,nazwisko,adres FROM uczniowie";
        foreach($polaczenie->query($zapytanie) as $wiersz){
            echo $wiersz["imie"]." ".$wiersz["nazwisko"]." ".$wiersz["adres"]."<br>";
        }    
    ?>
    </div>
    <?php $polaczenie=null;?>
</body>
</html>