<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - MULTISERVICIOS+</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/forgotPassword.css">
</head>
<body>

<div class="container-forgot">

    <div class="forgot-card">

        <div class="forgot-header">
            <img src="../imagenes/logo.png" class="logo-img" alt="logo">
            <h2>Recuperar contraseña</h2>
            <p>Ingresa tu correo electrónico para enviarte un enlace de recuperación</p>
        </div>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger auto-close">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success auto-close">
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php endif; ?>

        <form action="../controllers/forgotPasswordController.php" method="POST">

            <div class="input-box">
                <label>Correo electrónico</label>
                <div class="input-icon">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="correo" class="form-control" placeholder="correo@gmail.com" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-send"></i> Enviar enlace
            </button>

            <button type="button" class="btn-back" onclick="location.href='login.php'">
                <i class="bi bi-box-arrow-left"></i> Volver al login
            </button>

        </form>

    </div>

</div>

<script src="../assets/js/forgotPassword.js"></script>

</body>
</html>