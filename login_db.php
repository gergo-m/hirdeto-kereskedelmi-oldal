<?php
include_once "header.php";
include_once "topnav.php";
include_once "db_connection.php";
if (isset($_POST["email"])
    && isset($_POST["password"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);

    if (empty($email)) {
        header("Location: login.php?msg=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?msg=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users
                WHERE email='$email'";
        $result = mysqli_query($GLOBALS["db_connection"], $sql);
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email
                && password_verify($password, $row['password'])) {

                echo "Logged in!";
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['birth_date'] = $row['birth_date'];
                $_SESSION['business_owner'] = $row['business_owner'];
                $_SESSION['history'] = explode(Tmp::$item_separator, $row['history']);
                if ($row['profile_picture_name'] === "") {
                    $_SESSION['profile_picture_name'] = "profile-outline.png";
                } else {
                    $_SESSION['profile_picture_name'] = $row['profile_picture_name'];
                }
                header("Location: profile.php");
                exit();
            } else {
                header("Location: login.php?msg=Incorrect password");
            }
        } else {
            header("Location: login.php?msg=A user does not exist with this email, please register!");
            exit();
        }
    }
} else {
    header("Location: profile.php");
    exit();
}
?>