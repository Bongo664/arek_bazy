<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "użytkownik został usunięty";
}
else{
    echo "Wystąpił błąd: ".$sql."<br>". $conn->error;
}
$conn->close();
?>