<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Energia - Obliczenia</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energia";
$polaczenie = new mysqli($servername, $username, $password, $dbname, 3306);

if ($polaczenie->connect_error) {
    die("ERROR POLACZENIA: " . $polaczenie->connect_error);
}

$zapytanie = $polaczenie->query("SELECT id, m, g, h, v FROM energia");
?>

<form name="formularzEnergia" id="formularzEnergia" style="border: 2px solid white; border-radius: 5px; padding: 20px; margin: auto; font-size: 20px; width: 320px;">
    <select name="dane" id="dane">
        <option value="0">Wybierz</option>
        <?php
        while($row = $zapytanie->fetch_assoc()) {
            echo "<option value='{$row['id']}' m='{$row['m']}' g='{$row['g']}' h='{$row['h']}' v='{$row['v']}'>Tabela: {$row['id']} - m: {$row['m']} kg, g: {$row['g']} m/s², h: {$row['h']} m, v: {$row['v']} m/s</option>";
        }
        ?>
    </select>
</form>

<?php $polaczenie->close(); ?>

        <br><br>

<div id="wynik" style="border: 2px solid white; border-radius: 5px; width: 500px; padding: 20px; margin: auto; font-size: 24px;"></div>

<script>
document.getElementById("dane").addEventListener("change", function(event) {
    let select = event.target;
    if (select.value != 0) {
        let selectedOption = select.options[select.selectedIndex];
        let m = parseFloat(selectedOption.getAttribute('m'));
        let g = parseFloat(selectedOption.getAttribute('g'));
        let h = parseFloat(selectedOption.getAttribute('h'));
        let v = parseFloat(selectedOption.getAttribute('v'));

        let energiaKinetyczna = (m * v * v) / 2;
        let energiaPotencjalna = m * g * h;
        let energiaMechaniczna = energiaKinetyczna + energiaPotencjalna;

        document.getElementById("wynik").innerHTML = 
            `<p>Tabela: ${selectedOption.textContent.split(' ')[1]}</p>
             <p>Masa: ${m} kg</p>
             <p>Grawitacja: ${g} m/s²</p>
             <p>Wysokość: ${h} m</p>
             <p>Prędkość: ${v} m/s</p>
             <p>Energia Kinetyczna: ${energiaKinetyczna.toFixed(2)} J</p>
             <p>Energia Potencjalna: ${energiaPotencjalna.toFixed(2)} J</p>
             <p>Energia Mechaniczna: ${energiaMechaniczna.toFixed(2)} J</p>`;
    } else {
        document.getElementById("wynik").innerHTML = "Brak danych";
    }
});
</script>
</body>
</html>
