<?php
ob_start();

echo "<h1>Otsingu tulemus:</h1>";
echo "<h2><b>" . htmlspecialchars($_GET['otsi']) . ":</b></h2>"; 

echo ViewProducts::AllProducts($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>