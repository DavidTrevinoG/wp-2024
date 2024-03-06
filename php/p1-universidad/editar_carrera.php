<html>
    <head>
        <title>Editar Carrera</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Editar Carrera</h2>
            <form action="crud.php" method="POST">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $_GET['id_carrera'];?>" name="id_carrera">
                    <label for="carrera">Nombre de la carrera</label>
                    <input type="text" class="form-control" id="carrera" name="carrera" value="<?php
                    
                    include ('db.php');
                    $id = $_GET['id_carrera'];
                    $sql = "SELECT * FROM carrera WHERE id_carrera = '$id'";
                    
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['nombre'];

                    ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_carrera">Editar Carrera</button>
            </form>
        </div>
    </body>
</html>