<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 20:31
 */
?>
<html>
<title>Asterisk Generator</title>

<body>
<h1 align="center">Generator pro Asterisk</h1>

<div align="center">
    <button name="new_extension"><a href="ext_new.php">Nova klapka</a></button>
    <button name="new_number"><a href="number_new.php">Nove cislo</a></button>
    <button name="update_extension"><a href="ext_update.php">Uprava klapky</a></button>
    <button name="lookup_extension"><a href="ext_lookup.php">Vypis vsech klapek</a></button>
    <button name="lookup_numbers"><a href="number_lookup.php">Vypis vsech cisel</a></button>
    <button name="delete_extension"><a href="ext_delete.php">Smazat klapku</a></button>
    <button name="file_generate_new"><a href="file_generate_new.php">Vygenerovat novy SIP.conf</a></button>
</div>
<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "asterisk";

$conn = new mysqli($server, $username, $password, $database);

$number = mysqli_real_escape_string($conn, $_POST['number']);

$sql_number = "INSERT INTO numbers (number, in_use) VALUES ('$number', '0')";

if (mysqli_query($conn, $sql_number)) {
    echo "<div align='center' style='top: 100px; position: relative'>Tel. cislo <b>$number</b> bylo uspesne zalozeno</div>";
} else {
    echo "Error: " . mysqli_error($conn);
}
$conn->close();
?>
</body>
</html>
