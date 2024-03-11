<?php
    include 'db.php';
    $id_materia = $_GET['id_materia'];
    $sql_materia = "SELECT * FROM materias WHERE id_materia = $id_materia";
    $result_materia = $conn->query($sql_materia);
    $row_materia = $result_materia->fetch_assoc();
?>

<html>
    <head>
        <title>Editar Materia</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Editar Materia</h2>
            <form action="crud.php" method="POST">
                <input type="hidden" name="id_materia" value="<?=$row_materia['id_materia']?>">

                <div class="form-group">
                    <label for="nombre">Nombre de la materia:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $row_materia['nombre']?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_materia">Editar materia</button>
            </form>
        </div>
    </body>
</html>