<?php

//Conexión a la base de datos
include '../config/db.php';

$id_vehiculo = $_GET['id_vehiculo'];

$result = $conn->query("SELECT * FROM vehiculos WHERE id_vehiculo = ".$id_vehiculo);
$result = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar Vehículo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Editar Vehículo</h2>
            <form action="../models/crud.php" method="POST">
                <!-- Asignar valores a cada campo -->
                <input type="hidden" name="id_vehiculo" value="<?php echo $id_vehiculo; ?>">
                <div class="form-group">
                    <label for="num_serie">N° Serie: </label>
                    <input type="number" class="form-control" id="num_serie" name="num_serie" value="<?php echo $result['num_serie'];?>" required>
                </div>
                <div class="form-group">
                    <label for="marca">Marca: </label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $result['marca'];?>" required>
                </div>
                <div class="form-group">
                    <label for="submarca">SubMarca: </label>
                    <input type="text" class="form-control" id="submarca" name="submarca" value="<?php echo $result['submarca'];?>" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo: </label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $result['tipo'];?>" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo: </label>
                    <input type="number" class="form-control" id="modelo" name="modelo" value="<?php echo $result['modelo'];?>" required>
                </div>
                <div class="form-group">
                    <label for="color">Color: </label>
                    <input type="text" class="form-control" id="color" name="color" value="<?php echo $result['color'];?>" required>
                </div>
                <div class="form-group">
                    <label for="capacidad">Capacidad: </label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad" value="<?php echo $result['capacidad'];?>" required>
                </div>
                <div class="form-group">
                    <label for="procedencia">Procedencia: </label>
                    <input type="text" class="form-control" id="procedencia" name="procedencia" value="<?php echo $result['procedencia'];?>" required>
                </div>

                <button type="submit" class="btn btn-primary" name="editar_vehiculo">Editar Vehículo</button>
        </div>
</html>