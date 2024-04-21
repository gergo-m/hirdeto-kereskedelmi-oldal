<?php

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "hirdeto-kereskedelmi-oldal";
$db_connection = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$db_connection) {
    echo "Connection failed!";
}
