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
            <button name="new_extension"><a href="new_extension.php">Nova klapka</a></button>
            <button name="update_extension"><a href="update_extension.php">Uprava klapky</a></button>
            <button name="lookup_extension"><a href="lookup_extension.php">Vypis vsech klapek</a></button>
            <button name="delete_extension"><a href="delete_extension.php">Smazat klapku</a></button>
            <button name="file_generate_new"><a href="file_generate_new.php">Vygenerovat novy SIP.conf</a></button>
            <button name="home"><a href="index.php">Home</a></button>
        </div>

<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "asterisk";


$conn = new mysqli($server, $username, $password, $database);

$ext = mysqli_real_escape_string($conn, $_POST['ext']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

$sql = "INSERT INTO sip (ext, secret, ip) VALUES ('$ext', '$pass', '$ip')";
if (mysqli_query($conn, $sql)) {
    echo "<div align='center' style='top: 100px; position: relative'>Klapka <b>$ext</b> s heslem $pass a povolenim na techto IP adresach: $ip byla uspesne zalozena</div>";
} else {
    echo "Error $sql. " . mysqli_error($conn);
}
$conn->close();