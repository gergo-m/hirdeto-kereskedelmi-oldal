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
    <script>
        <?php foreach ($_SESSION["businesses"] as $key => $value):?>
        document.querySelector(".flex_container").innerHTML +=
            `<div class="business_container">
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
        <?php endforeach; ?>

    </script>
    <div class="admin-container">
        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['email'])&& $_SESSION["email"]=='admin@admin.com') : ?>
            <input type="button" value="Set service" class="Set-service-button" id="btnHome" onClick="window.location = 'change_busies_admin.php'" />
        <?php endif; ?>
        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['email']) && $_SESSION["email"]=='admin@admin.com'):?>
            <input type="button" value="Delet a service" class="Delet-button" id="btnHome" onClick="window.location = 'delet_busies_admin.php'" />
        <?php endif; ?>
    </div>

</div>

</body>
</html>