<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Logi sisse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Logi sisse</h2>
        <form action="loginAnswer" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Kasutajanimi:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parool:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Logi sisse</button>
        </form>
        <p class="mt-3">Pole veel kontot? <a href="registerForm">Registreeru</a></p>
    </div>
</body>
</html>