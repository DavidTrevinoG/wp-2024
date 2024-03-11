<?php 

//Creación del archivo PDF
header("Pragma: public");
header("Expires: 0");
$filename = "listadoCarreras.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT * FROM carrera';
$result = $conn->query($sql);

?>
<html lang="es">
    <head>
        <title>Listado de carreras</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de carreras</h2>   
            <table class="table" id="table">
            <thead>
                <th>ID Carrera</th>
                <th>Nombre</th>
                <th>Materias</th>
            </thead>
    <tbody>
        <?php 

            // Recorrido en la tabla de carreras para obtener los registros
            while ($row = $result->fetch_assoc()){
                $query = "SELECT * FROM materia_carrera WHERE id_carrera = ".$row['id_carrera']."";   
                $result2 = $conn->query($query);
                
                $materias = "";

                while ($row2 = $result2->fetch_assoc()){
                    $query2 = "SELECT * FROM materias WHERE id_materia = ".$row2['id_materia']."";
                    $result3 = $conn->query($query2);
                    $row3 = $result3->fetch_assoc();
                    $materias .= $row3['nombre'].", ";
                }
        ?>
        <tr>
        <td><?php echo $row['id_carrera']; ?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $materias;?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>
</html>