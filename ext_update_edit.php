<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 23:12
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

if (empty ($conn)) {
    die("Not connected: " . mysqli_connect_error());
}
$ext = $_POST['ext'];
$sql_secret = $conn->query("SELECT secret FROM sip WHERE ext=$ext");
$secret = $sql_secret->fetch_row();
$sql_secret->free();
$sql_ip = $conn->query("SELECT ip FROM sip WHERE ext=$ext");
$ip = $sql_ip->fetch_row();
$sql_ip->free();
?>
<div align="center" style="top: 100px; position: relative;">
    <form action="ext_update_done.php" method="post">
        <p><label for="ext">Klapka: </label><input name="ext" type="text" id="ext"
                                                   value="<?php echo $ext; ?>" readonly></p>

        <p>Heslo: <label for="pass"></label><input name="pass" type="text" id="pass" required="required"
                                                   pattern=".{8,}" value="<?php print $secret[0]; ?>"></p>

        <p>IP adresa: <label for="ip"></label><input name="ip" type="text" id="ip" required="required"
                                                     value="<?php print $ip[0]; ?>"></p>

        <p><input type="submit" name="add" id="add"></p>
    </form>
</div>
</body>
</html>