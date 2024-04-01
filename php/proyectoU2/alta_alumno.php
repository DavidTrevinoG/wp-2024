<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title>Alta de Estudiantes</title>
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class = "container mt-5"> 
        <h2>Alta de Estudiantes</h2>
        <form action = "crud.php" method = "post">
            <div class = "form-group">
                <label for="matricula">Matricula</label>
                <input type = "text" class = "form-control" name = "matricula" required>
            </div>

            <div class = "form-group">
                <label for="nombre">Nombre</label>
                <input type = "text" class = "form-control" name = "nombre" required>
            </div>

            <div class = "form-group">
                <label for="correo">Correo</label>
                <input type = "text" class = "form-control" name = "correo" required>
            </div>

            <div class = "form-group">
                <label for="carrera">Carrera</label>
                <select class = "form-control" name = "id_carrera" required>
                    <?php
                        include 'bd.php';
                        //Consulta de id_carrea
                        $sql_carrera = "SELECT * FROM carrera";
                        $result_carrera = $conn->query($sql_carrera);
                        while ($row_carrera = $result_carrera -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_carrera['id'] ?>">
                            <?php echo $row_carrera['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>
            <div class = "form-group">
                <label for="tutor">Tutores</label>
                <select class = "form-control" name = "id_tutor" required>
                    <?php
                        include 'bd.php';
                        //Consulta de id_carrea
                        $sql_carrera = "SELECT * FROM tutor";
                        $result_carrera = $conn->query($sql_carrera);
                        while ($row_carrera = $result_carrera -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_carrera['id'] ?>">
                            <?php echo $row_carrera['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>

            <button type = "submit" class = "btn btn-primary" name = "alta_alumno">Agregar Estudiante</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

</body>
</html>