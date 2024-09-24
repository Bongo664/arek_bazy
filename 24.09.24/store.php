<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE)  {
    echo "nowy użytkownik został dodany";
}
else {
    echo "błąd: ".$sql."<br>".$conn->error;
}
$conn->close();
}
?>