<?php
include_once "db-connection.php";
$sql = "SELECT * FROM businesses";
$result = mysqli_query($GLOBALS["db_connection"], $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION["businesses"] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["businesses"][] = $row;
    }
}
?>