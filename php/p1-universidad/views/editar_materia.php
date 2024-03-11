<html>
    <head>
        <title>Editar Materia</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Editar Materia</h2>
            <form action="../models/crud.php" method="POST">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $_GET['id_materia'];?>" name="id_materia">
                    <label for="materia">Nombre de la Materia</label>
                    <input type="text" class="form-control" id="materia" name="materia" value="<?php
                    
                    include ('../config/db.php');
                    $id = $_GET['id_materia'];
                    $sql = "SELECT * FROM materias WHERE id_materia = '$id'";
                    
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['nombre'];

                    ?>" required>
                     <label for="unidades">Nombre de la Materia</label>
                    <input type="number" class="form-control" id="unidades" name="unidades" value="<?php echo $row['unidades'] ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_materia">Editar Materia</button>
            </form>
        </div>
    </body>
</html>