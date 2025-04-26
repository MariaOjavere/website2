<?php
ob_start();
if (isset($_SESSION['userId'])) {
    header('Location: /productsAdmin');
    exit();
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Админская панель - Вход</h3>
                </div>
                <div class="card-body">
                    <form accept-charset="UTF-8" role="form" action="/login" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Имя пользователя" name="username" type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Пароль" name="password" type="password" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Запомнить меня
                                </label>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Войти" name="btnLogin">
                            <p style="padding-top:10px;"><a href="../">На сайт</a></p>
                            <?php if (isset($_SESSION['errorString'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php 
                                    echo htmlspecialchars($_SESSION['errorString']);
                                    unset($_SESSION['errorString']);
                                    ?>
                                </div>
                            <?php endif; ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>