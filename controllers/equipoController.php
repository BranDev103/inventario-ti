<?php

require "../config/conexion.php";


if (isset($_POST['guardar'])) {

    /* $nombre = $_POST['nombre'];*/ //ELiminar este campo

    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serial = $_POST['no_serie'];
    $ubicacion = $_POST['ubicacion'];
    $correo = $_POST['correo'];
    $responsable = $_POST['responsable'];
    $puesto = $_POST['puesto'];
    $caracteristicas = $_POST['caracteristicas'];
    $clave = generarCodigo($conexion, $tipo);
    $area = $_POST['area'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO equipos (clave,tipo,marca,modelo,no_serie,ubicacion,correo,responsable,puesto,caracteristicas,area,estado)
VALUES ('$clave','$tipo','$marca','$modelo','$serial','$ubicacion','$correo','$responsable','$puesto','$caracteristicas','$area','$estado')";

    mysqli_query($conexion, $query);

    header("Location: ../views/equipos/lista.php");
}
/********************************************************/
if (isset($_GET['eliminar'])) {

    $id = $_GET['eliminar'];

    $query = "DELETE FROM equipos WHERE id = $id";

    mysqli_query($conexion, $query);

    header("Location: ../views/equipos/lista.php");
}

/*********************************************************/
if (isset($_POST['actualizar'])) {

    $id = $_POST['id'];
    /*$nombre = $_POST['nombre'];*/
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $serial = $_POST['no_serie'];
    $ubicacion = $_POST['ubicacion'];
    $correo = $_POST['correo'];
    $responsable = $_POST['responsable'];
    $puesto = $_POST['puesto'];
    $caracteristicas = $_POST['caracteristicas'];
    $area = $_POST['area'];
    $estado = $_POST['estado'];


    $query = "UPDATE equipos SET
    
    tipo='$tipo',
    marca='$marca',
    modelo='$modelo',
    no_serie='$serial',
    ubicacion='$ubicacion',
    correo = '$correo',
    responsable='$responsable',
    puesto = '$puesto',
    caracteristicas='$caracteristicas',
    area='$area',
    estado='$estado'
    WHERE id = $id";

    mysqli_query($conexion, $query);

    header("Location: ../views/equipos/lista.php");
}

/*********************************************************/

function generarPrefijo($tipo)
{
    $mapa = [
        'laptop' => 'LAP',
        'escritorio' => 'CPU',
        'telefono' => 'TEL',
        'impresora' => 'IMP',
        'switch' => 'SWT',
        'celular' => 'CEL',
        'periferico' => 'PER'
    ];

    $tipo = strtolower($tipo);

    return isset($mapa[$tipo]) ? $mapa[$tipo] : 'GEN';
}

function generarCodigo($conexion, $tipo)
{

    $prefijo = generarPrefijo($tipo);

    $query = "SELECT clave FROM equipos WHERE clave LIKE '$prefijo-%' ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $ultimoCodigo = $row['clave'];

        $numero = intval(substr($ultimoCodigo, 4));

        $numero++;

        return $prefijo . "-" . str_pad($numero, 4, "0", STR_PAD_LEFT);
    } else {

        return $prefijo . "-0001";
    }
}
