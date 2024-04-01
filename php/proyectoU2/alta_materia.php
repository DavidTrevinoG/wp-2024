<?php
    // Conexión a la base de datos
    include 'bd.php';

    // Consulta para obtener todas las carreras
    $sql = "SELECT * FROM carrera";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Materia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php'?>
    <div class="container mt-5">
        <h2>Alta de Materia</h2>
        <form action="crud.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre de la Materia</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="id_carrera">Carrera</label>
                <select class="form-control" name="id_carrera" required>
                    <option value="">Selecciona una carrera</option>
                    <?php

                    // Mostrar opciones para cada carrera
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="alta_materia">Agregar Materia</button>
        </form>
    </div>
</body>
</html>
