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
<?php include_once "header.php";
if (session_id() === "" || !isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<div class="whole-page">
    <div class="sidenav">
        <a class="active" href="profile.php">Profile</a>
        <a href="history.php">History</a>
    </div>
    <div class="profile-info">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form method="POST" action="change_details.php" enctype="multipart/form-data">
            <img id="profile_photo" src="./assets/profile-pictures/<?php echo $_SESSION["profile_picture_name"]; ?>" alt="profile icon" title="upload profile picture">
            <h1>Profile</h1>
            <label><input type="file" id="profile_picture" name="profile_picture" hidden></label>
            <script>
                document.querySelector('img#profile_photo').addEventListener('click', function () {
                    document.querySelector('input#profile_picture').click();
                });
            </script>
            <div class="hidden" hidden>
                <input type="text" id="prev_email" name="prev_email" value="<?php echo $_SESSION["email"]; ?>" hidden>
            </div>
            <div class="textinput">
                <input type="text" id="first_name" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" autocomplete="off">
                <label for="first_name">First name</label>
            </div>
            <div class="textinput">
                <input type="text" id="last_name" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" autocomplete="off">
                <label for="last_name">Last name</label>
            </div>
            <div class="textinput">
                <input type="date" id="birth_date" name="birth_date" value="<?php echo $_SESSION['birth_date']; ?>" autocomplete="off">
                <label for="birth_date">Birth date</label>
            </div>
            <div class="textinput">
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" autocomplete="off">
                <label for="email">Email address</label>
            </div>
            <div class="textinput">
                <input type="password" id="password" name="password" value="" autocomplete="off">
                <label for="password">Password</label>
            </div>
            <div>
                <input type="checkbox" id="business_owner" name="account_type" value="<?php echo $_SESSION['business_owner']; ?>" checked="checked" onclick="return false;">
                <label for="business_owner">I'm a business owner</label>
            </div>
            <div class="textinput">
                <input type="tel" id="phone_number" name="phone_number" value="+36301234567" autocomplete="off">
                <label for="phone_number">Phone number</label>
            </div>
            <input type="submit" value="Save changes" name="save_changes">
        </form>
        <br><div>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <a href="delete_profile.php">Delete profile</a>
        </div>
    </div>
</div>
</body>
</html>