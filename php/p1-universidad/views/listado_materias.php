<?php

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla materias
$sql = 'SELECT * FROM materias';
$result = $conn->query($sql);
?>

<html lang="es">
    <head>
        <title>Listado de Materias</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de Materias</h2>
            <table class="table" id="table">
                <thead>
                    <th>ID Materia</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                </thead>
                <tbody>
                    <?php 
                        // Recorrido en la tabla de materias para obtener los registros
                        while ($row = $result->fetch_assoc()){ 
                    ?>
                    <tr>
                    <td><?php echo $row['id_materia']; ?></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td><?php echo $row['unidades'];?></td>
        
                    <td>
                            <a href="editar_materia.php?id_materia=<?php echo $row['id_materia'];?>" class="btn btn-primary">Editar</a>
                            <a href="../models/crud.php?eliminar_materia=<?php echo $row['id_materia'];?>" class="btn btn-danger">Eliminar</a>
                    </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <a href="alta_materia.php" class="btn btn-success">Agregar Materia</a>
            <a href="../models/exportar_materias.php" class="btn btn-success">Exportar XLS</a>
            <a href="../index.php" class="btn btn-primary">Regresar</a>
        </div>
    </body>

</html>
