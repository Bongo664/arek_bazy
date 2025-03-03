<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>System ocen</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Średnie ocen z przedmiotów</h2>
    <table>
        <tr>
            <th>Przedmiot</th>
            <th>Średnia ocen</th>
            <th>Liczba ocen</th>
        </tr>
        <?php
        $host = 'localhost';
        $dbname = 'szkola';
        $username = 'root';
        $password = '';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $przedmioty = ['fizyka', 'matematyka', 'polski'];
            
            foreach ($przedmioty as $przedmiot) {
                $stmt = $conn->prepare("SELECT AVG(ocena) as srednia, COUNT(ocena) as ilosc FROM oceny WHERE przedmiot = ?");
                $stmt->execute([$przedmiot]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $srednia = round($result['srednia'], 2);
                $ilosc = $result['ilosc'];
                echo "<tr>";
                echo "<td>" . ucfirst($przedmiot) . "</td>";
                echo "<td>$srednia</td>";
                echo "<td>$ilosc</td>";
                echo "</tr>";
            }

        } catch(PDOException $e) {
            echo "<tr><td colspan='3'>Błąd połączenia z bazą danych: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>