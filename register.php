<?php
$uzenet = "";
if (isset($_GET["submit"])) {
    if (isset($_GET["fname"]) && trim($_GET["fname"]) !== "") {
        $beirt_nev = $_GET["fname"];
        $uzenet = "A beírt név: $beirt_nev";
    } else {
        $uzenet = "<strong>Hiba!</strong> Írj be egy nevet!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>
<h1>Welcome!</h1>
<h2>Register an account below:</h2>
<form method="GET" action="register.php">
    <div class="textinput">
        <input type="text" id="fname" name="fname" placeholder="John" autocomplete="off">
        <label for="fname">First name</label>
    </div>
    <div class="textinput">
        <input type="text" id="lname" name="lname" placeholder="Doe" autocomplete="off">
        <label for="lname">Last name</label>
    </div>
    <div class="textinput">
        <input type="date" id="bdate" name="bdate" autocomplete="off">
        <label for="bdate">Birth date</label>
    </div>
    <div class="textinput">
        <input type="email" id="email" name="email" placeholder="johndoe97@gmail.com" autocomplete="off">
        <label for="email">Email address</label>
    </div>
    <div class="textinput">
        <input type="password" id="password" name="password" autocomplete="off">
        <label for="password">Password</label>
    </div>
    <div>
        <input type="checkbox" id="business_owner" name="account_type" value="business_owner">
        <label for="business_owner">I'm a business owner</label>
    </div>
    <div class="textinput">
        <input type="tel" id="phone" name="phone" placeholder="+36301234567" autocomplete="off">
        <label for="phone">Phone number</label>
    </div>
    <input type="submit" value="Continue" name="submit">
</form>
<?php echo "<p>" . $uzenet . "</p>"; ?>
</body>
</html>