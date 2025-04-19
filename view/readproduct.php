<?php
ob_start();
?>

<div class="container my-5">
    <?php
    if (isset($p) && !empty($p)) {
        echo ViewProducts::ReadProduct($p);
    } else {
        echo '<p>Toodet ei leitud</p>';
    }
    ?>
</div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>