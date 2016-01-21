<?php
/**
 * Created by PhpStorm.
 * User: Salwy
 * Date: 21.01.16
 * Time: 10:33
 */
session_start();
if(isset($_SESSION['login_user'])){}
else {
    header("location: index.php");
}
?>
<html>
<title>Asterisk Generator</title>
<link rel="stylesheet"
      href="Configs/style.css">
<body>
<h1 align="center">Welcome <?php echo $_SESSION['login_user'] ?> to  Asterisk Generator pre-Alpha</h1>
<div id="logged">Logged in as: <?php echo $_SESSION['login_user'] ?>
<button name="logout"><a href="Configs/logout.php">Logout</a></button> </div>
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

</body>
</html>
