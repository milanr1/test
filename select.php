<!DOCTYPE html>
<html>
<head>
        <title>milanr1 cloud</title>
        <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>TB account viewer</h1>

<table>
<th>Pohyb</th><th>Dátum</th><th>Suma</th><th>Popis</th><th>Poznámka</th>
<?php


require 'db.php';

$sql = "select * from tb_movements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["type"]."</td><td>".$row["date_post"]."</td><td align='right' width='10%'>".$row["amount"]." ".$row["currency"]."</td><td>".$row["memo"]."</td><td>".$row["name"]."</td></tr>";
    }
} else {
    echo "0 results";
}

$conn->close();


?>
</table>
</body>
</html>
