<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 12. 12. 2015
 * Time: 13:21
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
<?php
$file = $_SERVER['DOCUMENT_ROOT'] . '/Asterisk_Generator/Asterisk Config/sip_channels.conf';
$sip = fopen("$file", "w") or die("Nepodarilo se otevrit soubor");

$sql = "SELECT ext, secret, ip FROM sip";
$ext_all = db_select($sql);

foreach ($ext_all as $ext) {
    $ext_1 = $ext['ext'];
    $txt_ext_1 = "[$ext_1]\n";
    fwrite($sip, $txt_ext_1);
    $txt_deny = "deny=0.0.0.0/0.0.0.0\n";
    fwrite($sip, $txt_deny);
    $txt_secret = $ext['secret'];
    $txt_secret = "secret=$txt_secret\n";
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
    $txt_dial = "dial=SIP/$ext_1\n";
    fwrite($sip, $txt_dial);
    $txt_mailbox = "mailbox=$ext_1@device\n";
    fwrite($sip, $txt_mailbox);
    $txt_permit = $ext['ip'];
    $txt_permit = "permit=$txt_permit/255.255.255.0\n";
    fwrite($sip, $txt_permit);
    $txt_callerid = "callerid=device <$ext_1>\n";
    fwrite($sip, $txt_callerid);
    $txt_callcounter = "callcounter=yes\n";
    fwrite($sip, $txt_callcounter);
    $txt_faxdetect = "faxdetect=no";
    fwrite($sip, $txt_faxdetect);
    $txt_space = "\n\n";
    fwrite($sip, $txt_space);
}
?>
<div align="center"
     style="position: relative; top: 100px;">
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

