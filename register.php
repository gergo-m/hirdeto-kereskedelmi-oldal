<?php
$uzenet = "";
if (isset($_POST["submit"])) {
    if (isset($_POST["first_name"]) && trim($_POST["first_name"]) !== "") {
        $beirt_nev = $_POST["first_name"];
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
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>
<h1>Welcome!</h1>
<h2>Register an account below:</h2>
<?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<form method="POST" action="register_db.php">
    <div class="textinput">
        <input type="text" id="first_name" name="first_name" placeholder="John" autocomplete="off">
        <label for="first_name">First name</label>
    </div>
    <div class="textinput">
        <input type="text" id="last_name" name="last_name" placeholder="Doe" autocomplete="off">
        <label for="last_name">Last name</label>
    </div>
    <div class="textinput">
        <input type="date" id="birth_date" name="birth_date" autocomplete="off">
        <label for="birth_date">Birth date</label>
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
        <input type="checkbox" id="business_owner" name="account_type" value="1">
        <label for="business_owner">I'm a business owner</label>
    </div>
    <div class="textinput">
        <input type="tel" id="phone_number" name="phone_number" placeholder="+36301234567" autocomplete="off">
        <label for="phone_number">Phone number</label>
    </div>
    <input type="submit" value="Continue" name="submit">
</form>
<?php echo "<p>" . $uzenet . "</p>"; ?>
</body>
</html>