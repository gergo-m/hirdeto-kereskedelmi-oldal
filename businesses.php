<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Businesses</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="businesses_style.css">
</head>
<body>
<?php
    include_once "header.php";
    include_once "load_businesses.php";
?>
<div class="flex_container">
        <?php
            foreach ($_SESSION["businesses"] as $key => $value):
        ?>
         <div class="business_container">
            <div class="business_property"><p class="business_name" id="business<?php echo $key; ?>"><?php echo $value["name"]; ?></p></div>
            <div class="business_property"><p class="business_description"><?php echo $value["description"]; ?></p></div>
            <div class="business_property business-services">
                <?php foreach (explode(Tmp::$service_separator, $value["services"]) as $index => $service): ?>
                    <div class="service"><p class="service_name"><?php echo explode(Tmp::$service_name_price_separator, $service)[0] . " - " . explode(Tmp::$service_name_price_separator, $service)[1]?></p></div>
                <?php endforeach; ?>
            </div>
            </div>
        <?php endforeach; ?>
</div>
</body>
</html>