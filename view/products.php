<?php
class ViewProducts {

    public static function ProductsByCategory($arr) {
        foreach ($arr as $value) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width=150 /><br>';
            echo "<h2>" . $value['name'] . "</h2>";
            echo "<a href='product?id=" . $value['id'] . "'>Vaata lähemalt</a><br>";
        }
    }

    public static function AllProducts($arr) {
        foreach ($arr as $value) {
            echo "<li>" . $value['name'];
            echo "<a href='product?id=" . $value['id'] . "'>Vaata lähemalt</a></li><br>";
        }
    }

    public static function ReadProduct($p) {
        echo "<h2>" . $p['name'] . "</h2>";
        echo '<br><img src="data:image/jpeg;base64,' . base64_encode($p['picture']) . '" width=150 /><br>';
        echo "<p>" . $p['description'] . "</p>";
    }
//добавить еще методы
}
?>
