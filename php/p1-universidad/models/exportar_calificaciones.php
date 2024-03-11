<?php

if(isset($_GET['id_carrera'])){
    $carreraId = $_GET['id_carrera'];
} 
if(isset($_GET['id_materia'])){
    $materiaId = $_GET['id_materia'];
}

header("Pragma: public");
header("Expires: 0");
$filename = "listadoCalificaciones".$carreraId.$materiaId.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
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
            
            <?php 
                // Recorrido en la tabla de carreras para obtener los registros
                $sql = "SELECT * FROM carrera where id_carrera = ".$carreraId."";
                $resul = $conn->query($sql);
                $resul = $resul->fetch_assoc();

                $nombreCarrera = $resul['nombre'];

                $sql = "SELECT * FROM materias where id_materia = ".$materiaId."";
                $resul = $conn->query($sql);
                $resul = $resul->fetch_assoc();

                $nombreMateria = $resul['nombre'];

            ?>
            <h2>Calificaciones <?php echo $nombreCarrera." - ".$nombreMateria ?></h2>
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
            
                    // Recorrido en la tabla de carreras para obtener los registros
                    $res = $conn->query("SELECT * FROM materias WHERE id_materia = ".$materiaId."");
                    $r = $res->fetch_assoc();
                    for($i = 1; $i <= $r['unidades']; $i++){
                        echo "<th>Unidad ".$i."</th>";
                    }
                    echo"</tr>
                            </thead>
                            <tbody>";
                    while ($row = $result->fetch_assoc()) {
                        $sqli = "SELECT * FROM alumnos WHERE id = ".$row['id_alumno']." AND id_carrera = ".$carreraId."";
                        $resulti = $conn->query($sqli);
                        $rew = $resulti->fetch_assoc();

                        // Recorrido en la tabla de carreras para obtener los registros
                        echo "<tr>
                                <td>" . $rew['nombre'] . "</td>";
                        $array_calificaciones = explode(", ", $row['calificaciones']);
                     
                        for($i = 0; $i < $r['unidades']; $i++){
                            echo "<td>" . $array_calificaciones[$i]. "</td>";
                        }
                        echo  "</tr>";
            
                    }
                    echo "</tbody>
                        </table>";
                
                } else {
                    echo "No se encontraron alumnos para la carrera y materia seleccionadas.";
                }
            
            ?>
            
        
            </form>

        </div>
    </body>
</html>