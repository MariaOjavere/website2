<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
<div class="col-md-11">    
    <h2>Products Add</h2>
    <?php if (isset($_SESSION['errorString'])): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($_SESSION['errorString']); ?>
        </div>
        <?php unset($_SESSION['errorString']); ?>
    <?php endif; ?>
    
    <form method="post" action="productsAddResult" enctype="multipart/form-data">
        <div class="form-group">
            <label>Products Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Products Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <?php
                foreach($arr as $row) {
                    echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                }
                ?>    
            </select>
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label>Specifications</label>
            <div id="specifications">
                <div class="spec-row">
                    <input type="text" name="spec_name[]" placeholder="Spec Name (e.g., Printimise tüüp)" class="form-control" style="display:inline-block; width:40%;">
                    <input type="text" name="spec_value[]" placeholder="Spec Value (e.g., Laser)" class="form-control" style="display:inline-block; width:40%;">
                    <button type="button" class="btn btn-danger remove-spec">Remove</button>
                </div>
            </div>
            <button type="button" id="add-spec" class="btn btn-secondary">Add Specification</button>
        </div>
        <button type="submit" name="btnAddProduct" class="btn btn-primary">Save</button>
        <a href="productsAdmin" class="btn btn-default">Back to List</a>
    </form>
</div>
</div>

<script>
document.getElementById('add-spec').addEventListener('click', function() {
    const specDiv = document.createElement('div');
    specDiv.className = 'spec-row';
    specDiv.innerHTML = `
        <input type="text" name="spec_name[]" placeholder="Spec Name (e.g., Printimise tüüp)" class="form-control" style="display:inline-block; width:40%;">
        <input type="text" name="spec_value[]" placeholder="Spec Value (e.g., Laser)" class="form-control" style="display:inline-block; width:40%;">
        <button type="button" class="btn btn-danger remove-spec">Remove</button>
    `;
    document.getElementById('specifications').appendChild(specDiv);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-spec')) {
        e.target.parentElement.remove();
    }
});
</script>

<?php $content = ob_get_clean(); ?>
<?php include "templates/layout.php"; ?>