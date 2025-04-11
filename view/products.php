<?php
class ViewProducts {
    public static function ProductsByCategory($arr) {
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
        $output = '<div class="card">';
        if (!empty($p['picture'])) {
            $output .= '<img src="data:image/jpeg;base64,' . base64_encode($p['picture']) . '" class="card-img-top" alt="' . htmlspecialchars($p['name']) . '">';
        }
        $output .= '<div class="card-body">';
        $output .= '<h1 class="card-title">' . htmlspecialchars($p['name']) . '</h1>';
        $output .= '<p class="card-text">' . htmlspecialchars($p['description']) . '</p>';
        $output .= '<p class="card-text"><strong>Hind:</strong> ' . htmlspecialchars($p['price']) . ' €</p>';
        $output .= '<p class="card-text"><strong>Laoseis:</strong> ' . htmlspecialchars($p['stock']) . '</p>';
        $output .= '<p class="card-text"><strong>Lisatud:</strong> ' . htmlspecialchars($p['created_at']) . '</p>';
        $output .= '<a href="add_to_cart?id=' . $p['id'] . '" class="btn btn-primary">Lisa ostukorvi</a>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
?>