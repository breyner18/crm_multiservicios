<?php
session_start();
require '../config/conexion.php';

$correo = trim($_POST['correo']);
$password = trim($_POST['password']);

if (empty($correo) || empty($password)) {
    header("Location: ../views/login.php?error=Todos los campos son obligatorios");
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../views/login.php?error=Correo inválido");
    exit;
}

try {
    // 1. En PDO puedes usar "?" o parámetros con nombre. Usaremos "?" que es más directo aquí.
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    
    // 2. En PDO, pasamos los datos directamente en el execute como un array (Reemplaza a bind_param)
    $stmt->execute([$correo]);
    
    // 3. Obtenemos el usuario con fetch() (Reemplaza a get_result y fetch_assoc)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 4. Si $user es falso, significa que el correo no existe en la BD
    if (!$user) {
        header("Location: ../views/login.php?error=Usuario no encontrado");
        exit;
    }

    // 5. Verificamos si la contraseña coincide con el Hash de la BD
    if (!password_verify($password, $user['password'])) {
        header("Location: ../views/login.php?error=Contraseña incorrecta");
        exit;
    }

    // 6. Guardamos los datos en la sesión
    $_SESSION['usuario'] = $user['correo'];
    $_SESSION['id'] = $user['id'];

    // 7. Redirección a dashboard.html (Modificado según tu petición)
    header("Location: ../dashboard.php");
    exit;

} catch (PDOException $e) {
    echo "Error en el inicio de sesión: " . $e->getMessage();
}
?>