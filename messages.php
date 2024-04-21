<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="messages_style.css">
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
}
?>
<div class="flex_container">
    <?php
        $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
        foreach ($_SESSION["messages"] as $key => $value): ?>
        <?php if (isset($_GET["receiver"]) && $_GET["receiver"] == $value["business_id"] && $user_id == $value["sender_id"]) {
                $business_id = $value["business_id"];
                $message = $value["message"]; ?>
                <div class="message_container">
                    <div class="message_property"><p class="names"><?php echo explode("_", $value["sender_id"])[0] . " -> " . explode("_", $value["receiver_id"])[0]; ?></p></div>
                    <div class="message_property"><p class="message"><?php echo $message;?></p></div>
                </div>
                <style>
                    .message_container .names::after {
                        content: "(about <?php echo $business_id; ?>)";
                    }
                </style>
        <?php } ?>



    <?php endforeach; ?>
    <form method="POST" action="messages_db.php">
        <div class="form">
            <input type="text" id="receiver" name="receiver" value="<?php echo $receiver; ?>" hidden>
            <div class="textinput">
                <input type="text" id="message" name="message">
                <label for="message">Message <?php echo $business["name"]; ?></label>
                <button type="submit">Send</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>