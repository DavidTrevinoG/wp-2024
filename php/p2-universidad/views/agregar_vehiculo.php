<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Vehículo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Agregar Vehículo</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="num_serie">N° Serie: </label>
                    <input type="number" class="form-control" id="num_serie" name="num_serie" required>
                </div>
                <div class="form-group">
                    <label for="marca">Marca: </label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="form-group">
                    <label for="submarca">SubMarca: </label>
                    <input type="text" class="form-control" id="submarca" name="submarca" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo: </label>
                    <input type="text" class="form-control" id="tipo" name="tipo" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo: </label>
                    <input type="number" class="form-control" id="modelo" name="modelo" required>
                </div>
                <div class="form-group">
                    <label for="color">Color: </label>
                    <input type="text" class="form-control" id="color" name="color" required>
                </div>
                <div class="form-group">
                    <label for="capacidad">Capacidad: </label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                </div>
                <div class="form-group">
                    <label for="procedencia">Procedencia: </label>
                    <input type="text" class="form-control" id="procedencia" name="procedencia" required>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_vehiculo">Agregar Vehículo</button>
        </div>
</html>