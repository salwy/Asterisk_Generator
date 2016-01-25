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
<link rel="stylesheet"
      href="Configs/style.css">
<body>
<div id="logged">Logged in as:<span> <?php echo $_SESSION['login_user'] ?> </span>
    <button name="logout"><a href="Configs/logout.php">Logout</a></button>
</div>
<div id="h1"><h1>Welcome <?php echo $_SESSION['login_user'] ?> to Asterisk Generator pre-Alpha</h1></div>
<div id="menu">
    <button name="homapage"><a href="index.php">Homepage</a></button>
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

<div id="lookup">
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Time</td>
            <td>User</td>
            <td>Command</td>
        </tr><?php
        $sql_log = "SELECT * FROM logs";
        $log = db_select($sql_log);
        foreach ($log as $row) {
            print "<tr><td>" . $row['id'] . "</td>" . "<td>" . $row['time'] . "</td>" . "<td>" . $row['user'] . "</td>" . "<td>" . $row['command'] . "</td></tr>";
        }
        ?>
    </table>
</div>
</html>