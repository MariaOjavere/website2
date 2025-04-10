<?php
ob_start();
?>

<br>

<?php
ViewProducts::ReadProduct($p);

echo "<br>";
Controller::Reviews($_GET['id']);

echo "<br>";
ViewReviews::ReviewsForm();

$content = ob_get_clean();

if (isset($p) && !empty($p)) {
    echo $p['name'];
    echo $p['price'];
    echo $p['description'];
} else {
    echo "Toodet ei leitud";
}

?>