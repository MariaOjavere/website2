<?php
ob_start();
?>

<br>

<?php
ViewProducts::ReadProduct($n);

echo "<br>";
Controller::Reviews($_GET['id']);

echo "<br>";
ViewReviews::ReviewsForm();

$content = ob_get_clean();
include_once 'view/layout.php';

?>