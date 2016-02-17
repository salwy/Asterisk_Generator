<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 12. 12. 2015
 * Time: 0:19
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
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
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
$input_number = 1;
$sql_lookup = "SELECT sip.id, sip.ext, sip.secret, sip.ip, sip.number_id, numbers.number FROM sip LEFT OUTER JOIN numbers ON sip.number_id=numbers.id ORDER BY sip.id";
$lookup_all = db_select($sql_lookup);
echo '
<div id="lookup">
    <table border="1">';
foreach ($lookup_all as $lookup) {
    echo '<script>
$(function () {
    $("input[id=\'edit' . $input_number . '\']").click(function (e) {
        e.preventDefault();
        var id = $("#id' . $input_number . '").val();
        var ext = $("#ext' . $input_number . '").val();
        var secret = $("#secret' . $input_number . '").val();
        var ip = $("#ip' . $input_number . '").val();
        var number = $("#number' . $input_number . '").val();
        var number_original = $("#number_original' . $input_number . '").val();
        $.post("Configs/submit.php", {
            id: id,
            ext: ext,
            secret: secret,
            ip: ip,
            number: number,
            number_original: number_original,
            action: "edit"
        }, function (edit) {

            $("#editing").html(edit);
        });
    });
    $("input[id=\'delete' . $input_number . '\']").click(function (e) {
        e.preventDefault();
        var id = $("#id' . $input_number . '").val();
        var ext = $("#ext' . $input_number . '").val();
        var number_original = $("#number_original' . $input_number . '").val();
        $.post("Configs/submit.php", {
            id: id,
            ext: ext,
            number_original: number_original,
            action: "delete"
        }, function (edit) {

            $("#editing").html(edit);
        });
    })
})
</script>
';
    echo "<form method='post' action='Configs/submit.php' id='form_number" . $input_number . "'><tr>
    <td height='40' width='50' align='center'><input type='text' size='3' required='required' id='id" . $input_number . "' name='id' value=" . $lookup['id'] . " readonly='readonly'></td>
    <td width='200' align='center'><input type='text' size='4' required='required' id='ext" . $input_number . "' name='ext' value=" . $lookup['ext'] . " readonly='readonly'></td>
    <td width='200' align='center'><input type='text' size='12' required='required' id='secret" . $input_number . "' name='secret' value=" . $lookup['secret'] . "></td>
    <td width='200' align='center'><input type='text' size='12' required='required' id='ip" . $input_number . "' name='ip' value=" . $lookup['ip'] . "></td>
    <td width='300' align='center'>";
    $sql_number = "SELECT number FROM numbers WHERE in_use = 0";
    $numbers = db_select($sql_number);
    echo "<select name='number' id='number" . $input_number . "'>
            <option value=" . $lookup['number'] . ">" . $lookup['number'] . "</option>
            <option value=''></option>";
    foreach ($numbers as $number) {
        echo "<option value=" . $number['number'] . ">" . $number['number'] . "</option>";
    }
    echo "</select>";

    echo "<input type='hidden' size='15' id='number_original" . $input_number . "' name='number_original' value=" . $lookup['number'] . "></td>
    <td><input name='edit' id='edit" . $input_number . "' type='submit' value='Save'></td>
    <td><input name='delete' id='delete" . $input_number . "' type='submit' value='Delete'></td></tr></form>";
    $input_number = $input_number + 1;
}
echo "</table></div>";
?>
<div style="position: absolute; top: 80%" id="editing"></div>
</body>
</html>
