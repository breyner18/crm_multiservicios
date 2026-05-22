<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario - MULTISERVICIOS+</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>

<div class="container-register">

    <div class="hero-text">
        <img src="../imagenes/logo.png" class="hero-logo" alt="Logo">
        <h1>Únete a<br><span class="mision">MULTISERVICIOS+</span></h1>
        <p>Regístrate y accede a beneficios exclusivos, descuentos, entretenimiento y servicios premium.</p>
    </div>

    <div class="register-card">
        
        <div class="register-header">
            <h2>Crear Cuenta</h2>
            <p>Completa la información para registrarte</p>
        </div>

        <form action="../controllers/registerController.php" method="POST">
            <div class="form-grid">

                <div class="input-box">
                    <label>Nombres</label>
                    <div class="input-icon">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="nombres" class="form-control" placeholder="Carlos" required>
                    </div>
                </div>

                <div class="input-box">
                    <label>Apellidos</label>
                    <div class="input-icon">
                        <i class="bi bi-person-badge-fill"></i>
                        <input type="text" name="apellidos" class="form-control" placeholder="Rodríguez" required>
                    </div>
                </div>

                <div class="input-box full-width">
                    <label>Documento</label>
                    <div class="input-icon">
                        <i class="bi bi-card-text"></i>
                        <input type="text" name="documento" class="form-control" placeholder="123456789" required>
                    </div>
                </div>

                <div class="input-box full-width">
                    <label>Correo electrónico</label>
                    <div class="input-icon">
                        <i class="bi bi-envelope-fill"></i>
                        <input type="email" name="correo" class="form-control" placeholder="correo@gmail.com" required>
                    </div>
                </div>

                <div class="input-box full-width">
                    <label>Contraseña</label>
                    <div class="input-icon">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                        
                        <button type="button" class="toggle-password" onclick="toggleRegisterPassword()">
                            <i class="bi bi-eye-fill" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="input-box full-width">
                    <label>Plan</label>
                    <div class="input-icon">
                        <i class="bi bi-stars"></i>
                        <select name="plan" class="form-control">
                            <option value="BASICO">BASICO</option>
                            <option value="ESTANDAR">ESTANDAR</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn-register">
                <i class="bi bi-person-plus-fill"></i> Crear cuenta
            </button>

            <button type="button" class="btn-login" onclick="location.href='login.php'">
                <i class="bi bi-box-arrow-left"></i> Volver al login
            </button>
        </form>

    </div>

</div>

<script src="../assets/js/register.js"></script>

</body>
</html>