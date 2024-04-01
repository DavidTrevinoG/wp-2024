<?php
    // Incluir el archivo de conexión a la base de datos
    include 'bd.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM materia WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
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
        <h2>Editar Materia</h2>
        <form action="crud.php" method="post">
            <input type="hidden" name="id_materia" value="<?= $row['id'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre de la Materia</label>
                <input type="text" class="form-control" name="nombre" value="<?= $row['nombre'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_carrera">Carrera</label>
                <select class="form-control" name="id_carrera" required>
                    <?php
                    // Consultar todas las carreras
                    $sql_carrera = "SELECT * FROM carrera";
                    $result_carrera = $conn->query($sql_carrera);
                    while ($row_carrera = $result_carrera->fetch_assoc()):
                        ?>
                        <option value="<?= $row_carrera['id'] ?>" <?= ($row_carrera['id'] == $row['id_carrera']) ? 'selected' : '' ?>>
                            <?= $row_carrera['nombre'] ?>
                        </option>
                    <?php endwhile ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="cambios_materia">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
