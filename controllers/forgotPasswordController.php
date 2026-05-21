<?php

require '../config/conexion.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* OBTENER CORREO */
$correo = trim($_POST['correo']);

/* VALIDAR CAMPO */
if(empty($correo)){
    header("Location: ../views/forgotPassword.php?error=" . urlencode("Ingresa un correo"));
    exit;
}

/* VALIDAR EMAIL */
if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    header("Location: ../views/forgotPassword.php?error=" . urlencode("Correo inválido"));
    exit;
}

try {
    /* BUSCAR USUARIO (Adaptado a PDO) */
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$correo]); // En PDO pasamos la variable directamente aquí
    
    // Obtenemos el usuario en un array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    /* USUARIO NO EXISTE */
    if(!$user){ // Si no devuelve nada, el correo no está registrado
        header("Location: ../views/forgotPassword.php?error=" . urlencode("El correo no existe"));
        exit;
    }

    /* GENERAR TOKEN */
    $token = bin2hex(random_bytes(50));

    /* FECHA EXPIRACIÓN */
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    /* GUARDAR TOKEN (Adaptado a PDO) */
    $update = "UPDATE usuarios SET reset_token = ?, reset_expira = ? WHERE correo = ?";
    $stmtUpdate = $conn->prepare($update);
    
    // Ejecutamos pasando las 3 variables en orden dentro del array
    $stmtUpdate->execute([$token, $expira, $correo]);

    /* LINK RECUPERACIÓN */
    // Nota: Agregué urlencode por si la ruta tiene espacios, aunque lo ideal es que evites espacios en tus URLs de producción.
    $link = "http://localhost/PAGINA%20WEB%20MULTISERVICIOS%20PLUS/views/resetPassword.php?token=$token";

    /* CONFIGURAR PHPMailer */
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'breynerpalechor15@gmail.com';
    $mail->Password = 'yahz xyhz vmyr ezor'; // Asegúrate de que esta siga siendo tu contraseña de aplicación activa
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('breynerpalechor15@gmail.com', 'CRM MULTISERVICIOS');
    $mail->addAddress($correo);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body = "
        <div style='font-family:Poppins,sans-serif; padding:20px;'>
            <h2 style='color:#11468f;'>Recuperar contraseña</h2>
            <p>Haz clic en el siguiente botón para restablecer tu contraseña:</p>
            <a href='$link' style='background:#ff8c42; color:white; padding:14px 20px; text-decoration:none; border-radius:10px; display:inline-block; font-weight:bold; margin-top:10px;'>
                Restablecer contraseña
            </a>
            <p style='margin-top:20px; color:#777;'>El enlace expirará en 1 hora.</p>
        </div>
    ";

    $mail->send();

    header("Location: ../views/forgotPassword.php?success=" . urlencode("Correo enviado correctamente"));
    exit;

} catch (Exception $e) {
    // Si falla PHPMailer o PDO, capturamos el error aquí
    header("Location: ../views/forgotPassword.php?error=" . urlencode("Error al procesar la solicitud: " . $e->getMessage()));
    exit;
}
?>