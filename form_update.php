<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 20:31
 */
?>
    <html>
        <title>Asterisk Generato</title>

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
        </body>
    </html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "asterisk";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

$ext = mysqli_real_escape_string($conn, $_POST['ext']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

$sql = "UPDATE sip SET secret='$pass', ip='$ip' WHERE ext=$ext";
if (mysqli_query($conn, $sql)) {
    echo "Klapka <b>$ext</b> s heslem $pass a povolenim na techto IP adresach: $ip byla uspesne upravena";
} else {
    echo "Error $sql. " . mysqli_error($conn);
}
$conn->close();