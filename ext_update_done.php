<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 20:31
 */

require_once('Configs/db_connect.php');

session_start();
if (isset($_SESSION['login_user'])) {
} else {
    header("location: index.php");
}
$username = $_SESSION['login_user'];
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
$id = "";
$ext = (int)db_escape($_POST['ext']);
$pass = db_escape($_POST['pass']);
$ip = db_escape($_POST['ip']);
$number = (int)db_escape($_POST['number']);

$sql_ids = "SELECT id FROM numbers WHERE number=$number";
$ids = db_select($sql_ids);
foreach ($ids as $id) {
    $id = $id['id'];
}
$sql_ext = "UPDATE sip SET secret='$pass', ip='$ip', number_id='$id' WHERE ext='$ext'";
$sql_in_use = "UPDATE numbers SET in_use=1 WHERE id=$id";
$sql_log_ext = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE sip SET secret=$pass, ip=$ip, number_id=$id WHERE ext=$ext')";
$sql_log_in_use = "INSERT INTO logs (user, command) VALUES ('$username', '$sql_in_use')";

if ((db_query($sql_ext) && db_query($sql_in_use) && db_query($sql_log_ext) && db_query($sql_log_in_use)) == false) {
    echo "Error $sql_ext. " . db_error();
} else {
    echo "<div align='center' style='top: 100px; position: relative'>Klapka <b>$ext</b> s heslem $pass a povolenim na techto IP adresach: $ip byla uspesne upravena</div>";
}
?>
</body>
</html>