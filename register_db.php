<?php
session_start();
include_once "db-connection.php";
if (isset($_POST["first_name"])
    && isset($_POST["last_name"])
    && isset($_POST["email"])
    && isset($_POST["password"])
    && isset($_POST["birth_date"])
    && isset($_POST["phone_number"])) {
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

    if (empty($first_name)) {
        header("Location: register.php?error=First name is required");
        exit();
    } else if (empty($last_name)) {
        header("Location: register.php?error=Last name is required");
        exit();
    } else if (empty($email)) {
        header("Location: register.php?error=Email is required");
        exit();
    } else if (empty($password)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if (empty($birth_date)) {
        header("Location: register.php?error=Birth date is required");
        exit();
    } else if (empty($phone_number)) {
        header("Location: register.php?error=Phone number is required");
        exit();
    } else {
        $conn = $GLOBALS["db_connection"];
        $sqlCheckIfExists = "SELECT * FROM users
                WHERE email='$email'";
        $resultIfExists = mysqli_query($conn, $sqlCheckIfExists);
        echo mysqli_num_rows($resultIfExists);
        if (mysqli_num_rows($resultIfExists) === 1) {
            header("Location: register.php?error=User already exists with this email");
            exit();
        }

        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `password`, `birth_date`, `phone_number`, `business_owner`) VALUES ('','$first_name','$last_name','$email','$password','$birth_date','$phone_number','$account_type')";
        if ($conn->query($sql) === TRUE) {
            $result = mysqli_query($conn, $sqlCheckIfExists);
            if ($result instanceof mysqli_result) {
                $row = mysqli_fetch_assoc($result);
                if ($row['first_name'] === $first_name
                    && $row['last_name'] === $last_name
                    && $row['email'] === $email
                    && $row['password'] === $password
                    && $row['birth_date'] === $birth_date
                    && $row['phone_number'] === $phone_number
                    && $row['business_owner'] === $account_type) {

                    echo "Registered and logged in!";
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['birth_date'] = $row['birth_date'];
                    $_SESSION['account_type'] = $row['business_owner'];
                    header("Location: profile.php");
                    exit();
                }
            } else {
                header("Location: register.php?error=Something is wrong " . $result);
                exit();
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    header("Location: profile.php?error=Account type is " . $_POST["account_type"]);
    exit();
}
?>