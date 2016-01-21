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
<title>Asterisk Generato</title>

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
<div style="position: relative; top: 100px;"
     align="center">
    <table border="1">
        <tr>
            <td width="400px"
                height="200px"
                align="center"
                style="position: relative">
                <form action="number_new_add.php"
                      method="post">
                    <p><label for="ext">Tel. cislo </label><label for="number"></label><input name="number"
                                                                                              type="number"
                                                                                              id="number"
                                                                                              required="required"
                                                                                              pattern="[0-9]"></p>

                    <p><input type="submit"
                              name="add"
                              id="add"></p>
                </form>
            </td>
            <td width="200px"
                valign="top">
                <h3>Cisla</h3>
                <ul>
                    <?php
                    $sql_numbers = "SELECT number FROM numbers";
                    $numbers = db_select($sql_numbers);
                    foreach ($numbers as $number) {
                        print "<li>" . $number['number'] . "</li>";
                    }
                    ?>
                </ul>
            </td>
        </tr>
    </table>
</div>
</body>
</html>