<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11. 12. 2015
 * Time: 23:12
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

$ext = (int)$_POST['ext'];
$sql_secret = "SELECT secret FROM sip WHERE ext=$ext";
$secret = db_select($sql_secret);
foreach ($secret as $secret) {
    $secret = $secret['secret'];
}
$sql_ip = "SELECT ip FROM sip WHERE ext=$ext";
$ip = db_select($sql_ip);
foreach ($ip as $ip) {
    $ip = $ip['ip'];
}
$sql_number_id = "SELECT number_id FROM sip WHERE ext=$ext";
$number_id = db_select($sql_number_id);
foreach ($number_id as $number_id) {
    $number_id = $number_id['number_id'];
}
if (intval($number_id) > 0) {
    $sql_number = "SELECT number FROM numbers WHERE id=$number_id";
    $number = db_select($sql_number);
    foreach ($number as $number) {
        $number = $number['number'];
    }
} else {
    $number = "None";

}
$sql_number_all = "SELECT number FROM numbers WHERE in_use=0";
$numbers_all = db_select($sql_number_all);
?>
<div align="center"
     style="top: 100px; position: relative;">
    <form action="ext_update_done.php"
          method="post">
        <p><label for="ext">Klapka: </label><input name="ext"
                                                   type="text"
                                                   id="ext"
                                                   value="<?php echo $ext; ?>"
                                                   readonly></p>

        <p>Heslo: <label for="pass"></label><input name="pass"
                                                   type="text"
                                                   id="pass"
                                                   required="required"
                                                   pattern=".{8,}"
                                                   value="<?php print $secret; ?>"></p>

        <p>IP adresa: <label for="ip"></label><input name="ip"
                                                     type="text"
                                                     id="ip"
                                                     required="required"
                                                     value="<?php print $ip; ?>"></p>

        <p><label for="number">Telefonni cislo: </label>
            <select name="number"
                    id="number">
                <option value="<?php print $number ?>"><?php print $number; ?></option>
                <option value=""></option>
                <?php
                foreach ($numbers_all as $numbers_all) {
                    print "<option value=" . $numbers_all['number'] . ">" . $numbers_all['number'] . "</option>";
                }
                ?>
            </select></p>

        <p><input type="submit"
                  name="add"
                  id="add"></p>
    </form>
</div>
</body>
</html>