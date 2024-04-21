<?php
session_start();
include_once "db_connection.php";
if (isset($_POST["first_name"])
    && isset($_POST["last_name"])
    && isset($_POST["email"])
    && isset($_POST["birth_date"])
    && isset($_POST["phone_number"])
    && isset($_POST["prev_email"])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!isset($_POST["account_type"])) {
        $_POST["account_type"] = 0;
    }

    $first_name = validate($_POST["first_name"]);
    $last_name = validate($_POST["last_name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $birth_date = validate($_POST["birth_date"]);
    $phone_number = validate($_POST["phone_number"]);
    $account_type = validate($_POST["account_type"]);
    $prev_email = validate($_POST["prev_email"]);
    $profile_picture_name = validate(explode("@", $email)[0] . "_" . $_FILES["profile_picture"]["name"]);

    if (empty($first_name)) {
        header("Location: profile.php?error=First name is required");
        exit();
    } else if (empty($last_name)) {
        header("Location: profile.php?error=Last name is required");
        exit();
    } else if (empty($email)) {
        header("Location: profile.php?error=Email is required");
        exit();
    } else if (empty($birth_date)) {
        header("Location: profile.php?error=Birth date is required");
        exit();
    } else if (empty($phone_number)) {
        header("Location: profile.php?error=Phone number is required");
        exit();
    } else {
        // file management
        $cel_utvonal = "./assets/profile-pictures/" . $profile_picture_name;
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $cel_utvonal)) {
            echo "Successfully moved file";
        } else {
            echo "Error while moving file";
        }

        $conn = $GLOBALS["db_connection"];
        $sqlCheckIfExists = "SELECT * FROM users
                WHERE email='$email'";
        $resultIfExists = mysqli_query($conn, $sqlCheckIfExists);
        echo mysqli_num_rows($resultIfExists);

        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // insert into database
        if ($password === "") {
            $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`birth_date`='$birth_date',`phone_number`='$phone_number',`business_owner`='$account_type',`profile_picture_name`='$profile_picture_name' WHERE `email`='$prev_email'";
        } else {
            // hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$hashed_password',`birth_date`='$birth_date',`phone_number`='$phone_number',`business_owner`='$account_type',`profile_picture_name`='$profile_picture_name' WHERE `email`='$prev_email'";
        }
        $conn->query($sql);

        // login
        include_once "logout.php";
        echo '<script>window.location = "login.php?email=' . $email . '";</script>';
    }
} else {
    echo 'error';
}
