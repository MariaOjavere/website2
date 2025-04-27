<?php
class ViewProducts {
    public static function ProductsByCategory($arr) {
        $output = '<div class="row">';
        foreach ($arr as $product) {
            $output .= '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        ' . ($product['picture'] ? 
                            '<img src="data:image/jpeg;base64,' . base64_encode($product['picture']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">' :
                            '<img src="/img/placeholder.jpg" class="card-img-top" alt="No image">') . '
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>
                            <p class="card-text description">' . htmlspecialchars($product['description']) . '</p>
                            <p class="card-text price"><strong>Hind:</strong> ' . htmlspecialchars($product['price']) . ' €</p>
                            <a href="product?id=' . htmlspecialchars($product['id']) . '" class="btn btn-primary">Vaata lähemalt</a>
                        </div>
                    </div>
                </div>';
        }
        $output .= '</div>';
        return $output;
    }

    public static function AllProducts($arr) {
        $output = '<div class="row">';
        foreach ($arr as $value) {
            $output .= '<div class="col-md-4 mb-4">';
            $output .= '<div class="card h-100">';
            if (!empty($value['picture'])) {
                $output .= '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" class="card-img-top" alt="' . htmlspecialchars($value['name']) . '">';
            }
            $output .= '<div class="card-body d-flex flex-column">';
            $output .= '<h5 class="card-title">' . htmlspecialchars($value['name']) . '</h5>';
            $output .= '<a href="product?id=' . $value['id'] . '" class="btn btn-primary mt-auto">Vaata lähemalt</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }

    public static function ReadProduct($p) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        $output = '<div class="card product-page">';
        if (!empty($p['picture'])) {
            $output .= '<img src="data:image/jpeg;base64,' . base64_encode($p['picture']) . '" class="card-img-top" alt="' . htmlspecialchars($p['name']) . '">';
        }
        $output .= '<div class="card-body">';
        $output .= '<h1 class="card-title">' . htmlspecialchars($p['name']) . '</h1>';
        $output .= '<p class="card-text">' . htmlspecialchars($p['description']) . '</p>';
        $output .= '<p class="card-text"><strong>Hind:</strong> ' . htmlspecialchars($p['price']) . ' €</p>';
        $output .= '<p class="card-text"><strong>Laoseis:</strong> ' . htmlspecialchars($p['stock']) . '</p>';
        $output .= '<p class="card-text"><strong>Lisatud:</strong> ' . htmlspecialchars($p['created_at']) . '</p>';

        if (!empty($p['specs'])) {
            $output .= '<h3 class="mt-4">Spetsifikatsioonid</h3>';
            $output .= '<ul class="product-specs">';
            foreach ($p['specs'] as $spec) {
                $output .= '<li><strong>' . htmlspecialchars($spec['spec_name']) . ':</strong> ' . htmlspecialchars($spec['spec_value']) . '</li>';
            }
            $output .= '</ul>';
        } else {
            $output .= '<p class="mt-4">Spetsifikatsioone pole saadaval.</p>';
        }

        if (isset($_SESSION['user'])) {
            $output .= '<h4 class="mt-4">Jäta arvustus</h4>';
            $output .= '<form action="insertreview" method="POST">';
            $output .= '<input type="hidden" name="product_id" value="' . $p['id'] . '">';
            $output .= '<input type="hidden" name="username" value="' . htmlspecialchars($_SESSION['user']) . '">';
            $output .= '<div class="mb-3">';
            $output .= '<label for="comment" class="form-label">Arvustus:</label>';
            $output .= '<textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>';
            $output .= '</div>';
            $output .= '<button type="submit" class="btn btn-primary">Saada</button>';
            $output .= '</form>';
        }

        $output .= '<h3 class="mt-4">Arvustused</h3>';
        $reviews = Reviews::getReviewsByProductID($p['id']);
        if ($reviews) {
            $output .= ViewReviews::getReviewsByProduct($reviews); 
        } else {
            $output .= '<p>Arvustusi veel pole.</p>';
        }

        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
?>