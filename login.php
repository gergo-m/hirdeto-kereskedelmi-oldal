<?php

$email = "";
if (isset($_GET["email"]) && trim($_GET["email"]) !== "") {
    $email = $_GET["email"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php";
include_once "topnav.php"; ?>
<h1>Welcome!</h1>
<h2>Login with an existing account:</h2>
<?php if(isset($_GET['msg'])) { ?>
    <p class="error"><?php echo $_GET['msg']; ?></p>
<?php } ?>
<form method="POST" action="login_db.php">
    <div class="textinput">
        <input type="email" id="email" name="email" placeholder="johndoe97@gmail.com" autocomplete="off" value="<?php echo $email; ?>">
        <label for="email">Email address</label>
    </div>
    <div class="textinput">
        <input type="password" id="password" name="password" autocomplete="off">
        <label for="password">Password</label>
    </div>
    <input type="submit" value="Continue" name="submit">
    <div>
        <br><a href="register.php">Register</a>
    </div>
</form>
</body>
</html>