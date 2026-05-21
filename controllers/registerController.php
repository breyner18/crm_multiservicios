<?php

// Buscamos el archivo de conexión de forma segura usando __DIR__
include(__DIR__ . "/../config/conexion.php");

// Recibimos los datos aplicando trim() para limpiar espacios vacíos accidentales
$nombres   = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$documento = trim($_POST['documento']);
$correo    = trim($_POST['correo']);
$password  = $_POST['password']; // A la contraseña NO se le hace trim si el usuario decidió usar un espacio como clave
$plan      = $_POST['plan'];

// 🔥 ENCRIPTAR CONTRASEÑA (Por seguridad)
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Rol asignado por defecto a los nuevos registros
$rol = "USUARIO";

try {
    // 1. Preparamos la estructura de la consulta SQL usando marcadores de posición (:marcador)
    $sql = "INSERT INTO usuarios (nombres, apellidos, documento, correo, password, plan, rol) 
            VALUES (:nombres, :apellidos, :documento, :correo, :password, :plan, :rol)";

    // 2. Preparamos la consulta en el servidor de la base de datos
    $stmt = $conn->prepare($sql);

    // 3. Ejecutamos la consulta pasando los datos reales de forma segura
    $resultado = $stmt->execute([
        ':nombres'   => $nombres,
        ':apellidos' => $apellidos,
        ':documento' => $documento,
        ':correo'    => $correo,
        ':password'  => $passwordHash,
        ':plan'      => $plan,
        ':rol'       => $rol
    ]);

    // 4. Si los datos se guardaron correctamente, redirigimos a la pantalla de Login
    if($resultado){
        header("Location: ../views/login.php");
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }

} catch (PDOException $e) {
    // Si una columna se llama distinto en tu BD o el correo ya existe, aquí te dirá exactamente qué pasó
    echo "<h3>Error en la Base de Datos:</h3>";
    echo "Detalle del fallo: " . $e->getMessage();
}
?>