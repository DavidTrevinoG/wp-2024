<?php
    include '../config/db.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Taller</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Agregar entrada</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="fecha">Fecha de Ingreso: </label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group">
                    <select name="id_servicio">
                        <option value="0">Selecciona un servicio</option>
                        <?php
                            $query = "SELECT * FROM servicios";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['id_servicios']."'>".$row['nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_vehiculo">
                        <option value="0">Selecciona un vehículo</option>
                        <?php
                            $query = "SELECT * FROM vehiculos";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['id_vehiculo']."'>".$row['num_serie']." ".$row['marca']." ".$row['submarca']." ".$row['modelo']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="alta_taller">Agregar entrada a Taller</button>
        </div>
</html>