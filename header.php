<?php
session_start();
$page = basename($_SERVER['PHP_SELF']);
class Tmp {
    public static string $service_separator = ";srvc;sprtr;";
    public static string $service_name_price_separator = ";nm;prc;";
    public static string $item_separator = ";tm;sprtr;";
}
?>