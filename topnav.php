<nav id="topnav">
    <div id="topnav_div">
        <a class="<?php if($page == 'index.php'){echo 'active';}?>" href="index.php">Home</a>
        <a class="<?php if($page == 'businesses.php'){echo 'active';}?>" href="businesses.php">Businesses</a>
        <a class="<?php if($page == 'profile.php'){echo 'active';}?>" href="profile.php">Profile</a>
        <a class="<?php if($page == 'about.php'){echo 'active';}?>" href="./about.php">About</a>
        <a class="<?php if($page == 'register.php' || $page == 'login.php'){echo 'active';}?>" href="<?php if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                echo './logout.php';
            } else { echo './login.php'; }?>">
            <?php if ($page == 'register.php') {
                echo 'Register';
            } else if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                echo 'Logout';
            } else {
                echo 'Login';
            } ?>
        </a>
        <a class="<?php if($page == 'basket.php'){echo 'active';}?>" href="./basket.php"><img id="basket_icon" src="./assets/images-icons/shopping-cart.png" alt="shopping cart"></a>
    </div>
</nav>