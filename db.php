<?php

$servername = "localhost";
$username = "remenar";
$password = "grambli1";
$dbname = "accounts";
echo "dbname " . $dbname . "<br>";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";


?>
