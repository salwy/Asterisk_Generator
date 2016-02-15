<?php
/**
 * Created by PhpStorm.
 * User: Salwy
 * Date: 21.01.16
 * Time: 10:09
 */
require_once ('db_connect.php');
session_start();
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query = db_query("select * from users where secret='$password' AND user='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 0) {
            $_SESSION['login_user']=$username;
            header("location: /www/Asterisk_Generator/index.php");
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>