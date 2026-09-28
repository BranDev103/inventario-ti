<?php
require "../../config/conexionProveedor.php";
require "../../middleware/auth.php";



$id = $_GET['id'];

$query = "SELECT * FROM proveedores WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$proveedor = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAZNA - TI</title>
    <link rel="stylesheet" href="../../assets/css/registro.css">
    <link rel="icon" href="../../assets/img/logo.ico">
</head>

<body>

    <form action="../../controllers/proveedorController.php" method="POST">

        <div class="container">

            <div class="container__section">
                <h1>Editar Registro</h1>

                <input type="hidden" name="id" value="<?php echo $proveedor['id']; ?>">


                <div class="container__section--input">
                    <input type="text" name="nombre" value="<?php echo $proveedor['nombre']; ?>">
                    <label>Nombre</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="nombre_empresa" value="<?php echo $proveedor['nombre_empresa']; ?>">
                    <label>Empresa</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="direccion" value="<?php echo $proveedor['direccion']; ?>">
                    <label>Dirección</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="numero_telefono" value="<?php echo $proveedor['numero_telefono']; ?>">
                    <label>Teléfono</label>
                </div>

                 <div class="container__section--input">
                    <input type="email" name="correo" value="<?php echo $proveedor['correo']; ?>">
                    <label>Correo</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="usuario_acceso" value="<?php echo $proveedor['usuario_acceso']; ?>">
                    <label>Usuario</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="contrasena_acceso" value="<?php echo $proveedor['contrasena_acceso']; ?>">
                    <label>Contraseña</label>
                </div>

                <div class="options">
                 
                    <label>Tipo</label>
                    <select name="tipo" class="select">
                        <option value="Equipo TI" <?php if ($proveedor['tipo'] == "Equipo TI") echo "selected"; ?>>Equipo TI</option>
                        <option value="Consumibles" <?php if ($proveedor['tipo'] == "Consumibles") echo "selected"; ?>>Consumibles</option>
                        <option value="Internet" <?php if ($proveedor['tipo'] == "Internet") echo "selected"; ?>>Internet</option>
                       
                    </select>
                </div>

                <button type="submit" name="actualizar">Actualizar</button>
                <button type="reset" onclick="window.location.replace('../../views/proveedores/lista.php')">Cancelar</button>
            </div>

            <div class="container__section">
                <div class="loader">
                    <div class="box1"></div>
                    <div class="box2"></div>
                    <div class="box3"></div>
                </div>
            </div>

        </div>
    </form>

</body>

</html>

