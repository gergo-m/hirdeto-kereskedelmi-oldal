
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hirdető-/kereskedelmi oldal</title>
    <link rel="icon" type="image/x-icon" href="./assets/images-icons/favicon.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "header.php"; ?>

<form action="change_busies_admin.php" method="post">
<table>
    <?php
    $sql = "SELECT * FROM businesses";
    $result = mysqli_query($GLOBALS["db_connection"], $sql);
    echo "<tr>";
    echo "<td colspan='3'>Businesses</td>";
    echo "</tr>";
    while ($row=$result->fetch_array()){
        echo "<tr>";

        echo "<td>Name  :<input type='text' name='name' value='".$row['name']."' /></td>";
        echo "<td>Desciptrion  :<input type='text' name='desciptrion' value='".$row['desciptrion']."' /></td>";
        echo "<td>Year of foundation  :<input type='number' name='yof' value='".$row['year_of_foundation']."' /></td>";
        echo "<td>  :<input type='number' name='yof' value='".$row['year_of_foundation']."' /></td>";
        echo "</tr>";
    }



    ?>
</table>


</form>

</body>
</html>