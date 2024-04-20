<?php
session_start();
include_once "db-connection.php";
if (isset($_POST["uname"]) && isset($_POST["password"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST["uname"]);
    $pass = validate($_POST["password"]);

    if (empty($uname)) {
        header("Location: test.php?error=Username is required");
        exit();
    } else if (empty($pass)) {
        header("Location: test.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($GLOBALS["db_connection"], $sql);
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: profile.php");
                exit();
            }
        } else {
            header("Location: test.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: profile.php");
    exit();
}
?>