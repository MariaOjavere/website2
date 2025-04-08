<?php
ob_start();
?>
<h1>Kõik tooted</h1>
<br>

<?php
ViewProducts::AllProducts($arr);
$content = ob_get_clean();
include_once 'view/layout.php';

?>
