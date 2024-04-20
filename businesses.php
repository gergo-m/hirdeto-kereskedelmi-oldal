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
<div class="main">
<?php include_once "header.php";
include_once "load_businesses.php"; ?>
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
</div>
</body>
</html>