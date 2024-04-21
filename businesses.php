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
    <?php foreach ($_SESSION["businesses"] as $key => $value):?>
    <script>
        document.querySelector('.flex_container').innerHTML +=
            `<div class="business_container" onclick="loadpage('<?php echo $value["business_id"]; ?>')">
                <div class="business_property"><p class="business_name" id="business<?php echo $key; ?>"><?php echo $value["name"]; ?></p></div>
                <div class="business_property"><p class="business_description"><?php echo $value["description"]; ?></p></div>
                <div class="business_property business-services">
                <?php foreach (explode(Tmp::$service_separator, $value["services"]) as $index => $service): ?>
                    <div class="service"><p class="service_name"><?php echo explode(Tmp::$service_name_price_separator, $service)[0] . " - " . explode(Tmp::$service_name_price_separator, $service)[1]?></p></div>
                <?php endforeach; ?>
                </div>
            </div>
            <style>
                .business_container #business<?php echo $key; ?>::after {
                    content: "(since <?php echo $value["year_of_foundation"] ?>)";
                }
            </style>`;
            function loadpage(id) {
                window.location = "view_business.php?id=" + id;
            }
    </script>
    <?php endforeach; ?>

        <?php if (isset($_SESSION["email"]) && isset($_SESSION["business_owner"]) && $_SESSION["business_owner"] == 1) ?>

        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['email'])&& $_SESSION["email"]=='admin@admin.com') : ?>
            <div class="admin-container">
                <input type="button" value="Add businesses" class="Admin-button" id="btnHome" onClick="window.location = 'add_busines_admin.php'" />
                <input type="button" value="Set service" class="Admin-button" id="btnHome" onClick="window.location = 'change_busines_admin.php'" />
                <input type="button" value="Delet a service" class="Admin-button" id="btnHome" onClick="window.location = 'delet_busines_admin.php'" />
            </div>
        <?php endif; ?>
</div>
</body>
</html>