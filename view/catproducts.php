<?php
ob_start();
?>
<h1>Tooted</h1>
<br>

<?php

ViewProducts::ProductsByCategory($arr);
$content = ob_get_clean();
include_once 'view/layout.php';

?>
