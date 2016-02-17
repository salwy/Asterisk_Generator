<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/12/2016
 * Time: 10:26 AM
 */

require_once('db_connect.php');

session_start();
if (isset($_SESSION['login_user'])) {
} else {
    header("location: index.php");
}
$username = $_SESSION['login_user'];
$id = (int)db_escape($_POST['id']);
$ext = (int)db_escape($_POST['ext']);
$pass = db_escape($_POST['secret']);
$number = db_escape($_POST['number']);
$number_original = db_escape($_POST['number_original']);
$ip = db_escape($_POST['ip']);
$action = db_escape($_POST['action']);
$number_id = "";
$number_id_original = "";

if ($action == "edit") {
    if ($number == $number_original) {
        $sql_input = "UPDATE sip SET secret='$pass', ip='$ip' WHERE ext='$ext'";

        $sql_log_input = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE sip SET secret=$pass, ip=$ip WHERE ext=$ext')";

        if ((db_query($sql_log_input) && db_query($sql_input)) == true) {
            echo "Ext " . $ext . " was successfully updated";
        } else {
            echo "Error: $sql_input. " . db_error();
        }
    } else {
        $sql_number = "SELECT id FROM numbers WHERE number = '$number'";
        $number_id_a = db_select($sql_number);
        foreach ($number_id_a as $number_id) {
            $number_id = $number_id['id'];
        }
        echo "Number: " . $number_id . "<br />";
        $sql_number_original = "SELECT id FROM numbers WHERE number = '$number_original'";
        $number_id_original_a = db_select($sql_number_original);
        foreach ($number_id_original_a as $number_id_original) {
            $number_id_original = $number_id_original['id'];
        }
        echo "Original Number: " . $number_id_original . "<br />";
        $sql_in_use_original = "UPDATE numbers SET in_use = 0 WHERE id = $number_id_original";
        $sql_in_use = "UPDATE numbers SET in_use = 1 WHERE id = $number_id";

        $sql_input = "UPDATE sip SET secret = '$pass', ip = '$ip', number_id = '$number_id' WHERE id = '$id' AND ext = '$ext'";

        $sql_log_input = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE sip SET secret = $pass, ip = $ip, number_id = $number_id WHERE id = $id AND ext = $ext') ";
        $sql_log_in_use_original = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE numbers SET in_use = 0 WHERE id = $number_id_original')";
        $sql_log_in_use = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE numbers SET in_use = 1 WHERE id = $number_id')";


        if ($number_id_original == "") {
            if ((db_query($sql_in_use) && db_query($sql_input) && db_query($sql_log_input) && db_query($sql_log_in_use)) == true) {
                echo "Ext " . $ext . " was successfully updated";
            } else {
                echo "Error $sql_input. " . db_error();
            }
        } elseif ($number_id == "") {
            echo $number_id;
            if ((db_query($sql_input) && db_query($sql_log_input) && db_query($sql_in_use_original) && db_query($sql_log_in_use_original)) == true) {
                echo "Ext " . $ext . " was successfully updated";
            } else {
                echo "Error $sql_input. " . db_error();
            }
        } else {
            if ((db_query($sql_in_use) && db_query($sql_in_use_original) && db_query($sql_input) && db_query($sql_log_input) && db_query($sql_log_in_use) && db_query($sql_log_in_use_original)) == true) {
                echo "Ext " . $ext . " was successfully updated";
            } else {
                echo "Error $sql_input. " . db_error();
            }
        }
    }
} elseif ($action == "delete") {

    $sql_number_original = "SELECT id FROM numbers WHERE number = '$number_original'";
    $number_id_original_a = db_select($sql_number_original);
    foreach ($number_id_original_a as $number_id_original) {
        $number_id_original = $number_id_original['id'];
    }

    $sql_delete = "DELETE FROM sip WHERE id='$id'";
    $sql_in_use_original = "UPDATE numbers SET in_use = 0 WHERE id = $number_id_original";

    $sql_log_delete = "INSERT INTO logs (user, command) VALUES ('$username', 'DELETE FROM sip WHERE ext=$ext AND id=$id')";
    $sql_log_in_use_original = "INSERT INTO logs (user, command) VALUES ('$username', 'UPDATE numbers SET in_use = 0 WHERE id = $number_id_original')";

    if ($number_id_original == "") {
        if ((db_query($sql_delete) && db_query($sql_log_delete)) == true) {
            echo $id ."<br />";
            echo "Ext " . $ext . " was successfully deleted";
        } else {
            echo "Error $sql_input. " . db_error();
        }
    } else {
        if ((db_query($sql_in_use_original) && db_query($sql_delete) && db_query($sql_log_delete) && db_query($sql_log_in_use_original)) == true) {
            echo "Ext " . $ext . " was successfully deleted";
        } else {
            echo "Error $sql_input. " . db_error();
        }
    }

}

