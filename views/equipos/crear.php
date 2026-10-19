<?php
require "../../middleware/auth.php";
require "../../config/conexion.php";


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

    <form action="../../controllers/equipoController.php" method="POST">

        <div class="container">

            <div class="container__section">
                <h1>REGISTRO DE EQUIPOS</h2>

                    <div class="container__section--input">
                        <input type="text" name="marca" required>
                        <label>Marca</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="modelo" autocomplete="off" required>
                        <label>Modelo</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="no_serie" autocomplete="off" required>
                        <label>Número de Serie</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="caracteristicas" autocomplete="off" required>
                        <label>Características</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="area" required>
                        <label>Área</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="responsable" autocomplete="off" required>
                        <label>Responsable</label>
                    </div>

                     <div class="container__section--input">
                        <input type="text" name="puesto" autocomplete="off" required>
                        <label>Puesto</label>
                    </div>

                    <div class="container__section--input">
                        <input type="text" name="ubicacion" required>
                        <label>Ubicación</label>
                    </div>

                    <div class="container__section--input">
                        <input type="email" name="correo">
                        <label>Correo</label>
                    </div>

                    <div class="options">
                        <label>Estado</label>
                        <select class="select" name="estado">
                            <option value=""></option>
                            <option value="Activo">Activo</option>
                            <option value="En mantenimiento">En mantenimiento</option>
                            <option value="Baja">Baja</option>
                            <option value="En inventario">En inventario</option>
                        </select>

                        <label>Tipo</label>
                        <select name="tipo">
                            <option value=""></option>
                            <option value="laptop">Laptop</option>
                            <option value="escritorio">Escritorio</option>
                            <option value="telefono">Teléfono</option>
                            <option value="impresora">Impresora</option>
                            <option value="switch">Switch</option>
                            <option value="celular">Celular</option>
                            <option value="periferico">Periférico</option>
                        </select>
                    </div>

                    <button type="submit" name="guardar">Guardar</button>
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