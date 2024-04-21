<?php
include_once "db_connection.php";
$sql = "SELECT * FROM businesses";
$result = mysqli_query($GLOBALS["db_connection"], $sql);

if (!$result) {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($GLOBALS["db_connection"]);
    header("Location: display-error.php?error=$error");
    return;
}


if (mysqli_num_rows($result) == 0) {
    echo "Nem található vállalkozás az adatbázisban!";
}
else
{
    $_SESSION["businesses"] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["businesses"][] = $row;
        //printf ("%s (%s)\n", $row["id"], $row["name"]);
    }
}
?>