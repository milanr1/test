<?php

$servername = "localhost";
$username = "root";
$password = "grambli1";
$dbname1 = $_GET["dbname1"];
$dbname = "accounts";
echo "dbname " . $dbname . "<br>";
echo "dbname1 " . $dbname1 . "<br>";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";


?>
