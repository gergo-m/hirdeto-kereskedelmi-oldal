<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($_GET["id"])) { echo $_GET["id"]; } ?></title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>
<?php if (isset($_GET["msg"])) { ?>
    <p class="msg"><?php echo $_GET["msg"]; ?></p>
<?php }
if (isset($_GET["id"])) {
    include_once "load_businesses.php";
    $business = "";
    foreach ($_SESSION["businesses"] as $key => $value) {
        if ($value["business_id"] == $_GET["id"]) {
            $business = $value;
            break;
        }
    }
    if (empty($business)) {
        header("Location: view_business.php?msg=No business found with this ID");
        exit();
    }
    $name = $business["name"];
    $description = $business["description"];
    $year_of_foundation = $business["year_of_foundation"];
    $services = $business["services"];
    $owner_id = $business["owner_id"];
    $business_id = $business["business_id"];
}
?>
<h1><?php
    $user_id = "";
    if(isset($_SESSION["email"])) {
        $user_id = explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0];
    }
    if ($owner_id === $user_id || $user_id === "admin_admin") {
        echo "Edit your business below";
        $readonly = false;
    } else {
        $readonly = true;
    }
        ?></h1>
<form method="POST" action="modify_business_db.php">
    <div class="textinput">
        <input type="text" id="business_name" name="business_name" value="<?php echo $name; ?>" autocomplete="off" <?php if ($readonly) {echo "readonly";} ?>>
        <label for="business_name">Business name</label>
    </div>
    <div class="textinput">
        <input type="text" id="business_description" name="business_description" value="<?php echo $description; ?>" autocomplete="off" <?php if ($readonly) {echo "readonly";} ?>>
        <label for="business_description">Business description</label>
    </div>
    <div class="textinput">
        <input type="number" id="business_year_of_foundation" name="business_year_of_foundation" value="<?php echo $year_of_foundation; ?>" autocomplete="off" <?php if ($readonly) {echo "readonly";} ?>>
        <label for="business_year_of_foundation">Year of Foundation</label>
    </div>
    <div class="textinput">
        <input type="text" id="owner_id" name="owner_id" value="<?php echo $owner_id; ?>" autocomplete="off" readonly>
        <label for="owner_id">Owner ID</label>
    </div>
    <div class="textinput">
        <input type="text" id="business_id" name="business_id" value="<?php echo $business_id; ?>" autocomplete="off" readonly>
        <label for="business_id">Business ID</label>
    </div>
    <div class="business-services">
        <?php foreach (explode(Tmp::$service_separator, $services) as $index => $service): ?>
            <hr>
            <div class="textinput service_name">
                <input type="text" name="service_names[]" value="<?php echo explode(Tmp::$service_name_price_separator, $service)[0]; ?>" autocomplete="off" <?php if ($readonly) {echo "readonly";} ?>>
                <label>Service name (click to add to basket)</label>
            </div>
            <div class="textinput service-price">
                <input type="text" name="service_prices[]" value="<?php echo explode(Tmp::$service_name_price_separator, $service)[1]; ?>" autocomplete="off" <?php if ($readonly) {echo "readonly";} ?>>
                <label>Service price</label>
                <div><button type="button" class="add_to_basket" onclick="window.location = 'add_to_basket_db.php?business_id=<?php echo $business_id; ?>&service_index=<?php echo $index; ?>';">Add <?php echo explode(Tmp::$service_name_price_separator, $service)[0]; ?> to the basket</button></div>
            </div>
            <div class="service_separator" hidden></div>
        <?php endforeach; ?>
    </div>
    <?php if (!$readonly): ?>
    <div>
        <button id="add_service">+</button>
    </div>
    <input type="submit" value="Submit" name="submit">
    <script>
        <?php $_SESSION["services_count"]++; ?>
        document.querySelector('#add_service').addEventListener("click", function (event) {
            event.preventDefault();
            var textinputs = document.querySelectorAll('.service_separator');
            textinputs[textinputs.length-1].outerHTML +=
                `<div class="textinput service_name">
                    <input type="text" name="service_names[]" placeholder="My service" autocomplete="off">
                    <label>Service name</label>
                </div>
                <div class="textinput service-price">
                    <input type="text" name="service_prices[]" placeholder="e.g. $20/hour" autocomplete="off">
                    <label>Service price</label>
                </div>
                <div class="service_separator" hidden></div>`;
        });
    </script>
    <?php endif; ?>
    <div><button type="button" class="send_message" onclick="window.location = 'messages.php?receiver=<?php echo $business_id; ?>';">Message <?php echo $name; ?></button></div>
</form>
</body>
</html>