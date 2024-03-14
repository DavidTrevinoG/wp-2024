<?php

//Conexión a la base de datos
include '../config/db.php';

$id_servicios = $_GET['id_servicios'];

$result = $conn->query("SELECT * FROM servicios WHERE id_servicios = ".$id_servicios);
$result = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar Servicio</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Editar Servicio</h2>
            <form action="../models/crud.php" method="POST">
                <!-- Asignar valores a cada campo -->
                <input type="hidden" name="id_servicios" value="<?php echo $id_servicios; ?>">
                <div class="form-group">
                    <label for="Nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $result['nombre'];?>" required>
                </div>
                <div class="form-group">
                    <label for="costo">Costo: </label>
                    <input type="number" class="form-control" id="costo" name="costo" value="<?php echo $result['costo'];?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="editar_servicios">Editar Servicio</button>
        </div>
</html>