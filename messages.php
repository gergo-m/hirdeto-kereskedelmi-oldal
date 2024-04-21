<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "header.php";
include_once "db_connection.php";
if (isset($_GET["receiver"])) {
    $receiver = $_GET["receiver"];
    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($receiver == $value["business_id"]) {
            $business = $value;
            break;
        }
    }

    if (empty($business)) {
        echo "No business exists with that ID";
    }

    $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];

}
?>
<form method="POST" action="messages_db.php">
    <input type="text" id="receiver" name="receiver" value="<?php echo $receiver; ?>" hidden>
    <input type="text" id="message" name="message">
    <label for="message"></label>
    <button type="submit">Send</button>
</form>
</body>
</html>