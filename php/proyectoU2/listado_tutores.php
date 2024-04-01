<?php
    // Incluir el archivo de conexión a la base de datos
    include 'bd.php';

    // Consulta para obtener todos los tutores con el nombre de la carrera
    $sql = "SELECT tutor.id, tutor.nombre, tutor.correo, carrera.nombre AS nombre_carrera 
            FROM tutor 
            INNER JOIN carrera ON tutor.id_carrera = carrera.id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tutores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <h2>Listado de Tutores</h2>
        <a href="alta_tutor.php" class="btn btn-success mb-3">Agregar Tutor</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td><?= $row['nombre_carrera'] ?></td>
                        <td>
                            <a href="editar_tutor.php?id=<?= $row['id'] ?>" class="btn btn-primary">Editar</a>

                            <form class="d-inline-block" action="crud.php?baja_tutor=<?= $row['id'] ?>" method="post">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
