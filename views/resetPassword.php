<?php
require '../config/conexion.php';

$token = $_GET['token'] ?? '';

if(empty($token)){
    die("Token inválido");
}

try {
    $sql = "SELECT * FROM usuarios WHERE reset_token = ? AND reset_expira > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user){
        die("El enlace expiró o es inválido");
    }

} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña - MULTISERVICIOS+</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/resetPassword.css">
</head>
<body>

<div class="container-reset">

    <div class="reset-card">

        <div class="reset-header">
            <img src="../imagenes/logo.png" class="logo-img" alt="logo">
            <h2>Nueva contraseña</h2>
            <p>Ingresa tu nueva contraseña para restaurar el acceso</p>
        </div>

        <form action="../controllers/resetPasswordController.php" method="POST">

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class="input-box">
                <label>Nueva contraseña</label>
                <div class="input-icon">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" id="resetPasswordInput" class="form-control"
                           placeholder="********" required minlength="6">
                    
                    <button type="button" class="toggle-password" onclick="toggleResetPassword()">
                        <i class="bi bi-eye" id="resetEyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-check-circle"></i> Cambiar contraseña
            </button>

        </form>

    </div>

</div>

<script src="../assets/js/resetPassword.js"></script>

</body>
</html>