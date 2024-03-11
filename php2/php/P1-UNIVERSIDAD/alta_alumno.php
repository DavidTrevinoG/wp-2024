<html>
    <head>
        <title>Alta de Alumnos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Alta de Alumno</h2>
            <form action="crud.php" method="POST">
                <div class="form-group">
                    <label for="matricula">Matricula:</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="text" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="id_carrera">Carrera:</label>
                    <select class="form-control" id="id_carrera" name="id_carrera" required>
                        <option value="">Selecciona una carrera</option>
                        <?php
                            include 'db.php';
                            //consulta de id carrera
                           $sql_carrera = "SELECT * FROM carrera";
                           $result_carrera = $conn->query($sql_carrera);
                           while($row = $result_carrera->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id_carrera']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php
                           }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_alumno">Agregar alumno</button>
            </form>
        </div>
    </body>
</html>


