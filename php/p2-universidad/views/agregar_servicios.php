<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Servicios</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Agregar Servicios</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="costo">Costo: </label>
                    <input type="number" class="form-control" id="costo" name="costo" required>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_servicios">Agregar Servicio</button>
        </div>
</html>