<link rel="stylesheet" href="../../assets/css/lista.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<?php
require "../../config/conexion.php";
require "../../middleware/auth.php";
include("../layouts/header.php");



$resultado = mysqli_query($conexion, "SELECT * FROM equipos");
?>

<div class="top-bar">
    <h2>Inventario de Equipos TI</h2>
    <a class="btn_registro bi bi-plus-square"" href=" ../equipos/crear.php"> Registrar</a>
    <input type="text" id="busqueda" placeholder="Buscar...">
    <script src="../../assets/js/buscar.js"></script>
</div>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>CLAVE</th>
            <th>TIPO</th>
            <th>MARCA</th>
            <th>MODELO</th>
            <th>NO. SERIE</th>
            <th>CARACTERÍSTICAS</th>
            <th>ÁREA</th>
            <!--<th>UBICACIÓN</th>-->
            <th>RESPONSABLE</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['clave']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['modelo']; ?></td>
                <td><?php echo $row['no_serie']; ?></td>
                <td><?php echo $row['caracteristicas']; ?></td>
                <td><?php echo $row['area']; ?></td>

                <td><?php echo $row['responsable']; ?></td>

                <td>
                    <?php
                    $estado = $row['estado'];
                    $color = '';

                    if ($estado == 'Activo') {
                        $color = 'rgb(7, 168, 7)';
                    } else if ($estado == 'Baja') {
                        $color = 'rgb(243, 21, 21)';
                    } else if ($estado == 'En mantenimiento') {
                        $color = 'rgb(221, 133, 0)';
                    }
                    ?>
                    <span style="color:<?php echo $color; ?>; font-weight:600;">
                        <?php echo $estado; ?>
                    </span>
                </td>

                <td>
                    <ul class="wrapper">
                        <li class="icon">
                            <a class="icono bi bi-pencil-square" href="editar.php?id=<?php echo $row['id']; ?>"></a>
                            <span class="tooltip">Editar</span>
                        </li>

                        <li class="icon">
                            <a class="icono bi bi-file-pdf" href="../../responsivas/generarResponsiva.php?id=<?php echo $row['id']; ?>" target="_blank"></a>
                            <span class="tooltip">Responsiva</span>
                        </li>

                        <li class="icon">
                            <a class="icono bi bi-tags" href="../../etiquetas/crearEtiquetas.php?id=<?php echo $row['id']; ?>" target="_blank"></a>
                            <span class="tooltip">Etiqueta</span>
                        </li>

                        <li class="icon">
                            <a class="icono bi bi-trash" href="../../controllers/equipoController.php?eliminar=<?php echo $row['id']; ?>
                     " onclick="return confirm('¿Eliminar este equipo?')"></a>
                            <span class="tooltip">Eliminar</span>
                        </li>
                    </ul>
                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>