<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<?php include_once "header.php"; ?>
<div class="whole-page">
<div class="sidenav">
    <a class="active" href="profile.php">Profile</a>
    <a href="history.php">History</a>
</div>
<div class="profile-info">
    <div>
        <img src="./assets/images-icons/profile-outline.png" alt="profile icon">
        <h1>Profile</h1>
    </div>
    <div class="textinput">
        <input type="text" id="fname" name="fname" value="John" autocomplete="off">
        <label for="fname">First name</label>
    </div>
    <div class="textinput">
        <input type="text" id="lname" name="lname" value="Doe" autocomplete="off">
        <label for="lname">Last name</label>
    </div>
    <div class="textinput">
        <input type="date" id="bdate" name="bdate" value="2000-01-01" autocomplete="off">
        <label for="bdate">Birth date</label>
    </div>
    <div class="textinput">
        <input type="email" id="email" name="email" value="johndoe97@gmail.com" autocomplete="off">
        <label for="email">Email address</label>
    </div>
    <div class="textinput">
        <input type="password" id="password" name="password" value="password1234" autocomplete="off">
        <label for="password">Password</label>
    </div>
    <div>
        <input type="checkbox" id="business_owner" name="account_type" value="business_owner" checked="checked">
        <label for="business_owner">I'm a business owner</label>
    </div>
    <div class="textinput">
        <input type="tel" id="phone" name="phone" value="+36301234567" autocomplete="off">
        <label for="phone">Phone number</label>
    </div>
</div>
</div>
</body>
</html>