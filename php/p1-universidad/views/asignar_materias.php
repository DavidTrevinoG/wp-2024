<?php

//Conexión a la base de datos
include '../config/db.php';
$sql = "SELECT * FROM carrera where id_carrera = ".$_GET['id_carrera']."";
$resul = $conn->query($sql);
$resul = $resul->fetch_assoc();

?>

<html>
    <head>
        <title>Asignar Materias</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Asignar materias a <?php echo $resul['nombre'];?></h2>
            <form action="../models/crud.php" method="POST">
                <input type="hidden" name="id_carrera" value="<?php echo $resul['id_carrera'];?>">
                <div class="form-group">
                    <label for="materias">Materias:</label>
                    <?php
                    $sql = "SELECT * FROM materias";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materias[]" value="<?php echo $row['id_materia'];?>"
                        
                        <?php

                            // Consulta SQL para obtener todos los registros de la tabla materia_carrera
                            $sqlite = "SELECT * FROM materia_carrera WHERE id_materia = ".$row['id_materia']." AND id_carrera = ".$resul['id_carrera']."";
                            $result_sqlite = $conn->query($sqlite);

                            if($result_sqlite->num_rows > 0){
                                echo "checked";
                            }

                        ?>
                        
                        >
                        <label class="form-check-label" for="materia1"><?php echo $row['nombre']; ?></label>
                    </div>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary" name="asignar_materias">Guardar Materias</button>
        </div>
</html>