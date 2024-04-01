<?php
    //Conexión a la base de datos
    include 'bd.php';

    // Consulta para obtener todos los alumnos
    $sql = "SELECT * FROM alumno";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <h2>Listado de Alumnos</h2>
        <div class="mb-3">
            <a href="alta_alumno.php" class="btn btn-success mb-3">Agregar Alumno</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                    <th>Tutor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['matricula'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td><?= $row['id_carrera'] ?></td>
                        <td><?= $row['id_tutor'] ?></td>
                        <td>
                            <a href="editar_alumno.php?id=<?= $row['id'] ?>" class="btn btn-primary">Editar</a>

                            <form class="d-inline-block" action="crud.php?baja_alumno=<?= $row['id'] ?>" method="post">
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