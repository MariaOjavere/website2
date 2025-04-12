<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Login Viga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Login Viga</h2>
        <?php if (isset($error)) { ?>
            <p class="text-danger"><?php echo $error; ?></p>
        <?php } ?>
        <p><a href="loginForm">Proovi uuesti</a></p>
    </div>
</body>
</html>