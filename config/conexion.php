<?php //Conexión con la base de datos EQUIPOS

//Datos de acceso
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "inventario_ti";

$conexion = mysqli_connect($host, $usuario, $password, $bd); 

if (!$conexion) {
    die("Falla de conexión: " . mysqli_connect_error());
}

?>

