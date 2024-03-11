<html>
    <head>
        <title>Alta de Carrera</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Alta de Carrera</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <label for="nombre_carrera">Nombre de la carrera</label>
                    <input type="text" class="form-control" id="nombre_carrera" name="nombre_carrera" required>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_carrera">Agregar Carrera</button>
            </form>
    </body>
</html>