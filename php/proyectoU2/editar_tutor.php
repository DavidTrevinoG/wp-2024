<?php
    include 'bd.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM tutor WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<html lang="en">
<head>
    <title>Editar Tutor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <h2>Editar Tutor</h2>
        <form action="crud.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $row['nombre'] ?>" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="text" class="form-control" name="correo" value="<?= $row['correo'] ?>" required>
            </div>

            <div class="form-group">
                <label for="carrera">Carrera</label>
                <select class="form-control" name="id_carrera" required>
                    <?php
                        //Consulta de carreras
                        $sql_carrera = "SELECT * FROM carrera";
                        $result_carrera = $conn->query($sql_carrera);
                        while ($row_carrera = $result_carrera->fetch_assoc()):
                            $selected = ($row_carrera['id'] == $row['id_carrera']) ? "selected" : "";
                    ?>
                        <option value="<?= $row_carrera['id'] ?>" <?= $selected ?>>
                            <?= $row_carrera['nombre'] ?>
                        </option>
                    <?php endwhile ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="cambios_tutor">Guardar cambios</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
