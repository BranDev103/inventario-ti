<?php
require "../../config/conexion.php";
require "../../middleware/auth.php";



$id = $_GET['id'];

$query = "SELECT * FROM equipos WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$equipo = mysqli_fetch_assoc($resultado);
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



    <form action="../../controllers/equipoController.php" method="POST">

        <div class="container">

            <div class="container__section">
                <h1>Editar Registro</h1>

                <input type="hidden" name="id" value="<?php echo $equipo['id']; ?>">


                <div class="container__section--input">
                    <input type="text" name="marca" value="<?php echo $equipo['marca']; ?>">
                    <label>Marca</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="modelo" value="<?php echo $equipo['modelo']; ?>">
                    <label>Modelo</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="no_serie" value="<?php echo $equipo['no_serie']; ?>">
                    <label>No. Serie</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="caracteristicas" value="<?php echo $equipo['caracteristicas']; ?>">
                    <label>Características</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="area" value="<?php echo $equipo['area']; ?>">
                    <label>Área</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="ubicacion" value="<?php echo $equipo['ubicacion']; ?>">
                    <label>Ubicación</label>
                </div>

                <div class="container__section--input">
                    <input type="email" name="correo" value="<?php echo $equipo['correo']; ?>">
                    <label>Correo</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="responsable" value="<?php echo $equipo['responsable']; ?>">
                    <label>Responsable</label>
                </div>

                <div class="container__section--input">
                    <input type="text" name="puesto" value="<?php echo $equipo['puesto']; ?>">
                    <label>Puesto</label>
                </div>

                <div class="options">
                    <label>Estado</label>
                    <select name="estado" class="select">
                        <option value="Activo" <?php if ($equipo['estado'] == "Activo") echo "selected"; ?>>Activo</option>
                        <option value="En mantenimiento" <?php if ($equipo['estado'] == "En mantenimiento") echo "selected"; ?>>En mantenimiento</option>
                        <option value="Baja" <?php if ($equipo['estado'] == "Baja") echo "selected"; ?>>Baja</option>
                        <option value="En inventario" <?php if ($equipo['estado'] == "En inventario") echo "selected"; ?>>En inventario</option>
                    </select>

                    <label>Tipo</label>
                    <select name="tipo" class="select">
                        <option value="Laptop" <?php if ($equipo['tipo'] == "Laptop") echo "selected"; ?>>Laptop</option>
                        <option value="Escritorio" <?php if ($equipo['tipo'] == "Escritorio") echo "selected"; ?>>Escritorio</option>
                        <option value="Telefono" <?php if ($equipo['tipo'] == "Telefono") echo "selected"; ?>>Teléfono</option>
                        <option value="Impresora" <?php if ($equipo['tipo'] == "Impresora") echo "selected"; ?>>Impresora</option>
                        <option value="Switch" <?php if ($equipo['tipo'] == "Switch") echo "selected"; ?>>Switch</option>
                        <option value="Celular" <?php if ($equipo['tipo'] == "Celular") echo "selected"; ?>>Celular</option>
                        <option value="Periferico" <?php if ($equipo['tipo'] == "Periferico") echo "selected"; ?>>Periférico</option>
                    </select>
                </div>

                <button type="submit" name="actualizar">Actualizar</button>
                <button type="reset" onclick="window.location.replace('../../views/equipos/lista.php')">Cancelar</button>
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

<?php include("../layouts/footer.php"); ?>