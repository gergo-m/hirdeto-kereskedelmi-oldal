<?php
session_start();
$page = basename($_SERVER['PHP_SELF']);
class Tmp {
    public static $service_separator = ";srvc;sprtr;";
    public static $service_name_price_separator = ";nm;prc;";
}
?>

<nav id="topnav">
    <a class="<?php if($page == 'index.php'){echo 'active"';}?>" href="index.php">Home</a>
    <a class="<?php if($page == 'businesses.php'){echo 'active"';}?>" href="businesses.php">Businesses</a>
    <a class="<?php if($page == 'profile.php'){echo 'active"';}?>" href="profile.php">Profile</a>
    <a class="<?php if($page == 'about.php'){echo 'active"';}?>" href="./about.php">About</a>
    <a class="<?php if($page == 'register.php' || $page == 'login.php'){echo 'active"';}?>" href="./login.php">
        <?php if ($page == 'register.php') {
            echo 'Register';
        } else if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
            echo 'Logout';
        } else {
            echo 'Login';
        } ?>
    </a>
</nav>