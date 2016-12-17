<!DOCTYPE html>
<html>
<head>
        <title>milanr1 cloud</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>MAC address</h1>

<?php
#    $mac = "FC:FB:FB:01:FA:21";
#    $url = "http://api.macvendors.com/" . $mac;
    $url = "http://api.macvendors.com/" . $_GET["mac"];
    echo $url . "<BR>";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $vendor = curl_exec($ch);

    if($vendor) {
        echo $vendor;
    } else {
        echo "Not Found";
    }
    curl_close($ch);
?>

</body>
</html>
