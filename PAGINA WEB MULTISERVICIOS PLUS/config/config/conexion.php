 <?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "multiservicios-plus";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("Error de conexión: " . mysqli_connect_error());
}

?>