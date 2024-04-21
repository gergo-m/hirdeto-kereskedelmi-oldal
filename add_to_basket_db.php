<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_GET["business_id"])
    && isset($_GET["service_index"])) {
    $business_id = $_GET["business_id"];
    $service_index = $_GET["service_index"];

    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($value["business_id"] === $business_id) {
            $business = $value;
            break;
        }
    }
    $_SESSION["basket"][] = [$business, implode(Tmp::$service_separator, [$business["business_id"], explode(Tmp::$service_separator, $business["services"])[$service_index]])];
    header("Location: view_business.php?id=" . $business_id);
    exit();
}