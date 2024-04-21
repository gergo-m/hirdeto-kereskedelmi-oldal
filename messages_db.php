<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_POST["receiver"]) && isset($_POST["message"])) {
    $receiver = $_POST["receiver"];
    $message = $_POST["message"];
    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($receiver == $value["business_id"]) {
            $business = $value;
            break;
        }
    }
    if (empty($business)) {
        echo "No business exists with that ID";
    } else if (!empty($message)) {
        $conn = $GLOBALS["db_connection"];
        $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
        $receiver_id = $business["owner_id"];
        $business_id = $business["business_id"];
        $message_id = uniqid("", true);
        $sql = "INSERT INTO `messages`(`id`, `sender_id`, `receiver_id`, `message`, `business_id`, `message_id`) VALUES ('','$user_id','$receiver_id','$message','$business_id','$message_id')";
        $conn->query($sql);

        // get messages
        $sqlGetMessages = "SELECT * FROM messages
                WHERE sender_id='$user_id' AND receiver_id='$receiver_id' AND business_id='$business_id'";
        $result = mysqli_query($GLOBALS["db_connection"], $sqlGetMessages);
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email
                && password_verify($password, $row['password'])) {

                echo "Logged in!";
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
            }
        }
        header("Location: messages.php?receiver=$receiver");
        exit();
    }
}
?>