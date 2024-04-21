<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Businesses</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="basket_style.css">
    <?php include_once "header.php";?>
    <style>
        <?php
        foreach ($_SESSION["basket"] as $key => $value):
            echo ".item_container #item$key::after {";
                    echo "content: \"(since " . $value[1] . ")\";";
            echo "}";
        endforeach;
        ?>
    </style>
    <?php
    include_once "topnav.php";
    include_once "load_businesses.php";
    if (session_id() === "" || !isset($_SESSION['id']) || !isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
    ?>
</head>
<body>
<div class="flex_container">
    <?php foreach ($_SESSION["basket"] as $key => $value):?>
        <div class="item_container">
            <div class="item_property"><p class="business_name" id="item<?php echo $key; ?>"><?php echo $value[0]; ?></p></div>
            <div class="item_property service"><p class="service_name"><?php echo explode(Tmp::$service_name_price_separator, $value[2])[1] . " - " . explode(Tmp::$service_name_price_separator, $value[2])[2]; ?></p></div>
            <div><button type="button" class="remove_from_basket" onclick="window.location = 'remove_from_basket_db.php?business_id=<?php echo explode(Tmp::$service_name_price_separator, $value[2])[0]; ?>&basket_index=<?php echo $key; ?>';">Remove from basket</button></div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
