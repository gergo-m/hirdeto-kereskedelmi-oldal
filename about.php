<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hirdető-/kereskedelmi oldal</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php";
include_once "topnav.php"; ?>

<h1>
    About the webside
</h1>
<div class="about">
    <div class="description">
        <h2>Description of the website</h2>
            <ul>
                <li>This is a merchant advertising website</li>
                <li>On this website you can search among companies you like.</li>
                <li>As an entrepreneur, you can create ads for the website.</li>
                <li>Users can register either as a customer or as a businessman.</li>
                <li>You can communicate with other users, you can put items in the basket or view your history.</li>
                <li>You can modify your profile, too.</li>
            </ul>
        <p>We hope the site helps the customers find their own sellers. </p>
    </div>
    <div class="features">
        <h2>Features</h2>
        <ul>
            <li>Chat</li>
            <li>View advertisement</li>
            <li>Creat ads</li>
            <li>Register as customer/businessman.</li>
            <li>Basket</li>
            <li>History</li>
        </ul>

        <p> <b> Be careful!</b> <br>Admins can delete inadequate ads.</p>
    </div>
    <div class="add">
        <h2>Advertise here!</h2>

        <a href="businesses.php" >
            <p>Look for the Businesses in the website! </p>
        </a>
        <?php if(session_id() === "" || !isset($_SESSION['id']) || !isset($_SESSION['email'])):?>
        <a href="login.php" >
            <p>Or log in and add you own one.</p>
        </a>
        <?php endif; ?>
    </div>

</div>

</body>
</html>