<?php
    include_once ("index.php");
    if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }
?>
