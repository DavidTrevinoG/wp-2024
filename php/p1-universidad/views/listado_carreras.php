<?php

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla carrera
$sql = "SELECT * FROM carrera";
$result = $conn->query($sql);
?>

<html lang="es">
    <head>
        <title>Listado de carreras</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de carreras </h2>
            <table class="table">
                <thead>
                    <th>Id Carrera</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php 

                        // Recorrido en la tabla de carreras para obtener los registros
                        while ($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                    <td><?php echo $row['id_carrera']; ?></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td>
                            <a href="asignar_materias.php?id_carrera=<?php echo $row['id_carrera'];?>" class="btn btn-info">Materias</a>
                            <a href="editar_carrera.php?id_carrera=<?php echo $row['id_carrera'];?>" class="btn btn-primary">Editar</a>
                            <a href="../models/crud.php?eliminar_carrera=<?php echo $row['id_carrera'];?>" class="btn btn-danger">Eliminar</a>
                    </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <a href="alta_carrera.php" class="btn btn-success">Agregar Carrera</a>
            <a href="../models/exportar_carreras.php" class="btn btn-success">Exportar XLS</a>
            <a href="../index.php" class="btn btn-primary">Regresar</a>
        </div>
    </body>
</html>
