
<?php
require "../../middleware/auth.php";
require "../../config/conexionProveedor.php";
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
    <!--<?php include("../layouts/header.php"); ?>-->

    <form action="../../controllers/proveedorController.php" method="POST">

        <div class="container">

            <div class="container__section">
                <h1>REGISTRO DE PROVEEDOR</h2>

                    <div class="container__section--input">
                        <input type="text" name="nombre" autocomplete="off" required>
                        <label>Nombre del Proveedor</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="nombre_empresa" autocomplete="off" required>
                        <label>Nombre de la Empresa</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="direccion" autocomplete="off" required>
                        <label>Dirección</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="numero_telefono" autocomplete="off" required>
                        <label>Teléfono</label>
                    </div>

                    <div class="container__section--input">
                        <input type="email" name="correo" autocomplete="off" required>
                        <label>Correo</label>
                    </div>
                    <div class="container__section--input">
                        <p>Datos de acceso a cuenta con el proveedor</p>
                        <input type="text" name="usuario_acceso" autocomplete="off" required>
                        <label>Usuario</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="contrasena_acceso" autocomplete="off" required>
                        <label>Contraseña</label>
                    </div>

                    <div class="options">
                        <label>Tipo</label>
                        <select name="tipo">
                            <option value=""></option>
                            <option value="Equipo TI">Equipo TI</option>
                            <option value="Consumibles">Consumibles</option>
                            <option value="Internet">Internet</option>
                        </select>
                    </div>

                    <button type="submit" name="guardar">Guardar</button>
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