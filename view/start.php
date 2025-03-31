<?php
ob_start();
?>
<h1>TOP 10 TOOTED</h1>
<br>
<?php
foreach ($arr as $value) {
    echo "<h2>" . $value['name'] . "</h2>";
    echo "<a href='product?id=" . $value['id'] . "'>Vaata lähemalt</a><br>";
}

$content = ob_get_clean();

include_once 'view/layout.php';

?>
