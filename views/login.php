<?php
session_start();

// Si YA existe la sesión, no tiene sentido que esté en el login. 
if (isset($_SESSION['usuario'])) {
    header("Location: ../dashboard.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM MULTISERVICIOS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/auth.css">
</head>

<body>

<div class="container-login">

    <div class="hero-text">
        <h1>
            Tu bienestar,<br>
            <span class="mision">nuestra misión</span>
        </h1>
        <p>
            Accede a servicios médicos, deportivos, estéticos y de entretenimiento con una sola tarjeta.
        </p>
        <button type="button" class="btn-card" onclick="location.href='register.php'">
            <i class="bi bi-credit-card-2-front"></i> Obtener mi tarjeta
        </button>
    </div>

    <div class="login-card">

        <div class="login-header">
            <img src="../imagenes/logo.png" class="logo-img" alt="logo">
            <h2>MULTISERVICIOS+</h2>
            <p>CRM Cruz Roja Colombia</p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger auto-close m-2 text-center" style="background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #fca5a5; border-radius: 12px;">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success auto-close m-2 text-center" style="background: rgba(34, 197, 94, 0.2); border: 1px solid #22c55e; color: #bbf7d0; border-radius: 12px;">
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php endif; ?>

        <form action="../controllers/loginController.php" method="POST">

            <div class="input-box">
                <label>Correo electrónico</label>
                <div class="input-icon">
                    <i class="bi bi-envelope"></i>
                    <input type="email" name="correo" class="form-control" placeholder="correo@gmail.com" required>
                </div>
            </div>

            <div class="input-box">
                <label>Contraseña</label>
                <div class="input-icon">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" id="passInput" class="form-control" placeholder="********" required minlength="6">
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('passInput', 'passIcon')">
                        <i class="bi bi-eye" id="passIcon"></i>
                    </button>
                </div>
            </div>

            <div class="text-end mb-3">
                <a href="forgotPassword.php" class="forgot-link">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i> Ingresar
            </button>

            <button type="button" class="btn-register" onclick="location.href='register.php'">
                <i class="bi bi-person-plus"></i> Registrarse
            </button>

        </form>

    </div>

</div>

<script src="../assets/js/auth.js"></script>

</body>
</html>