<html>
    <head>
        <title>Alta de Materia</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Alta de Materia</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="materia">Nombre: </label>
                    <input type="text" class="form-control" id="materia" name="materia" required>
                </div>
                <div class="form-group">
                    <label for="unidades">Unidades: </label>
                    <input type="text" class="form-control" id="unidades" name="unidades" required>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_materia">Agregar Alumno</button>
        </div>
</html>