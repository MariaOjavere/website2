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
                    <h3 class="text-center">Registreeru</h3>
                </div>
                <div class="card-body">
                    <form action="registerAnswer" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nimi</label>
                            <input type="text" class="form-control" id="name" name="name" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posti aadress</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Parool</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm" class="form-label">Kinnita parool</label>
                            <input type="password" class="form-control" id="confirm" name="confirm" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registreeru</button>
                    </form>
                    <p class="mt-3 text-center">
                        Juba registreeritud? <a href="loginForm">Logi sisse</a>
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