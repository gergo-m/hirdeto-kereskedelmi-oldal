<?php
session_start();
include_once "db_connection.php";
if (session_id() != "" && isset($_SESSION['email'])) {
    $conn = $GLOBALS["db_connection"];
    $sql = "DELETE FROM `users` WHERE `email`='" . $_SESSION['email'] . "'";
    $conn->query($sql);
    session_unset();
    session_destroy();
    header("Location: register.php?error=Profile deleted successfully... sorry to see you go :(");
}
?>
