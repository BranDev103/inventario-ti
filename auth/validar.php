<?php

session_start();
require "../../config/conexion.php";
require "./config/conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($conexion, $query);

$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['usuario'] = $user['usuario'];
    $_SESSION['rol'] = $user['rol'];
    $_SESSION['nombre_usuario'] = $user['nombre_usuario'];

    header("Location: ../views/equipos/lista.php");

} else {
    echo "Datos incorrectos, intentalo de nuevo";
    
}




?>