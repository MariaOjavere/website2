<?php
ob_start();
?>
<h1><?php echo $categoryName; ?></h1>
<br>

<?php
echo ViewProducts::ProductsByCategory($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>