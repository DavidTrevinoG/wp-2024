<?php

// Conexión a la base de datos
include '../config/db.php';

$sql = "SELECT * FROM carrera";
$result = $conn->query($sql);
error_reporting(0)
?>

<html lang="es">
    <head>
        <title>Calificaciones</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            
            <h2>Calificaciones</h2>
            <form method="POST" action="" id="miFormulario">
                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <select name="carrera" id="carrera" class="form-control" onchange="actualizar()">
                        <option value=""
                        
                        <?php 
                        
                            if(!isset($_GET['id_carrera'])){
                                echo "selected";
                            } 

                        ?>
                        
                        disabled>Selecciona una carrera</option>
                        <?php

                        // Recorrido en la tabla de carreras para obtener los registros
                        while ($row = $result->fetch_assoc()) {
                            if(isset($_GET['id_carrera'])){
                                if($_GET['id_carrera'] == $row['id_carrera']){
                                    echo "<option value='" . $row['id_carrera'] . "' selected>" . $row['nombre'] . "</option>";
                                } else {
                                    echo "<option value='" . $row['id_carrera'] . "'>" . $row['nombre'] . "</option>";
                                }
                            } else {
                                echo "<option value='" . $row['id_carrera'] . "'>" . $row['nombre'] . "</option>";
                            }
                           
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="materia">Materia:</label>
                    <select name="materia" id="materia" class="form-control" onchange="select()">
                        
                        <option value="" 
                        
                        <?php 
                        
                            if(!isset($_GET['id_materia'])){
                                echo "selected";
                            }

                        ?>
                        

                       disabled >Selecciona una materia</option>
                        <?php 

                           
                            if(isset($_GET['id_carrera'])){
                                $carreraId = $_GET['id_carrera'];
                                $sql = "SELECT * FROM materia_carrera WHERE id_carrera = ".$carreraId."";
                                $result = $conn->query($sql);
                                // Recorrido en la tabla de materias para obtener los registros
                                while ($row = $result->fetch_assoc()) {
                                    $materiaId = $row['id_materia'];
                                    $sql = "SELECT * FROM materias WHERE id_materia = ".$materiaId."";
                                    $result2 = $conn->query($sql);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        if(isset($_GET['id_materia'])){
                                            if($_GET['id_materia'] == $row2['id_materia']){
                                                echo "<option value='" . $row2['id_materia'] . "' selected>" . $row2['nombre'] . "</option>";
                                            } else {
                                                echo "<option value='" . $row2['id_materia'] . "'>" . $row2['nombre'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value='" . $row2['id_materia'] . "'>" . $row2['nombre'] . "</option>";

                                        }
                                       
                                    }
                                }
                            } 

                        ?>
                    </select>
                </div>

               

                <button type="submit" class="btn btn-primary">Mostrar Alumnos</button>
            </form>
            <form method="POST" action="../models/crud.php">
                
            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $carreraId = $_POST['carrera'];
                $materiaId = $_POST['materia'];
                
            ?>

                <input type="hidden" name="id_carrera" value="<?php echo $carreraId;?>">
                <input type="hidden" name="id_materia" value="<?php echo $materiaId;?>">
            <?php

                
                // Consulta SQL para obtener todos los registros de la tabla alumnos

                $sql = "SELECT * FROM alumno_materia WHERE id_materia = ".$materiaId."";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table'>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    ";
            
                    $res = $conn->query("SELECT * FROM materias WHERE id_materia = ".$materiaId."");
                    $r = $res->fetch_assoc();
                    for($i = 1; $i <= $r['unidades']; $i++){
                        echo "<th>Unidad ".$i."</th>";
                    }
                    echo"</tr>
                            </thead>
                            <tbody>";

                    // Recorrido en la tabla de carreras para obtener los registros
                    while ($row = $result->fetch_assoc()) {
                        $sqli = "SELECT * FROM alumnos WHERE id = ".$row['id_alumno']." AND id_carrera = ".$carreraId."";
                        $resulti = $conn->query($sqli);
                        $rew = $resulti->fetch_assoc();

                
                        echo "<tr>
                                <td>" . $rew['nombre'] . "</td>";
                        $array_calificaciones = explode(", ", $row['calificaciones']);
                     
                        for($i = 0; $i < $r['unidades']; $i++){
                            echo "<td><input name='calificacion".$row['id_alumno']."[]' type='number' value=" . $array_calificaciones[$i]. "></td>";
                        }
                        echo  "</tr>";
            
                    }
                    echo "</tbody>
                        </table>";
                
                } else {
                    echo "No se encontraron alumnos para la carrera y materia seleccionadas.";
                }
            }
            ?>
            
            
            <button type="submit" class="btn btn-primary" name="subir_calificaciones">Subir Calificaciones</button>
            </form>
           
            <a href="../models/exportar_calificaciones.php?id_carrera=<?php echo $carreraId; ?>&id_materia=<?php echo $materiaId; ?>" class="btn btn-success">Exportar XLS</a>
            <a href="../index.php" class="btn btn-primary">Regresar</a>

        </div>

        <script>

        var carreraId;
        var select2;

        function actualizar() {
            carreraId = document.getElementById('carrera').value;
            select2 = document.getElementById('materia');
            window.location = "calificaciones.php?id_carrera=" + carreraId;
        }

        function select() {
            var materiaId = document.getElementById('materia').value;

            window.location = "calificaciones.php?id_carrera=" +  <?php echo $carreraId ?> + "&id_materia=" + materiaId;
            
        }

        var calificaciones = [];
        var id_alumno;
        var unidades;


        </script>    
    </body>
</html>