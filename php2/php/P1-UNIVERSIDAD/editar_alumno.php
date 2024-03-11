<?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM alumnos WHERE id = $id";
    $result = $conn->query($sql);

    // Verifica si la consulta fue exitosa antes de intentar obtener los datos
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error al obtener los datos del alumno.";
        exit;
    }
?>

<html>
    <head>
        <title>Editar Alumno</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Editar Alumno</h2>
            <form action="crud.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label for="matricula">Matricula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $row['matricula']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $row['edad']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="id_carrera">Carrera:</label>
                    <select class="form-control" id="id_carrera" name="id_carrera">
                        <option value="">Selecciona una carrera</option>
                        <?php
                            $sql_carrera = "SELECT * FROM carrera";
                            $result_carrera = $conn->query($sql_carrera);

                            if ($result_carrera && $result_carrera->num_rows > 0) {
                                while($row_carrera = $result_carrera->fetch_assoc()) {
                                    $selected = ($row_carrera['id_carrera'] == $row['id_carrera']) ? 'selected' : '';
                                    echo "<option value='{$row_carrera['id_carrera']}' $selected>{$row_carrera['nombre']}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay carreras disponibles</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_alumno">Guardar cambios</button>
            </form>
        </div>
    </body>
</html>
