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
                <td>Nazwa</td>
            </tr>
            <?php
                $zapytanie_do_widoku1 = $polaczenie->query("SELECT imie,nazwisko,nazwa FROM widko");
                while(list($imie,$nazwisko,$nazwa)=mysqli_fetch_row($zapytanie_do_widoku1)){

                
                echo("
                <tr>

                <td>$imie</td>
                <td>$nazwisko</td>
                <td>$nazwa</td>
                </tr>
                ");
            }
            ?>
        </table>
    </div>
    <?php $polaczenie->close();?>
</body>
</html>