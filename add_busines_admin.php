<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-Set</title>
    <link rel="icon" type="image/x-icon" href="./assets/profile-pictures/icon-admin.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "db-connection.php";
include_once "header.php";?>
<form action="change_busines_admin.php" method="post" class="adminform">
    <table class="change-tabel">
        <tr>
            <td colspan='5'>Add new busines line to the side. </td>
        </tr>
        <?php
        $sql = "SELECT * FROM businesses";
        $result = mysqli_query($GLOBALS["db_connection"], $sql);

            echo "<tr>";
            echo "<td><input type='hidden' name='custId'  /></td>";
            echo "<td>Name: <input type='text' name='name' placeholder='Name' ></td>";
            echo "<td>Description: <textarea name='description' placeholder='Short description about the company and the services'></textarea></td>";
            echo "<td>Year of foundation: <input type='number' placeholder='2000' /></td>";
            echo "<td>Services: <textarea name='services' placeholder='List of services'></textarea></td>";
            echo "</tr>";

        ?>
    </table>
    <input type='submit' name='update' value='Add new line' class='update'/>
</form>

<?php

    if(isset($_POST["update"])){
        $id = $_POST["custId"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $yof = $_POST["yof"];
        $services = $_POST["services"];
        $max_id_query = "SELECT MAX(id) AS max_id FROM businesses";
        $max_id_result = mysqli_query($GLOBALS["db_connection"], $max_id_query);
        $row = mysqli_fetch_assoc($max_id_result);
        $new_id = $row['max_id'] + 1;
        $insert_query = "INSERT INTO businesses (id, name, description, year_of_foundation, services) 
                     VALUES ('$new_id', '$name', '$description','$yof', '$services')";
        mysqli_query($GLOBALS["db_connection"], $insert_query);
        header("Refresh:0");
    }
?>
</body>
</html>