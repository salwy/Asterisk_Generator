<?php
/**
 * Created by PhpStorm.
 * User: Salwy
 * Date: 11.01.16
 * Time: 13:44
 */
function db_connect()
{

    static $connection;

    if (!isset($connection)) {

        $config = parse_ini_file('config.ini');
        $connection = new mysqli($config['server'], $config['username'], $config['password'], $config['database']);
    }

    if ($connection === false) {
        return mysqli_connect_error();
    }
    return $connection;
}


function db_query($query)
{
    $connection = db_connect();

    $result = mysqli_query($connection, $query);

    return $result;

}


function db_error()
{
    $connection = db_connect();
    return mysqli_error($connection);
}


function db_select($query)
{
    $rows = array();
    $result = db_query($query);

    if ($result === false) {
        return false;
    }


    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_escape($value) {
    $connection = db_connect();
    return mysqli_real_escape_string($connection,$value);
}