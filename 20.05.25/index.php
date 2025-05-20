<?php
$polaczenie = @new mysqli("localhost","root", "", "baza20052025");
$zap = $polaczenie->query("SELECT kategorie.nazwa, count(produkty.idk) as 'ilość' FROM kategorie inner join produkty on kategorie.idk = produkty.idk group by kategorie.nazwa");
while(list($nazwa,$ilosc) = mysqli_fetch_row($zap)){
    echo $nazwa . " " . $ilosc . "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$polaczenie->close();
?>