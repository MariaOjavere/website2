<!DOCTYPE html>
<html lang="et">
<head>
    <title>Sign OÜ</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Стили -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Шрифт Noto Serif -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Sign OÜ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategooriad
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <?php
                            Controller::AllCategory();
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="iwww">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registerForm">Registreeru</a>
                    </li>
                </ul>
                <form class="d-flex" action="search">
                    <input class="form-control me-2" type="text" name="otsi" placeholder="Otsi..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i> Otsi
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Контент -->
    <section>
        <div class="container my-5">
            <?php
            if (isset($content)) {
                echo $content;
            } else {
                echo '<h1 class="text-center">Sisu puudub!</h1>';
            }
            ?>
        </div>
    </section>

    <!-- Подвал -->
    <footer class="bg-light text-center py-3">
        <p>SPTV21 2025 a. ©</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>