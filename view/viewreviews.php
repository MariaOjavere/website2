<?php

class ViewReviews {
    public static function ReviewsByProduct($arr) {
        if (empty($arr)) {
            echo "<p>Kommentaarid puuduvad.</p>";
            return;
        }

        echo "<h3>Ülevaadet:</h3>";
        echo "<ul>";
        foreach ($arr as $review) {
            echo "<li>";
            echo "<strong>Kasutaja:</strong> " . htmlspecialchars($review['user_name']) . "<br>";
            echo "<strong>Ülevaade:</strong> " . htmlspecialchars($review['comment']) . "<br>";
            echo "<strong>Kuupäev:</strong> " . htmlspecialchars($review['date_added']) . "<br>";
            echo "</li><hr>";
        }
        echo "</ul>";
    }

    public static function ReviewsCount($arr) {
        $count = $arr['count'] ?? 0;
        echo "<p>Arvustuste arv: " . $count . "</p>";
    }

    public static function ReviewsCountWithAnchor($arr) {
        $count = $arr['count'] ?? 0;
        echo "<p><a href='#reviews'>Arvustuste arv: " . $count . "</a></p>";
    }
    public static function ReviewsForm() {
        echo '<form method="post" action="submit_review.php">';
        echo '<label for="review">Kirjutage oma arvustus:</label><br>';
        echo '<textarea id="review" name="review" rows="4" cols="50"></textarea><br>';
        echo '<input type="esitama" value="esita Ülevaade">';
        echo '</form>';
    }
}
?>