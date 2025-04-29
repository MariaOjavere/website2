<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
<div class="col-md-11">    
    <h2>Toodete loend</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nimi</th>
                <th>Kirjeldus</th>
                <th>Kategooria</th>
                <th>Hind</th>
                <th>Laos</th>
                <th>Tehnilised andmed</th>
                <th>Tegevused</th>
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
                        <a href="productsEdit?id=<?php echo $row['id']; ?>" class="btn btn-primary">Muuda</a>
                        <a href="productsDelete?id=<?php echo $row['id']; ?>" class="btn btn-danger">Kustuta</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="productsAdd" class="btn btn-success">Lisa toode</a>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "templates/layout.php"; ?>