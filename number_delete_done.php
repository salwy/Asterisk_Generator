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
$number = $_POST['number'];
$sql_id = $conn->query("SELECT id FROM numbers WHERE number=$number");
$sql_id = $sql_id->fetch_row();
$sql_number = "DELETE FROM numbers WHERE number=$number";
$sql_inuse = "UPDATE sip SET number_id=0 WHERE number_id=$sql_id[0]";
$sql_log_number = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_number')";
$sql_log_inuse = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_inuse')";

if (mysqli_query($conn, $sql_number) && mysqli_query($conn, $sql_inuse) && mysqli_query($conn, $sql_log_number) && mysqli_query($conn, $sql_log_inuse)) {
    echo "<div align=\"center\" style=\"top: 100px; position: relative;\">Uspesne smazano</div>";
} else {
    echo "<div align=\"center\" style=\"top: 100px; position: relative;\">Chyba: " . $conn->error . "</div>";
}

$conn->close();
?>
</body>
</html>