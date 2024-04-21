<?php
include_once "header.php";
include_once "topnav.php";
include_once "db_connection.php";
if (isset($_GET["business_id"])
    && isset($_GET["basket_index"])) {
    $business_id = $_GET["business_id"];
    $basket_index = $_GET["basket_index"];

    if (explode(Tmp::$service_name_price_separator, $_SESSION["basket"][$basket_index][2])[0] == $business_id) {
        unset($_SESSION["basket"][$basket_index]);
    }

    $email = $_SESSION["email"];

    $basket = "";
    foreach ($_SESSION["basket"] as $key => $value) {
        $basket .= implode(Tmp::$service_separator, $value) . Tmp::$item_separator;
    }
    $basket = substr($basket, 0, -1*strlen(Tmp::$item_separator));

    var_dump($basket);

    $conn = $GLOBALS["db_connection"];

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $sql = "UPDATE `users` SET `basket_contents`='$basket' WHERE `email`='$email'";
    $conn->query($sql);

    $_SESSION["basket"] = array();
    foreach (explode(Tmp::$item_separator, $basket) as $key => $value) {
        $_SESSION["basket"][] = [explode(Tmp::$service_separator, $value)[0], explode(Tmp::$service_separator, $value)[1],  explode(Tmp::$service_separator, $value)[2]];
    }

    header("Location: basket.php");
    exit();
}