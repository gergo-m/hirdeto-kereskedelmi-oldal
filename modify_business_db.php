<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_POST["business_name"])
    && isset($_POST["business_description"])
    && isset($_POST["business_year_of_foundation"])
    && isset($_POST["owner_id"])
    && isset($_POST["business_id"])
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
    $business_id = validate($_POST["business_id"]);
    $services_array = array();
    for ($i = 0; $i < count($_POST["service_names"]); $i++) {
        $services_array[$_POST["service_names"][$i]] = validate($_POST["service_prices"][$i]);
    }
    $services = "";
    foreach ($services_array as $service_name => $service_price) {
        if (!empty($service_name)) {
            $services .= $service_name . Tmp::$service_name_price_separator . $service_price . Tmp::$service_separator;
        }
    }
    $services = substr($services, 0, -1*strlen(Tmp::$service_separator));

    if (empty($business_name)) {
        header("Location: view_business.php?msg=Business name is required");
        exit();
    } else if (empty($business_description)) {
        header("Location: view_business.php?msg=Business description is required");
        exit();
    } else if (empty($business_year_of_foundation)) {
        header("Location: view_business.php?msg=Year of foundation is required");
        exit();
    } else if (empty($owner_id)) {
        header("Location: view_business.php?msg=Owner ID is required");
        exit();
    } else if (empty($business_id)) {
        header("Location: view_business.php?msg=Business ID is required");
        exit();
    } else if (empty($services)) {
        header("Location: view_business.php?msg=At least one completed service is required");
        exit();
    } else {
        $conn = $GLOBALS["db_connection"];
        $sqlCheckIfExists = "SELECT * FROM businesses
                WHERE business_id='$business_id'";
        $resultIfExists = mysqli_query($conn, $sqlCheckIfExists);
        echo mysqli_num_rows($resultIfExists);
        if (mysqli_num_rows($resultIfExists) !== 1) {
            header("Location: view_business.php?id=$business_id&msg=No business exists with this ID");
            exit();
        }

        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "UPDATE `businesses` SET `name`='$business_name',`description`='$business_description',`year_of_foundation`='$business_year_of_foundation',`services`='$services',`owner_id`='$owner_id' WHERE `business_id`='$business_id'";
        $conn->query($sql);
        header("Location: view_business.php?id=$business_id&msg=Business has been modified");
    }
} else {
    echo 'error' . var_dump($_POST);
}

?>