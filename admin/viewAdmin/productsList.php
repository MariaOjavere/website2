<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
<div class="col-md-11">    
    <h2>Products List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Specifications</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $db = new Database();
            foreach ($arr as $row): 
                $specs = $db->getAll("SELECT * FROM product_specs WHERE product_id = ?", [$row['id']]);
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['stock']); ?></td>
                    <td>
                        <?php 
                        if ($specs) {
                            foreach ($specs as $spec) {
                                echo htmlspecialchars($spec['spec_name']) . ': ' . htmlspecialchars($spec['spec_value']) . '<br>';
                            }
                        } else {
                            echo 'No specifications';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="productsEdit?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="productsDelete?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="productsAdd" class="btn btn-success">Add Product</a>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "templates/layout.php"; ?>