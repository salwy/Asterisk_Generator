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
?>
<div style="position: relative; top: 100px;" align="center">
    <table border="1">
        <tr>
            <td width="400px" height="200px" align="center" style="position: relative">
                <form action="ext_new_add.php" method="post">
                    <p><label for="ext">Klapka: </label><input name="ext" type="number" id="ext" required="required"
                                                               pattern="[0-9]"></p>

                    <p>Heslo: <label for="ext"></label><input name="pass" type="text" id="ext" required="required"
                                                              pattern=".{8,}" placeholder="Minimalne 8 znaku"></p>

                    <p>IP adresa: <label for="ip"></label><input name="ip" type="text" id="ip" required="required"></p>

                    <p><label for="number">Telefonni cislo: </label>
                        <select name="number" id="number">
                            <option value=""></option>
                            <?php
                            $sql_number = $conn->query("SELECT number FROM numbers WHERE in_use='0'");
                            while ($row = $sql_number->fetch_row()) {
                                print "<option value=$row[0]>" . $row[0] . "</option>";
                            }
                            $sql_number->free();
                            ?>
                        </select></p>

                    <p><input type="submit" name="add" id="add"></p>
                </form>
            </td>
            <td width="200px" valign="top">
                <h3>Pouzivane klapky</h3>
                <ul>
                    <?php
                    $sql = $conn->query("SELECT ext FROM sip");
                    while ($row = $sql->fetch_row()) {
                        print "<li>$row[0]</li>";
                    }
                    ?>
                </ul>
            </td>
        </tr>
    </table>
</div>
<?php
$sql->free();
$conn->close();
?>
</body>
</html>