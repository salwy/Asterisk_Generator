<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 21:01
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
    <button name="delete_number"><a href="number_delete.php">Smazat cislo</a></button>
    <button name="file_generate_new"><a href="file_generate_new.php">Vygenerovat novy SIP.conf</a></button>
    <button name="log_lookup"><a href="log_lookup.php">Vypsat log</a></button>
</div>

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "asterisk";

$conn = new mysqli($server, $username, $password, $database);

if (empty ($conn)) {
    die("Not connected: " . mysqli_connect_error());
}
$ext = $_POST['ext'];
$sql_numberid = $conn->query("SELECT number_id FROM sip WHERE ext=$ext");
$sql_numberid = $sql_numberid->fetch_row();
$sql_delete = "DELETE FROM sip WHERE ext=$ext";
$sql_number = "UPDATE numbers SET in_use=0 WHERE id=$sql_numberid[0]";
$sql_log_delete = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_delete')";
$sql_log_number = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_number')";

if ($conn->query($sql_delete) && $conn->query($sql_number)&& $conn->query($sql_log_delete) && $conn->query($sql_log_number)) {
    echo "<div align=\"center\" style=\"top: 100px; position: relative;\">Uspesne smazano</div>";
} else {
    echo "<div align=\"center\" style=\"top: 100px; position: relative;\">Chyba: " . $conn->error . "</div>";
}
$conn->close();
?>
</body>
</html>