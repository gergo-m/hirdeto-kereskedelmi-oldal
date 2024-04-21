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
if (session_id() === "" || !isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET["business_id"])) {
    $business_id_receiver = $_GET["business_id"];
    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($business_id_receiver == $value["business_id"]) {
            $business = $value;
            break;
        }
    }

    if (empty($business)) {
        echo "No business exists with that ID";
    }

    $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];

    // get messages
    $sqlGetMessages = "SELECT * FROM messages
                WHERE (sender_id='$user_id' OR receiver_id='$user_id')";
    $result = mysqli_query($GLOBALS["db_connection"], $sqlGetMessages);

    if (!$result) {
        $error = "ERROR: Was not able to execute $sqlGetMessages. " . mysqli_error($GLOBALS["db_connection"]);
        header("Location: display-error.php?msg=$error");
        return;
    }

    if (mysqli_num_rows($result) == 0) {
        echo "No messages were found.";
    } else {
        $_SESSION["messages"] = array();
        $_SESSION["usersToMessage"] = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["messages"][] = $row;
            if ($row["sender_id"] != $user_id && !in_array($row["sender_id"], $_SESSION["usersToMessage"])) {
                $_SESSION["usersToMessage"][] = $row["sender_id"];
            }
        }
    }
}
?>
<div class="flex_container">
    <?php if ($user_id == $business["owner_id"]): ?>
    <label for="users_to_message">Choose a user to message:</label>
    <select name="users_to_message" id="users_to_message" onchange="window.location = 'messages.php?business_id=<?php echo $business_id_receiver; ?>&user_to_message=' + this.value;">
        <?php foreach ($_SESSION["usersToMessage"] as $key => $value): if (!isset($_GET["user_to_message"])) {$_GET["user_to_message"] = $value;} ?>
        <option value="<?php echo $value; ?>" <?php if (isset($_GET["user_to_message"]) && $_GET["user_to_message"] == $value) {echo "selected";} ?>><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    <?php endif; ?>
    <?php
        $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
        if (isset($_SESSION["messages"]) && $_SESSION["messages"] != null) {
        foreach ($_SESSION["messages"] as $key => $value): ?>
        <?php if (isset($_GET["business_id"]) && $_GET["business_id"] == $value["business_id"] && ($user_id != $business["owner_id"] || ($_GET["user_to_message"] == $value["sender_id"] || $_GET["user_to_message"] == $value["receiver_id"]))) {

                $business_id = $value["business_id"];
                $message = $value["message"];?>
                <div class="message_container">
                    <div class="message_property"><p class="names"><?php echo explode("_", $value["sender_id"])[0] . " -> " . explode("_", $value["receiver_id"])[0]; ?></p></div>
                    <div class="message_property"><p class="message"><?php echo $message;?></p></div>
                </div>
        <?php } ?>
    <?php endforeach; }?>
    <form method="POST" action="messages_db.php">
        <div class="form">
            <input type="text" id="business_id_receiver" name="business_id_receiver" value="<?php echo $business_id_receiver; ?>" hidden>
            <input type="text" id="receiver_if_owner" name="receiver_if_owner" value="<?php if (isset($_GET["user_to_message"])) { echo $_GET["user_to_message"]; } ?>" hidden>
            <div class="textinput">
                <input type="text" id="message" name="message">
                <label for="message">Message <?php echo $business["name"]; ?></label>
                <button type="submit">Send</button>
            </div>
        </div>
    </form>
</div>
</body><?php
$user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
if (isset($_SESSION["messages"]) && $_SESSION["messages"] != null) {
    foreach ($_SESSION["messages"] as $key => $value): ?>
        <?php if (isset($_GET["business_id"]) && $_GET["business_id"] == $value["business_id"] && ($user_id != $business["owner_id"] || ($_GET["user_to_message"] == $value["sender_id"] || $_GET["user_to_message"] == $value["receiver_id"]))) {

            $business_id = $value["business_id"];
            $message = $value["message"];?>
            <style>
                .message_container .names::after {
                    content: "(about <?php echo $business_id; ?>)";
                }
            </style>
        <?php } ?>
    <?php endforeach; }?>
</html>