<?php
ob_start();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if ($result[0]): ?>
                <div class="alert alert-success" role="alert">
                    Registreerimine õnnestus! Olete nüüd sisse logitud.
                </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    Registreerimine ebaõnnestus: <?= htmlspecialchars($result[1]) ?>
                </div>
                <p class="text-center">
                    <a href="registerForm" class="btn btn-primary">Proovi uuesti</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>








