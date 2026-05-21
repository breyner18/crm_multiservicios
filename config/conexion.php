<?php
$host = "localhost";
$db_name = "multiservicios-plus";
$username = "root"; // Usuario por defecto en XAMPP
$password = "";     // Contraseña por defecto en XAMPP

try {
    // Creamos la conexión usando PDO y guardándola en $conn
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    
    // Configuramos PDO para que lance excepciones en caso de errores de SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opcional: Puedes descomentar la siguiente línea solo para probar en el navegador si conecta
    // echo "Conexión exitosa a la base de datos"; 

} catch(PDOException $e) {
    // Si algo falla (ej. base de datos mal escrita o MySQL apagado), detiene la ejecución y te dice por qué
    die("Error crítico de conexión: " . $e->getMessage());
}
?>