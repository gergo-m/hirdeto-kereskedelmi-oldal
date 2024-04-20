
<?php
include_once businesses.php;
$businesses=$_SESSION["businesses"];
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="./assets/profile-pictures/icon-admin.png">
</head>
<body>


<h1>
    Admin option
</h1>

<h2>
    Accept or reject the recent Bussines!
</h2>
<form method="post">

    <label >
        Accept
        <input name="Accept" type="button">
    </label>
    <label>
        Rejects
        <input name="Reject" type="button">
    </label>
<h2>Deleting the selected Bussines</h2>
</form>
<form method="post">
    <label>
        Delet businesses

            
    </label>
</form>
<h2>Bannig user</h2>
<form method="post">
    <label>
        Ban User
    </label>
</form>
</html>