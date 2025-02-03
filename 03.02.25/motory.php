<?php
/*
Cechy witryny:

‒ Zawartość pierwszego bloku prawego:

‒ Zawartość drugiego bloku prawego:
‒ Nagłówek drugiego stopnia o treści: „Statystyki”
‒ paragraf (akapit) o treści „Wpisanych wycieczek: ”, dalej efekt działania skryptu 2
‒ paragraf o treści „Użytkowników forum: 200”
‒ paragraf o treści „Przesłanych zdjęć: 1300”
‒ Zawartość stopki: akapit o treści „Stronę wykonał: ”, dalej wstawiony numer zdającego
*/
$polaczenie = new mysqli("localhost","root","","motory",3306);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
<img src="motor.png" alt="motocykl" />
<header class="baner">
    <h1>
        Motocykle - moja pasja
    </h1>
</header>
<section class="lewy">
    <h2>Gdzie pojechać?</h2>
    <dl>
    Lista definicji (Description List) wypełniona przez skrypt 1
    <?php
    $zapytanie = $polaczenie->query("SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id=zdjecia.id");
    while($row = $zapytanie->fetch_assoc()){
        echo("<dt id='terminy'>");
        echo("{$row['nazwa']}. rozpoczyna się w {$row['poczatek']}, <a href='{$row['zrodlo']}.jpg'>zobacz zdjęcie</a></dt>");
        echo("<dd id='opis'>{$row['opis']}</dd>");
    }
    ?>
    </dl>
</section>
<section class="prawy">
    <h2>Co kupić?</h2>
    <ol>
        <li>Honda CBR125R</li>
        <li>Yamaha YBR125</li>
        <li>Honda VFR800i</li>
        <li>Honda CBR1100XX</li>
        <li>BMW R1200GS LC</li>
    </ol>
</section>
<section class="prawy">
    <h2>
        Statystyki
    </h2>
    <?php
    $zapytanie2 = $polaczenie->query("SELECT COUNT(*) as 'ile' FROM wycieczki");
    while($row2 = $zapytanie2->fetch_assoc()){
        echo("<p>Wpisanych wycieczek: {$row2['ile']}</p>");
    }
    ?>
</section>
<footer>Stopunia funia</footer>
<?php $polaczenie->close(); ?>
</body>
</html>