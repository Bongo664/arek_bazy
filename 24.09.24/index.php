<?php
include 'db.php';
$sql = "SELECT id,name,email,created_at FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista użytkowników</title>
</head>
<body>
    <h2>lista użytkowników</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Email</th>
            <th>Data utworzenia</th>
            <th>Akcje</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["created_at"]."</td>";
                echo "<td><a href='edit.php?id=".$row["id"]."'>Edytuj</a><a href='delete.php?id=".$row["id"]."'>Usuń</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Brak użytkowników</td></tr>";
        }
       ?>
       </table>
       <br>
       <a href="create.php">dodaj nowego użytkownika</a>
</body>
</html>
<?php
$conn->close();
?>