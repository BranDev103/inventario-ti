<link rel="stylesheet" href="../../assets/css/listaProveedores.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<?php

require "../../config/conexionProveedor.php";
require "../../middleware/auth.php";
include("../layouts/header.php");

$resultado = mysqli_query($conexion, "SELECT * FROM proveedores");

?>

<div class="top-bar">
    <h2>Lista de Proveedores</h2>
    <a class="btn_registro bi bi-plus-square" href="../proveedores/crear.php"> Registrar</a>
    <input type="text" id="busqueda" placeholder="Buscar...">
    <script src="../../assets/js/buscar.js"></script>
</div>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMPRESA</th>
            <th>DIRECCIÓN</th>
            <th>TIPO</th>
            <th>TELÉFONO</th>
            <th>CORREO</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['nombre_empresa']; ?></td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['numero_telefono']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['usuario_acceso']; ?></td>
                <td><?php echo $row['contrasena_acceso']; ?></td>
                <td>
                    <ul class="wrapper">
                        <li class="icon">
                            <a class="icono bi bi-pencil-square" href="../proveedores/editar.php?id=<?php echo $row['id']; ?>"></a>
                            <span class="tooltip">Editar</span>
                        </li>

                        <li class="icon">
                            <a class="icono bi bi-trash" href="../../controllers/proveedorController.php?eliminar=<?php echo $row['id']; ?>
                     " onclick="return confirm('¿Eliminar este equipo?')"></a>
                            <span class="tooltip">Eliminar</span>
                        </li>
                    </ul>
                </td>
            </tr>

        <?php } ?>

    </tbody>

</table>