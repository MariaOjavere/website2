<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
<div class="col-md-11">    
    <h2>Products Edit</h2>
    <?php if (isset($_SESSION['errorString'])): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($_SESSION['errorString']); ?>
        </div>
        <?php unset($_SESSION['errorString']); ?>
    <?php endif; ?>
    
    <form method="post" action="/productsEditResult?id=<?php echo htmlspecialchars($product['id']); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Products Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="form-group">
            <label>Products Description</label>
            <textarea name="description" class="form-control" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <?php
                $categories = controllerAdminCategory::getCategoryList();
                foreach($categories as $row) {
                    $selected = $row['id'] == $product['category_id'] ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($row['id']) . '" ' . $selected . '>' . htmlspecialchars($row['name']) . '</option>';
                }
                ?>    
            </select>
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control">
            <p>Current picture: <?php echo $product['picture'] ? '(Image exists)' : 'None'; ?></p>
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <button type="submit" name="btnEditProduct" class="btn btn-primary">Save</button>
        <a href="/productsAdmin" class="btn btn-default">Back to List</a>
    </form>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "templates/layout.php"; ?>