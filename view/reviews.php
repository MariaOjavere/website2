<?php
class ViewReviews {
    public static function getReviewsByProduct($arr) {
        if (empty($arr)) {
            return "<p>Kommentaarid puuduvad.</p>";
        }

        $output = '<div id="reviews">';
        $output .= "<h3>Ülevaadet:</h3>";
        $output .= "<ul>";
        foreach ($arr as $review) {
            $output .= "<li>";
            $output .= "<strong>Kasutaja:</strong> " . htmlspecialchars($review['user_name'] ?? 'Tundmatu kasutaja') . "<br>";
            $output .= "<strong>Ülevaade:</strong> " . htmlspecialchars($review['text'] ?? 'Puudub') . "<br>";
            $output .= "<strong>Kuupäev:</strong> " . htmlspecialchars($review['created_at'] ?? 'Kuupäev puudub') . "<br>";
            $output .= "</li><hr>";
        }
        $output .= "</ul>";
        $output .= "</div>";
        return $output;
    }

    public static function ReviewsCount($arr) {
        $count = $arr['count'] ?? 0;
        return "<p>Arvustuste arv: " . $count . "</p>";
    }

    public static function ReviewsCountWithAnchor($arr) {
        $count = $arr['count'] ?? 0;
        return "<p><a href='#reviews'>Arvustuste arv: " . $count . "</a></p>";
    }

    public static function ReviewsForm($product_id) {
        $output = '<form method="post" action="submit_review.php">';
        $output .= '<input type="hidden" name="product_id" value="' . htmlspecialchars($product_id) . '">';
        $output .= '<label for="review">Kirjutage oma arvustus:</label><br>';
        $output .= '<textarea id="review" name="review" rows="4" cols="50"></textarea><br>';
        $output .= '<input type="submit" value="Esita Ülevaade">';
        $output .= '</form>';
        return $output;
    }
}
?>