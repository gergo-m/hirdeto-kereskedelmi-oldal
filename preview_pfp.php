<?php
//if (isset($_POST["profile_picture_preview"])) {
    echo $_FILES["profile_picture_preview"]["tmp_name"];
    header("Location: profile.php?img_tmp_name=".$_FILES["profile_picture_preview"]["tmp_name"]);
    //echo '<script>document.querySelector("img#profile_photo").src = ' . $_FILES["profile_picture_preview"]["tmp_name"] . '</script>';
//} else {}
?>