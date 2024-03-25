<?php
$serwer = 'localhost';
$dbname = 'baza25032024';
$username = 'root';
$password = '';
$port = 3306;
try{
    $polaczenie = new PDO('mysql:host='.$serwer.';dbname='.$dbname.';port='.$port.';charset=utf8', $username, $password);
    echo("<h1>Połączono z bazą przez PDO</h1>");
}
catch(PDOException $event){
    echo("<h1>Błąd połączenie z bazą przez PDO</h1>");
    echo($event);
    die();
}
?>