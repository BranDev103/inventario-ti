<?php

require "../config/conexionProveedor.php";

if (isset($_POST['guardar'])) {

    $nombre = $_POST['nombre'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $correo = $_POST['correo'];
    $numero_telefono = $_POST['numero_telefono'];
    $direccion = $_POST['direccion'];
    $tipo = $_POST['tipo'];
    $usuario_acceso = $_POST['usuario_acceso'];
    $contrasena_acceso = $_POST['contrasena_acceso'];

    $query = "INSERT INTO proveedores (nombre, nombre_empresa, correo, numero_telefono, direccion, tipo, usuario_acceso, contrasena_acceso)
    VALUES ('$nombre', '$nombre_empresa','$correo','$numero_telefono','$direccion','$tipo','$usuario_acceso','$contrasena_acceso')";

    mysqli_query($conexion, $query);

    header("Location: ../views/proveedores/lista.php");
}

if (isset($_GET['eliminar'])) {

    $id = $_GET['eliminar'];

    $query = "DELETE FROM proveedores WHERE id = $id";

    mysqli_query($conexion, $query);

    header("Location: ../views/proveedores/lista.php");
}

if (isset($_POST['actualizar'])) {

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $correo = $_POST['correo'];
    $numero_telefono = $_POST['numero_telefono'];
    $direccion = $_POST['direccion'];
    $tipo = $_POST['tipo'];
    $usuario_acceso = $_POST['usuario_acceso'];
    $contrasena_acceso = $_POST['contrasena_acceso'];

    $query = "UPDATE proveedores SET
    nombre = '$nombre',
    nombre_empresa = '$nombre_empresa',
    correo = '$correo',
    numero_telefono = '$numero_telefono',
    direccion = '$direccion',
    tipo = '$tipo',
    usuario_acceso = '$usuario_acceso',
    contrasena_acceso = '$contrasena_acceso'
    WHERE id = $id";

    mysqli_query($conexion, $query);

    header("Location: ../views/proveedores/lista.php");
}
