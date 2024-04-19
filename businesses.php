<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Businesses</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="businesses.css">
</head>
<body>
<?php include_once "header.php";
include_once "load_businesses.php"; ?>
<div class="flex_container">
    <script>
        <?php foreach ($_SESSION["businesses"] as $key => $value):?>
        document.querySelector(".flex_container").innerHTML +=
            `<div class="business_container">
                    <div class="business_property"><p class="business_name"><?php echo $value["name"]; ?></p></div>
                    <div class="business_property"><p class="business_description"><?php echo $value["description"]; ?></p></div>
                    <div class="business_property business-services">
                    <?php foreach (explode(Tmp::$service_separator, $value["services"]) as $index => $service): ?>
                        <div class="service"><p class="service_name"><?php echo explode(Tmp::$service_name_price_separator, $service)[0] . " - " . explode(Tmp::$service_name_price_separator, $service)[1]?></p></div>
                    <?php endforeach; ?>
                    </div>
                </div>`;
        <?php endforeach; ?>
    </script>

    <div class="business_container">
        <div class="business_property"><p class="business_name">Pet Pals</p></div>
        <div class="business_property"><p class="business_description">A pet sitting and walking service catering to busy professionals in the area.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🧫 Pet Sitting - $20 per visit</p></div>
            <div class="service"><p class="service_name">🐶 Dog Walking - $15 for 30 minutes</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Green Thumb Gardening</p></div>
        <div class="business_property"><p class="business_description">Offering personalized garden design, installation, and maintenance services for homeowners who want to beautify their outdoor spaces.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🏡 Garden Design - $150 consultation fee + varies based on project scope</p></div>
            <div class="service"><p class="service_name">👨‍🌾 Monthly Maintenance - Starting from $50/month</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Bake Bliss</p></div>
        <div class="business_property"><p class="business_description">Specializing in custom cakes and desserts for all occasions, from birthdays to weddings.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🍰 Custom Cake - Starting from $50</p></div>
            <div class="service"><p class="service_name">🍨 Dessert Platter - Starting from $30</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Tech Tune-Up</p></div>
        <div class="business_property"><p class="business_description">Providing computer repair, software installation, and troubleshooting services for individuals and small businesses.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🛠 Computer Repair - $50/hour</p></div>
            <div class="service"><p class="service_name">📰 Software Installation - $30 per program</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Sew Crafty</p></div>
        <div class="business_property"><p class="business_description">A sewing studio offering alterations, custom clothing creation, and sewing classes for beginners.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">⚙ Alterations - Starting from $15</p></div>
            <div class="service"><p class="service_name">🧵 Sewing Classes - $25 per session</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Sweet Honey</p></div>
        <div class="business_property"><p class="business_description">High-quality honey sourced from local beekeepers: acacia honey, forest mixed honey, linden honey.</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🍯 Acacia Honey - $10 per jar</p></div>
            <div class="service"><p class="service_name">🌳 Forest Mixed Honey - $12 per jar</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Mary's Beauty Care</p></div>
        <div class="business_property"><p class="business_description">"You can be more with us"</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🤗 Facials - Starting from $30</p></div>
            <div class="service"><p class="service_name">💅 Manicure and Pedicure - $40 for both</p></div>
        </div>
    </div>
    <div class="business_container">
        <div class="business_property"><p class="business_name">Lackó-Repair Autószerelő Kft.</p></div>
        <div class="business_property"><p class="business_description">Auto repair services by János Lackó, mechanic</p></div>
        <div class="business_property business_services">
            <div class="service"><p class="service_name">🚗 Car Maintenance - $50 per hour</p></div>
            <div class="service"><p class="service_name">🗜 Engine Tune-up - $100</p></div>
        </div>
    </div>
</div>

<!--<table id="businesses" class="container">
    <tr>
      <th ></th>
      <th>Csodajó Mézfarm Kft</th>
      <th>Mary szépségápolás</th>
      <th>Lackó-Repair Autószerelő Kft</th>
    </tr>
    <tr>
      <td class="tabel-firstc-picture">Termék kép</td>
      <td><img src="honey.jpg" alt="honey"> </td>
      <td><img src="cosmetic.jpg" alt="cosmetic"> </td>
      <td><img src="car-repair.jpg" alt="car-repair"> </td>
    </tr>
    <tr >
      <td class="tabel-firstc">Leírás</td>
      <td class="tabel-text">Csodajó Mézfarn: magas minőségű, hazai őstermnelőktől: akácméz, eredi vegyesméz, hársméz  </td>
      <td class="tabel-text">Mary szépségápolás-"Nálunk több lehet" </td>
      <td class="tabel-text">Autószerelés-Lackó János, autószerelő .</td>
    </tr>
    <tr >
      <td class="tabel-firstc">Cím</td>
      <td class="tabel-text">Budapest, Nápolyi utca 14. </td>
      <td class="tabel-text"> Szeged, Kék utca 4. </td>
      <td class="tabel-text"> Szilvásvárad, Miskolci út 5.</td>
    </tr>
</table>-->
</body>
</html>