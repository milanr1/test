<!DOCTYPE html>
<html>
<head>
        <title>milanr1 cloud</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Connect to database</h1>
<?php

$dbname1='mysql';
require 'db.php';

$sql = "SELECT id,bank_account FROM accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>Host</th><th>User</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["bank_account"]. "</th></tr>";
	}
	echo "</table>";

} else {
	echo "0 results";
}

$conn->close();

?>
</body>
</html>
