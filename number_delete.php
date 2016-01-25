<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 21:01
 */

require_once('Configs/db_connect.php');

session_start();
if (isset($_SESSION['login_user'])) {
} else {
    header("location: index.php");
}
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
<div align="center"
     style="top: 100px; position: relative;">
    <form action="number_delete_done.php"
          method="post">
        <p><label for="number">Cislo: </label>
            <select name="number"
                    id="number">
                <?php
                $sql_number = "SELECT number FROM numbers";
                $numbers = db_select($sql_number);
                foreach ($numbers as $number) {
                    print "<option value=" . $number['number'] . ">" . $number['number'] . "</option>";
                }
                ?>
            </select></p>

        <p><input type="submit"
                  name="submit"
                  id="submit"></p>
    </form>
</div>
</body>
</html>
