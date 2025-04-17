<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Logi sisse</h3>
                </div>
                <div class="card-body">
                    <form action="loginAnswer" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Kasutajanimi</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Parool</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Logi sisse</button>
                    </form>
                    <p class="mt-3 text-center">
                        Pole veel kontot? <a href="registerForm">Registreeru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>