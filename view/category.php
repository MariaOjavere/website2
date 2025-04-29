<?php
echo '<li><a class="dropdown-item" href="/all">Kõik tooted</a></li>';
foreach ($arr as $row) {
    echo '<li><a class="dropdown-item" href="category?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</a></li>';
}
?>