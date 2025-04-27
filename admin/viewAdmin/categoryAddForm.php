<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">    
        <h2>Lisa kategooria</h2>

        <?php 
        if (isset($_SESSION['errorString'])) {
            ?>
            <div class="alert alert-warning">
                <strong><?php echo htmlspecialchars($_SESSION['errorString']); ?></strong> 
                <a href="categoryAdmin">Kategooriate loend</a>
            </div>
            <?php
            unset($_SESSION['errorString']);
        } else {
            ?>
            <form method="POST" action="categoryAddResult">
                <table class="table table-bordered">
                    <tr>
                        <td>Kategooria nimi</td>
                        <td><input type="text" name="name" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="btnAddCategory">
                                <i class="bi bi-plus"></i> Salvesta
                            </button>  
                            <a href="categoryAdmin" class="btn btn-success">
                                <i class="bi bi-arrow-left"></i> Tagasi loendisse
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