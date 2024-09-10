<?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "baza10092024";
        $port = "3306";

        $conn = new mysqli($server, $user, $password, $dbname, $port);

        if (mysqli_connect_error()!=0) {
            die("<p>Połączenie nieudane: " . mysqli_connect_error()."</p>");
        }
        echo "<h5>Połączenie z bazą danych przebiegło pomyślnie!</h5>";
        ?>