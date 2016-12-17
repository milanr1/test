<?php


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
#$target_file = $target_dir . "ucet.xml";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$xml=simplexml_load_file( $target_file ) or die("Error: Cannot create object");

require 'db.php';

$bank_iban = $xml->STMTRS->BANKACCTFROM->IBAN;
$sql = "select id from accounts where iban = '$bank_iban'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $bank_id = $row["id"];
    }
} else {
    echo "0 results";
}
foreach($xml->STMTRS->BANKTRANLIST->STMTTRN as $ucet) {
        $datum_post = $ucet->DTPOSTED;
	$datum_avail = $ucet->DTAVAIL;
        $typ = $ucet->TRNTYPE;
        $suma = $ucet->TRNAMT;
        $mena = $ucet->CURRENCY;
        $poznamka = $ucet->MEMO;
        $popis = $ucet->NAME;
        $banka = $ucet->BANKACCTTO->IBAN;
	$reference = $ucet->REFERENCE_E2E;


$sql = "INSERT INTO tb_movements (bank_acc_id,type,date_post,date_avail,amount,name,memo,iban,reference,currency) VALUES ('$bank_id','$typ', '$datum_post', '$datum_avail', '$suma', '$popis', '$poznamka', '$banka', '$reference', '$mena')";

if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$sql = "select * from tb_movements";
$result = $conn->query($sql);
echo "Pocet riadkov: " . $result->num_rows;

$conn->close();


?>
