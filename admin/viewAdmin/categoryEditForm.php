<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">    
        <h2>Category Edit</h2>
        <?php 
        if (isset($_SESSION['errorString'])) {
            ?>
            <div class="alert alert-warning">
                <strong><?php echo htmlspecialchars($_SESSION['errorString']); ?></strong> 
                <a href="categoryAdmin">List of Categories</a>
            </div>
            <?php
            unset($_SESSION['errorString']);
        } else {
            ?>
            <form method="POST" action="categoryEditResult?id=<?php echo htmlspecialchars($category['id']); ?>">
                <table class="table table-bordered">
                    <tr>
                        <td>Category name</td>
                        <td><input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($category['name']); ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="btnEditCategory">
                                <span class="glyphicon glyphicon-plus"></span> Save
                            </button>  
                            <a href="categoryAdmin" class="btn btn-large btn-success">
                                <i class="glyphicon glyphicon-backward"></i> Back to List
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
        }
        ?>
    </div>            
</div>

<?php 
$content = ob_get_clean();
include "viewAdmin/templates/layout.php";
?>