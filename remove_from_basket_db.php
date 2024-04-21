<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_GET["business_id"])
    && isset($_GET["basket_index"])) {
    $business_id = $_GET["business_id"];
    $basket_index = $_GET["basket_index"];

    if ($_SESSION["basket"][$basket_index][0]["business_id"] == $business_id) {
        unset($_SESSION["basket"][$basket_index]);
    }
    header("Location: basket.php");
    exit();
}