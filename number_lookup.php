<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 12. 12. 2015
 * Time: 0:19
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

$sql_id = $conn->query("SELECT id FROM numbers");
$sql_number = $conn->query("SELECT number FROM numbers");

?>
<div align="center" style="top: 100px; position: relative">
    <table border="1">
        <?php
        while ($id = $sql_id->fetch_row()) {
            $number = $sql_number->fetch_row();
            $sql_ext = $conn->query("SELECT ext FROM sip WHERE number_id=$id[0]");
            $ext = $sql_ext->fetch_row();
            print "<tr><td height='40' width='30' align='center'>$id[0]</td><td width='200' align='center'>$number[0]</td><td width='50' align='center'>$ext[0]</td></tr>";
        }
        ?>
    </table>
</div>
<?php
$conn->close();
?>
</body>
</html>
