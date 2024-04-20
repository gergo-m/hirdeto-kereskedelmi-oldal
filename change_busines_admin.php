
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-changes</title>
    <link rel="icon" type="image/x-icon" href="./assets/profile-pictures/icon-admin.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "db-connection.php";
include_once "header.php";
?>

<form action="change_busines_admin.php" method="post" class="adminform">
<table class="change-tabel">
    <?php
    $sql = "SELECT * FROM businesses";
    $result = mysqli_query($GLOBALS["db_connection"], $sql);
    echo "<tr>";
    echo "<td colspan='5'>Businesses</td>";
    echo "</tr>";
    while ($row=$result->fetch_array()){
        echo "<tr>";
        echo "<td><input  type='hidden' name='custId' value='".$row['id']."' /></td>";
        echo "<td>Name  :<input type='text' name='name' value='".$row['name']."'> </td>";
        echo "<td>Desciptrion  :<textarea>  ".$row['description']." '</textarea></td>";
        echo "<td>Year of foundation  :<input type='number' name='yof' value='".$row['year_of_foundation']."' /></td>";
        echo "<td> Services  :<textarea> ".$row['services']."'</textarea></td>";
        echo "</tr>";
    }
    echo "<input type='submit' name='update' value='UPDATE' class='update'/>";


    ?>
</table>


</form>
<?php
if(isset($_POST["update"])){
    $id = $_POST["custId"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $yof = $_POST["yof"];
    $Services = $_POST["Services"];
    $update_query="UPDATE businesbusinesses SET name='$name', description='$description', year_of_foundation='$yof', services='$services' WHERE id='$id'";
    mysqli_query($GLOBALS["db_connection"], $update_query);
    header("Refresh:0");
}


?>


</body>
</html>