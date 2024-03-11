<?php

//Conexión a la base de datos
include '../config/db.php';
$sql = "SELECT * FROM  alumnos where id = ".$_GET['id']."";
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
                <input type="hidden" name="id" value="<?php echo $resul['id'];?>">
                <div class="form-group">
                    <label for="materias">Materias:</label>
                    <?php
                    // Consulta SQL para obtener todos los registros de la tabla materias
                    $sql = "SELECT * FROM materia_carrera where id_carrera = ".$resul['id_carrera']."";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        $sql2 = "SELECT * FROM materias where id_materia = ".$row['id_materia']."";
                        $result2 = $conn->query($sql2);

                        while ($row2 = $result2->fetch_assoc()){
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materias[]" value="<?php echo $row2['id_materia'];?>"
                        
                        <?php

                            // Consulta SQL para obtener todos los registros de la tabla alumno_materia
                            $sqlite = "SELECT * FROM alumno_materia WHERE id_alumno = ".$resul['id']." AND id_materia = ".$row2['id_materia']."";
                            $result_sqlite = $conn->query($sqlite);

                            if($result_sqlite->num_rows > 0){
                                echo "checked";
                            }

                        ?>
                        
                        >
                        <label class="form-check-label" for="materia1"><?php echo $row2['nombre']; ?></label>
                    </div>
                    <?php }} ?>
                </div>
                <button type="submit" class="btn btn-primary" name="asignar_materias_alumnos">Guardar Materias</button>
        </div>
</html>