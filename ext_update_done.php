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

$ext = mysqli_real_escape_string($conn, $_POST['ext']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);
$number = mysqli_real_escape_string($conn, $_POST['number']);

$sql_number = $conn->query("SELECT id FROM numbers WHERE number=$number");
$id = $sql_number->fetch_row();
$sql_ext = "UPDATE sip SET secret='$pass', ip='$ip', number_id='$id[0]' WHERE ext='$ext'";
$sql_inuse = "UPDATE numbers SET in_use=1 WHERE id=$id[0]";
$sql_log_ext = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE sip SET secret=$pass, ip=$ip, number_id=$id[0] WHERE ext=$ext')";
$sql_log_inuse = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_inuse')";

if (mysqli_query($conn, $sql_ext) && mysqli_query($conn, $sql_inuse) && mysqli_query($conn, $sql_log_ext) && mysqli_query($conn, $sql_log_inuse))   {
    echo "<div align='center' style='top: 100px; position: relative'>Klapka <b>$ext</b> s heslem $pass a povolenim na techto IP adresach: $ip byla uspesne upravena</div>";
} else {
    echo "Error $sql_ext. " . mysqli_error($conn);
}
$conn->close();
?>
</body>
</html>