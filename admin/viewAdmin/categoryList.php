<?php ob_start() ?>

<h2>Category List</h2>

<div class="container" style="min-height:400px;">
    <div style="margin:20px;">
        <a class="btn btn-primary" href="categoryAdd" role="button">Добавить категорию</a>
    </div>
    <div class="col-md-11">        
        <table class='table table-bordered table-responsive'>
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Header Category</th>
                <th width="20%"></th>
            </tr>
            <?php
            foreach($arr as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>
<a href="categoryEdit?id=' . htmlspecialchars($row['id']) . '" class="btn btn-primary btn-sm me-2">
    Edit <i class="bi bi-pencil"></i>
</a>
<a href="categoryDelete?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger btn-sm">
    Delete <i class="bi bi-trash"></i>
</a>
                </td>';
                echo '</tr>';
            }
            ?>
        </table>            
    </div>            
</div>

<?php 
$content = ob_get_clean();
include "viewAdmin/templates/layout.php";
?>