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
?>
<div align="center" style="top: 100px; position: relative;">
    <form action="number_delete_done.php" method="post">
        <p><label for="number">Cislo: </label>
            <select name="number" id="number">
                <?php
                $sql_number = $conn->query("SELECT number FROM numbers");
                while ($row_number = $sql_number->fetch_row()) {
                    print "<option value=$row_number[0]>" . $row_number[0] . "</option>";
                }
                $sql_number->free();
                ?>
            </select></p>

        <p><input type="submit" name="submit" id="submit"></p>
    </form>
</div>
<?php
$conn->close();
?>
</body>
</html>
