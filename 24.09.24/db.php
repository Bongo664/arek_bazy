<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "my_database";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("połączenie iudane: ". $conn->connect_error);
}
?>