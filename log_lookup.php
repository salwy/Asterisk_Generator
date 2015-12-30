<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 29. 12. 2015
 * Time: 16:58
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
?>

<div align="center">
    <h3>Vypis logu</h3>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Time</td>
            <td>User</td>
            <td>Command</td>
        </tr><?php
        $sql_log = $conn->query("SELECT * FROM logs");
        while ($log = $sql_log->fetch_row()) {
            print "<tr><td>$log[0]</td>" . "<td>$log[1]</td>" . "<td>$log[2]</td>" . "<td>$log[3]</td></tr>";
        }
        ?>
    </table>
</div>
</html>