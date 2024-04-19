<?php
session_start();
include_once "db-connection.php";
if (isset($_POST["business_name"])
    && isset($_POST["business_description"])
    && isset($_POST["business_year_of_foundation"])
    && isset($_POST["owner_id"])
    && isset($_POST["service_names"])
    && isset($_POST["service_prices"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $business_name = validate($_POST["business_name"]);
    $business_description = validate($_POST["business_description"]);
    $business_year_of_foundation = validate($_POST["business_year_of_foundation"]);
    $owner_id = validate($_POST["owner_id"]);
    $service_names = implode(";srvc;sprtr;", $_POST["service_names"]);
    $service_prices = implode(";srvc;sprtr;", $_POST["service_prices"]);

    if (empty($business_name)) {
        header("Location: submit_business.php?error=Business name is required");
        exit();
    } else if (empty($business_description)) {
        header("Location: submit_business.php?error=Business description is required");
        exit();
    } else if (empty($business_year_of_foundation)) {
        header("Location: submit_business.php?error=Year of foundation is required");
        exit();
    } else if (empty($owner_id)) {
        header("Location: submit_business.php?error=Owner ID is required");
        exit();
    } else if (empty($service_names) || empty($service_prices)) {
        header("Location: submit_business.php?error=At least one completed service is required");
        exit();
    } else {
        $conn = $GLOBALS["db_connection"];
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "INSERT INTO `businesses`(`id`, `name`, `description`, `year_of_foundation`, `service_name`, `service_price`, `owner_id`) VALUES ('','$business_name','$business_description','$business_year_of_foundation','$service_names','$service_prices','$owner_id')";
        $conn->query($sql);
    }
} else {
    echo 'error' . var_dump($_POST);
}

?>