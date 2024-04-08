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
    <div>
        <table border="1">
            <tr>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td>Miasto</td>
                <td>ocena</td>
            </tr>
            <?php
                $zapytanie_do_widoku3 = $polaczenie->query("SELECT imie,nazwisko,miasto,ocena FROM widok3");
                while(list($imie,$nazwisko,$miasto,$ocena)=mysqli_fetch_row($zapytanie_do_widoku3)){

                
                echo("
                <tr>
                <td>$imie</td>
                <td>$nazwisko</td>
                <td>$miasto</td>
                <td>$ocena</td>
                </tr>
                ");
            }
            ?>
        </table>
    </div>
    <?php $polaczenie->close();?>
</body>
</html>