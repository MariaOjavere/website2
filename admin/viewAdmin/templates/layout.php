<!DOCTYPE html>
<html lang="et">
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    <div class="side-background left"></div>
    <div class="side-background right"></div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">
                <img src="/img/logo.png" alt="Sign OÜ Logo" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoryAdmin">Tootekategooriad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productsAdmin">Toodete loend</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['userId']) && isset($_SESSION['sessionID'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout" title="Logi välja">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login" title="Logi sisse">
                                <i class="bi bi-person"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container my-5">
            <?php
            if (isset($_SESSION['userId']) && isset($_SESSION['sessionID'])) {
                if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") {
                    if (isset($content)) {
                        echo $content;
                    } else {
                        echo '<h1 class="text-center">Sisu puudub!</h1>';
                    }
                } else {
                    echo '<h4 class="text-center">Sul pole õigusi!</h4>';
                }
            } else {
                echo '<h4 class="text-center">Palun logi sisse.</h4>';
            }
            ?>
        </div>
    </section>

    <footer class="bg-light text-center py-3">
        <p>SPTV21 2025 a. ©</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>