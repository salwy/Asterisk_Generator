<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 21:01
 */
?>
<title>Asterisk Generator</title>
<body>
<h1 align="center">Generator pro Asterisk</h1>

<div align="center">
    <button name="new_extension"><a href="new_extension.php">Nova klapka</a></button>
    <button name="update_extension"><a href="update_extension.php">Uprava klapky</a></button>
    <button name="lookup_extension"><a href="lookup_extension.php">Vypis vsech klapek</a></button>
    <button name="delete_extension"><a href="delete_extension.php">Smazat klapku</a></button>
    <button name="file_generate_new"><a href="file_generate_new.php">Vygenerovat novy SIP.conf</a></button>
    <button name="home"><a href="index.php">Domu</a></button>
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
    <form action="delete_extension_confirm.php" method="post">
        <p><label for="ext">Klapka: </label>
            <select name="ext" id="ext">
                <?php
                $sql_ext = $conn->query("SELECT ext FROM sip");
                while ($row = $sql_ext->fetch_row()) {
                    print "<option value=$row[0]>" . $row[0] . "</option>";
                }
                $sql_ext->free();
                ?>
            </select></p>

        <p><input type="submit" name="submit" id="submit"></p>
    </form>
</div>
<?php
$conn->close();
?>


</body>
