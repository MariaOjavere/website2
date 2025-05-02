<?php
class modelAdminProducts {
    public static function getProductsList() {
        $sql = 'SELECT products.*, category.name AS category_name 
                FROM products 
                LEFT JOIN category ON products.category_id = category.id 
                ORDER BY products.id DESC';
        $db = new Database();
        return $db->getAll($sql);
    }

    public static function searchProducts($search) {
        $sql = 'SELECT products.*, category.name AS category_name 
                FROM products 
                LEFT JOIN category ON products.category_id = category.id 
                WHERE products.name LIKE ? OR products.description LIKE ? 
                ORDER BY products.id DESC';
        $db = new Database();
        $searchTerm = '%' . $search . '%';
        return $db->getAll($sql, [$searchTerm, $searchTerm]);
    }

    public static function getProductsAdd() {
        $test = array(false, "Error adding product");
        if (isset($_POST['btnAddProduct'])) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $category_id = $_POST['category_id'] ?? 0;
            $picture = $_FILES['picture']['tmp_name'] ?? '';
            $stock = $_POST['stock'] ?? 0;
            $price = $_POST['price'] ?? 0;
            $spec_names = $_POST['spec_name'] ?? [];
            $spec_values = $_POST['spec_value'] ?? [];

            if ($name && $description && $category_id && $picture && $price >= 0) {
                $pictureData = file_get_contents($picture);

                $sql = "INSERT INTO products (name, description, category_id, picture, stock, price, user_id, created_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
                $db = new Database();
                $stmt = $db->prepare($sql);
                $result = $stmt->execute([$name, $description, $category_id, $pictureData, $stock, $price, $_SESSION['userId']]);
                
                if ($result) {
                    $product_id = $db->getLastId();

                    if (!empty($spec_names) && count($spec_names) === count($spec_values)) {
                        $sql = "INSERT INTO product_specs (product_id, spec_name, spec_value) VALUES (?, ?, ?)";
                        $stmt = $db->prepare($sql);
                        for ($i = 0; $i < count($spec_names); $i++) {
                            if ($spec_names[$i] && $spec_values[$i]) {
                                $stmt->execute([$product_id, $spec_names[$i], $spec_values[$i]]);
                            }
                        }
                    }

                    $test = array(true, "Toode edukalt lisatud");
                } else {
                    $test = array(false, "Toote lisamine andmebaasi nurjus");
                }
            } else {
                $test = array(false, "Kõik väljad on kohustuslikud, sealhulgas hind");
            }
        }
        return $test;
    }

    public static function getProductEdit($id) {
        $id = (int)$id;
        if ($id <= 0) {
            return false;
        }
        $sql = 'SELECT * FROM products WHERE id = ?';
        $db = new Database();
        return $db->getOne($sql, [$id]);
    }

    public static function getProductEditResult($id) {
        $test = array(false, "Error editing product");
        if (isset($_POST['btnEditProduct'])) {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $category_id = (int)($_POST['category_id'] ?? 0);
            $picture = $_FILES['picture']['tmp_name'] ?? '';
            $stock = (int)($_POST['stock'] ?? 0);
            $price = (float)($_POST['price'] ?? 0);
            $spec_names = $_POST['spec_name'] ?? [];
            $spec_values = $_POST['spec_value'] ?? [];

            if ($name && $description && $category_id > 0 && $price >= 0) {
                $sql = "UPDATE products SET name = ?, description = ?, category_id = ?, stock = ?, price = ? WHERE id = ?";
                $params = [$name, $description, $category_id, $stock, $price, $id];

                if ($picture) {
                    $pictureData = file_get_contents($picture);
                    $sql = "UPDATE products SET name = ?, description = ?, category_id = ?, picture = ?, stock = ?, price = ? WHERE id = ?";
                    $params = [$name, $description, $category_id, $pictureData, $stock, $price, $id];
                }

                $db = new Database();
                $stmt = $db->prepare($sql);
                $result = $stmt->execute($params);

                if ($result) {
                    $db->executeRun("DELETE FROM product_specs WHERE product_id = ?", [$id]);
                    if (!empty($spec_names) && count($spec_names) === count($spec_values)) {
                        $sql = "INSERT INTO product_specs (product_id, spec_name, spec_value) VALUES (?, ?, ?)";
                        $stmt = $db->prepare($sql);
                        for ($i = 0; $i < count($spec_names); $i++) {
                            if ($spec_names[$i] && $spec_values[$i]) {
                                $stmt->execute([$id, $spec_names[$i], $spec_values[$i]]);
                            }
                        }
                    }

                    $test = array(true, "Toode edukalt lisatud");
                } else {
                    $test = array(false, "Toote värskendamine andmebaasis ebaõnnestus");
                }
            } else {
                $test = array(false, "Kõik väljad on kohustuslikud, sealhulgas kehtiv kategooria ja hind");
            }
        }
        return $test;
    }

    public static function getProductDelete($id) {
        $db = new Database();
        try {
            $db->executeRun("DELETE FROM reviews WHERE product_id = ?", [$id]);
            $db->executeRun("DELETE FROM products WHERE id = ?", [$id]);
            return true;
        } catch (PDOException $e) {
            error_log("Viga toote kustutamisel: " . $e->getMessage());
            return false;
        }
    }
}
?>