<html>
    <head>
        <title>Alta de Alumno</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Alta de Alumno</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="matricula">Matrícula: </label>
                    <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad: </label>
                    <input type="text" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

            
                <div class="form-group">
                    <label for="id_carrera">Carrera:</label>
                    <select class="form-control" name="id_carrera" required>
                        <?php
                            include '../config/db.php';
                            $sql = "SELECT * FROM carrera";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()){

                                // Recorrido en la tabla de carreras para obtener los registros
                        ?>
                        
                        <option value=<?php echo $row['id_carrera'];?>><?php echo $row['nombre'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_alumno">Agregar Alumno</button>
        </div>
</html>