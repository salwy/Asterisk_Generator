<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 12. 12. 2015
 * Time: 13:21
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
$file = 'C:\xampp\htdocs\Asterisk_Generator\Asterisk Config\sip_channels.conf';
$sip = fopen("$file", "w") or die("Nepodarilo se otevrit soubor");

$sql_ext = $conn->query("SELECT ext FROM sip");
$sql_secret = $conn->query("SELECT secret FROM sip");
$sql_permit = $conn->query("SELECT ip FROM sip");

while ($txt_ext = $sql_ext->fetch_row()) {
    $txt_ext_1 = "[$txt_ext[0]]\n";
    fwrite($sip, $txt_ext_1);
    $txt_deny = "deny=0.0.0.0/0.0.0.0\n";
    fwrite($sip, $txt_deny);
    $txt_secret = $sql_secret->fetch_row();
    $txt_secret = "secret=$txt_secret[0]\n";
    fwrite($sip, $txt_secret);
    $txt_dtfmode = "dtfmode=rfc2833\n";
    fwrite($sip, $txt_dtfmode);
    $txt_canreinvite = "canreinvite=no\n";
    fwrite($sip, $txt_canreinvite);
    $txt_context = "context=from-internal-ictwos\n";
    fwrite($sip, $txt_context);
    $txt_host = "host=dynamic\n";
    fwrite($sip, $txt_host);
    $txt_type = "type=friend\n";
    fwrite($sip, $txt_type);
    $txt_nat = "nat=yes\n";
    fwrite($sip, $txt_nat);
    $txt_port = "port=5060\n";
    fwrite($sip, $txt_port);
    $txt_qualify = "qualify=yes\n";
    fwrite($sip, $txt_qualify);
    $txt_callgroup = "callgroup=\n";
    fwrite($sip, $txt_callgroup);
    $txt_pickupgroup = "pickupgroup=\n";
    fwrite($sip, $txt_pickupgroup);
    $txt_dial = "dial=SIP/$txt_ext[0]\n";
    fwrite($sip, $txt_dial);
    $txt_mailbox = "mailbox=$txt_ext[0]@device\n";
    fwrite($sip, $txt_mailbox);
    $txt_permit = $sql_permit->fetch_row();
    $txt_permit = "permit=$txt_permit[0]/255.255.255.0\n";
    fwrite($sip, $txt_permit);
    $txt_callerid = "callerid=device <$txt_ext[0]>\n";
    fwrite($sip, $txt_callerid);
    $txt_callcounter = "callcounter=yes\n";
    fwrite($sip, $txt_callcounter);
    $txt_faxdetect = "faxdetect=no";
    fwrite($sip, $txt_faxdetect);
    $txt_space = "\n\n";
    fwrite($sip, $txt_space);
}
fclose($sip);
$sql_ext->free();
$sql_secret->free();
$sql_permit->free();
$conn->close();
?>
<div align="center" style="position: relative; top: 100px;">
    <?php
    $open = fopen("$file", "r");
    if ($open) {
        while (($line = fgets($open)) !== false) {
            print "$line <br>";
        }

        fclose($open);
    } else {
        print "Nepodarilo se otevrit soubor";
    }
    ?>
</div>
</body>
</html>

