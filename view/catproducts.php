<?php
ob_start();
?>
<h1>Tooted</h1>
<br>

<?php
echo ViewProducts::ProductsByCategory($arr); // Добавляем echo для вывода результата
$content = ob_get_clean();
include_once 'view/layout.php';
?>