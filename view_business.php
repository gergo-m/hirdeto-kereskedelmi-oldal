<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit your business</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>
<?php if (isset($_GET["error"])) { ?>
    <p class="error"><?php echo $_GET["error"]; ?></p>
<?php } ?>
<h1>Submit your business below:</h1>
<form method="POST" action="">
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
        <input type="text" id="owner_id" name="owner_id" value="<?php if(isset($_SESSION["email"])) { echo explode("@", $_SESSION["email"])[0]; } else { echo 'ERROR, please log in!'; } ?>" autocomplete="off" readonly>
        <label for="owner_id">Owner ID</label>
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