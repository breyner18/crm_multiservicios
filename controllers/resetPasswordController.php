<?php

require '../config/conexion.php';

// Recibimos el token oculto y la nueva contraseña del formulario POST
$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';

/* VALIDACIONES BÁSICAS */
if (empty($token) || empty($password)) {
    header("Location: ../views/forgotPassword.php?error=" . urlencode("Datos inválidos"));
    exit;
}

if (strlen($password) < 6) {
    header("Location: ../views/resetPassword.php?token=" . urlencode($token) . "&error=" . urlencode("La contraseña debe tener al menos 6 caracteres"));
    exit;
}

try {
    /* 1. VERIFICAR QUE EL TOKEN SIGA SIENDO VÁLIDO ANTES DE ACTUALIZAR */
    $sqlCheck = "SELECT id FROM usuarios WHERE reset_token = ? AND reset_expira > NOW()";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->execute([$token]);
    $user = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: ../views/forgotPassword.php?error=" . urlencode("El enlace expiró o es inválido"));
        exit;
    }

    /* 2. ENCRIPTAR LA NUEVA CONTRASEÑA */
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    /* 3. ACTUALIZAR LA CONTRASEÑA Y LIMPIAR EL TOKEN (Para que no se pueda reutilizar) */
    $sqlUpdate = "UPDATE usuarios 
                  SET password = ?, reset_token = NULL, reset_expira = NULL 
                  WHERE reset_token = ?";
    
    $stmtUpdate = $conn->prepare($sqlUpdate);
    
    // Ejecutamos pasando el nuevo Hash y el Token en el orden correspondiente
    $resultado = $stmtUpdate->execute([$passwordHash, $token]);

    if ($resultado) {
        // Redirigimos al Login (o index.php según tu estructura) informando el éxito
        header("Location: ../index.php?success=" . urlencode("Contraseña actualizada correctamente. Ya puedes iniciar sesión."));
        exit;
    } else {
        header("Location: ../views/resetPassword.php?token=" . urlencode($token) . "&error=" . urlencode("No se pudo actualizar la contraseña"));
        exit;
    }

} catch (PDOException $e) {
    // Si la base de datos falla, atrapamos el error aquí
    header("Location: ../views/resetPassword.php?token=" . urlencode($token) . "&error=" . urlencode("Error en el servidor: " . $e->getMessage()));
    exit;
}
?>