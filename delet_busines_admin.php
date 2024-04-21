<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin changes</title>
    <link rel="icon" type="image/x-icon" href="./assets/profile-pictures/icon-admin.png">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
include_once "db_connection.php";
include_once "header.php"; ?>

<form action="delet_busines_admin.php" method="post" class="adminform">
    <table class="delet-tabel">
        <?php
        $sql = "SELECT * FROM businesses";
        $result = mysqli_query($GLOBALS["db_connection"], $sql);
        echo "<tr>";
        echo "<td colspan='4'>Businesses</td>";
        echo "</tr>";
        $row=$result->fetch_array();
        while ($row=$result->fetch_array()){
            echo "<tr>";
            echo "<td><input type='hidden' name='custId' value='".$row['id']."' /></td>";
            echo "<td>Name  : ".$row['name']."' </td>";
            echo "<td>Desciptrion  : ".$row['description']." </td>";
            echo "<td><input class='delet-button' type='submit' name='delet' value='DELETE' /></td>";
            echo "</tr>";
        }

        ?>
    </table>


</form>
<?php
if (isset($_POST['delet'])){
    $id = $_POST['custId'];
    $delete_query = "DELETE FROM businesses WHERE id='$id'";
    mysqli_query($GLOBALS["db_connection"], $delete_query);
    header("Refresh:0");

}


?>


</body>
</html>
