<?php
    //Conexión a la base de datos
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
    <title>Listado de Carreras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<style>
        body {
            background-size: 100%;
    
            background-image: url('pexel.jpg');
      
            background-repeat: no-repeat;
           
            background-position: center;
        
            background-size: cover;
        
            background-color: #f0f0f0; /
        }
    </style>
    <style>

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
        }
    </style>
<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <h2>Listado de Carreras</h2>
        <a href="alta_carrera.php" class="btn btn-success mb-3">Agregar Carrera</a>
        <a href="excel_carrera.php" class="btn btn-success mb-3">Exportar .xslx</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td>
                            <a href="editar_carrera.php?id=<?= $row['id'] ?>" class="btn btn-primary">Editar</a>

                            <form class="d-inline-block" action="crud.php?baja_carrera=<?= $row['id'] ?>" method="post">
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
