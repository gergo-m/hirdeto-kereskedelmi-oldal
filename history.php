<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="history_style.css">
</head>
<body>
<?php
include_once "header.php";
include_once "load_businesses.php";
?>
<div class="sidenav">
    <a href="profile.php">Profile</a>
    <a class="active" href="history.php">History</a>
</div>
<div class="flex_container">
    <script>
        <?php foreach ($_SESSION["history"] as $ind => $id):
        foreach ($_SESSION["businesses"] as $key => $value) {
            if ($value["business_id"] === $id) {
                $business = $value;
                break;
            }
        }?>
        document.querySelector(".flex_container").innerHTML +=
            `<div class="business_container" onclick="loadpage('<?php echo $business["business_id"]; ?>')">
                <div class="business_property"><p class="business_name" id="business<?php echo $ind; ?>"><?php echo $business["name"]; ?></p></div>
                <div class="business_property"><p class="business_description"><?php echo $business["description"]; ?></p></div>
                <div class="business_property business-services">
                <?php foreach (explode(Tmp::$service_separator, $business["services"]) as $index => $service): ?>
                    <div class="service"><p class="service_name"><?php echo explode(Tmp::$service_name_price_separator, $service)[0] . " - " . explode(Tmp::$service_name_price_separator, $service)[1]?></p></div>
                <?php endforeach; ?>
                </div>
            </div>
            <style>
                .business_container #business<?php echo $ind; ?>::after {
                    content: "(since <?php echo $business["year_of_foundation"] ?>)";
                }
            </style>`;
        function loadpage(id) {
            window.location = "view_business.php?id=" + id;
        }
        <?php endforeach; ?>
    </script>
</div>
</body>
</html>