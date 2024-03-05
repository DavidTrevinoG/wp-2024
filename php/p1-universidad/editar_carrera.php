<html>
    <head>
        <title>Editar Carrera</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Editar Carrera</h2>
            <form action="crud.php" method="">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $_GET['id_carrera'];?>">
                    <label for="nombre_carrera">Nombre de la carrera</label>
                    <input type="text" class="form-control" id="cambio_carrera" name="cambio_carrera" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_carrera">Editar Carrera</button>
            </form>
        </div>
    </body>
</html>