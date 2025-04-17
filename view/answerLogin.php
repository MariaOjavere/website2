<?php
ob_start();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
            <p class="text-center">
                <a href="loginForm" class="btn btn-primary">Proovi uuesti</a>
            </p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>