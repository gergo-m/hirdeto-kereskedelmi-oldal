<?php
session_start();
include_once "db-connection.php";
if (isset($_POST["first_name"])
    && isset($_POST["last_name"])
    && isset($_POST["email"])
    && isset($_POST["password"])
    && isset($_POST["birth_date"])
    && isset($_POST["phone_number"])
    && isset($_POST["account_type"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $first_name = validate($_POST["first_name"]);
    $last_name = validate($_POST["last_name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $birth_date = validate($_POST["birth_date"]);
    $phone_number = validate($_POST["phone_number"]);
    $account_type = validate($_POST["account_type"]);

    if (empty($first_name)) {
        header("Location: test.php?error=First name is required");
        exit();
    } else if (empty($last_name)) {
        header("Location: test.php?error=Last name is required");
        exit();
    } else if (empty($email)) {
        header("Location: test.php?error=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: test.php?error=Password is required");
        exit();
    } else if (empty($birth_date)) {
        header("Location: test.php?error=Birth date is required");
        exit();
    } else if (empty($phone_number)) {
        header("Location: test.php?error=Phone number is required");
        exit();
    } else if (empty($account_type)) {
        header("Location: test.php?error=Account type is required");
        exit();
    } else {
        $sql = "SELECT * FROM users
                WHERE first_name='$first_name'
                AND last_name='$last_name'
                AND email='$email'
                AND password='$password'
                AND birth_date='$birth_date'
                AND phone_number='$phone_number'
                AND account_type='$account_type'";
        $result = mysqli_query($GLOBALS["db_connection"], $sql);
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['first_name'] === $first_name
                && $row['last_name'] === $last_name
                && $row['email'] === $email
                && $row['password'] === $password
                && $row['birth_date'] === $birth_date
                && $row['phone_number'] === $phone_number
                && $row['account_type'] === $account_type) {

                echo "Logged in!";
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['birth_date'] = $row['birth_date'];
                $_SESSION['account_type'] = $row['account_type'];
                header("Location: profile.php");
                exit();
            }
        } else {
            header("Location: test.php?error=Incorrect credentials");
            exit();
        }
    }
} else {
    header("Location: profile.php");
    exit();
}
?>