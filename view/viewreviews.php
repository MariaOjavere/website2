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
}
?>