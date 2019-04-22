<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "pakostanecamp";
    $conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("Chyba s připojením do databáze. Prosím kontaktuj správce webového serveru.");
    mysqli_query($conn, "SET NAMES utf8");
?>
