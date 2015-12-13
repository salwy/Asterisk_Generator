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

$conn = new mysqli($server, $username, $password, $database);

$sql_ext = $conn->query("SELECT ext FROM sip");
$sql_secret = $conn->query("SELECT secret FROM sip");
$sql_permit = $conn->query("SELECT ip FROM sip");
?>
    <div align="center" style="top: 100px; position: relative">
        <table border="1">
            <?php
            while ($ext = $sql_ext->fetch_row()) {
                $secret = $sql_secret->fetch_row();
                $permit = $sql_permit->fetch_row();
                print "<tr><td height='40' width='50' align='center'>$ext[0]</td><td width='200' align='center'>$secret[0]</td><td width='200' align='center'>$permit[0]</td></tr>";
            }
            ?>
        </table>
    </div>
<?php
$sql_ext->free();
$conn->close();
?>