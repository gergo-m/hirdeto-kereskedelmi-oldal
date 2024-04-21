<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_POST["business_id_receiver"]) && isset($_POST["message"])) {
    $business_id_receiver = $_POST["business_id_receiver"];
    $message = $_POST["message"];
    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($business_id_receiver == $value["business_id"]) {
            $business = $value;
            break;
        }
    }
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
    $message = validate($message);
    if (empty($business)) {
        echo "No business exists with that ID";
    } else if (!empty($message)) {
        $conn = $GLOBALS["db_connection"];
        if ($user_id == $business["owner_id"]) {
            $receiver_id = $_POST["receiver_if_owner"];
        } else {
            $receiver_id = $business["owner_id"];
        }
        $business_id = $business["business_id"];
        $message_id = uniqid("", true);
        $sql = "INSERT INTO `messages`(`id`, `sender_id`, `receiver_id`, `message`, `business_id`, `message_id`) VALUES ('','$user_id','$receiver_id','$message','$business_id','$message_id')";
        $conn->query($sql);

        header("Location: messages.php?business_id=$business_id");
    }
}
?>