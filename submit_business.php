<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit your business</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "header.php";
include_once "topnav.php";
if (session_id() === "" || !isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
if (isset($_SESSION['business_owner']) && $_SESSION['business_owner'] != 1) {
    header("Location: businesses.php");
    exit();
}
?>
<?php if (isset($_GET["msg"])) { ?>
    <p class="msg"><?php echo $_GET["msg"]; ?></p>
<?php } ?>
<h1>Submit your business below:</h1>
<form method="POST" action="submit_business_db.php">
    <div class="textinput">
        <input type="text" id="business_name" name="business_name" placeholder="My business" autocomplete="off">
        <label for="business_name">Business name</label>
    </div>
    <div class="textinput">
        <input type="text" id="business_description" name="business_description" placeholder="A business about ..." autocomplete="off">
        <label for="business_description">Business description</label>
    </div>
    <div class="textinput">
        <input type="number" id="business_year_of_foundation" name="business_year_of_foundation" placeholder="1997" autocomplete="off">
        <label for="business_year_of_foundation">Year of Foundation</label>
    </div>
    <div class="textinput">
        <input type="text" id="owner_id" name="owner_id" value="<?php if(isset($_SESSION["email"])) { echo explode("@", $_SESSION["email"])[0] . "_" . explode(".", explode("@", $_SESSION["email"])[1])[0]; } else { echo 'ERROR, please log in!'; } ?>" autocomplete="off" readonly>
        <label for="owner_id">Owner ID</label>
    </div>
    <div class="textinput">
        <input type="text" id="business_id" name="business_id" placeholder="A unique ID for your business (e.g. mybusiness001)" autocomplete="off">
        <label for="business_id">Business ID</label>
    </div>
    <div class="business-services">
        <div class="textinput service_name">
            <input type="text" name="service_names[]" placeholder="My service" autocomplete="off">
            <label>Service name</label>
        </div>
        <div class="textinput service-price">
            <input type="text" name="service_prices[]" placeholder="e.g. $20/hour" autocomplete="off">
            <label>Service price</label>
        </div>
        <div class="service_separator" hidden></div>
    </div>
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
</form>
</body>
</html>