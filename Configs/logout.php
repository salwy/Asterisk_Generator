<?php
/**
 * Created by PhpStorm.
 * User: Salwy
 * Date: 21.01.16
 * Time: 11:28
 */
session_start();
if(session_destroy())
{
    header("Location: /Asterisk_Generator/index.php");
}
?>